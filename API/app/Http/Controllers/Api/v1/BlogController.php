<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\BlogStoreRequest;
use App\Http\Requests\Api\v1\BlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /*
    * Ne kadar injection yapmak istesemde get gibi metodlar bu injection ile düzgün çalışmadı
    * index'tede istedi
    */

    public function index(Request $request): JsonResponse
    {
        $query = Blog::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $perPage = (int) $request->input('per_page', 10);
        $perPage = min($perPage, 15);

        // sayfalamaya göre çekilir veri db'den
        $posts = $query->paginate($perPage);

        return response()->json([
            'page' => $posts->currentPage(),
            'per_page' => $posts->perPage(),
            'total' => $posts->total(),
            'last_page' => $posts->lastPage(),
            'data' => $posts->items(),
        ]);
    }


    function store(BlogStoreRequest $request): JsonResponse
    {
        $validated = $request->validated();

        // resim storage -> app -> public -> uploads 'a gidiyor bakabilirsin
        // postman form-data seç ve resim için file gerisi için text ayarla gönder ...
        // accept : application/json
        // da ekle
        // id test dersen patlar gibi
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $validated['image'] = $imagePath;
        }

        $post = Blog::create($validated);

        return response()->json([
            'message' => 'Blog created successfully',
        ], 201);
    }

    // laravel default olarak put desteklemez POST destekler ondan dolayı form-data gönderirken _method PUT gitmeli
    public function update(BlogUpdateRequest $request, $id): JsonResponse
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json(['message' => 'Blog post not found'], 404);
        }

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $validated['image'] = $imagePath;
        }

        $blog->fill($validated);
        $blog->save();

        return response()->json([
            'message' => 'Blog post updated successfully',
        ]);
    }

    public function show($id): JsonResponse
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404);
        }

        // response tanımladık model'de
        return response()->json($blog->response(), 200);
    }

    public function destroy($id): JsonResponse
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404);
        }

        $blog->delete();

        return response()->json(['message' => 'Blog deleted successfully']);
    }

}
