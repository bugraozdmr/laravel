<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    // helper function // you also could've defined this one in onother file
    public function filterCustomers(Request $request, $onlyTrash = false)
    {
        $query = $request->input('query');
        $order = $request->input('order');

        $customers = Customer::query();

        if ($query) {
            $customers->where('first_name', 'like', "%$query%")
                ->orWhere('last_name', 'like', "%$query%")
                ->orWhere('email', 'like', "%$query%");
        }

        if ($order == 'asc') {
            $customers->orderBy('created_at', 'asc');
        } else {
            $customers->orderBy('created_at', 'desc');
        }

        if($onlyTrash)
            $customers->onlyTrashed();

        return $customers->get();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customers = $this->filterCustomers($request);

        return view('customer.index', compact('customers'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            // birincisi uploads altında ekstra klosor -- 2.si kural direkt storage için
            $imagePath = $request->file('image')->store('customer_images', 'store_dir');
            
            // direkt genel publicte sakladım storage çok karışık link vs.'de istiyor gerek yok
            // çoğu hosting zaten linklere izin vermiyor
            $validatedData['image'] = '/uploads/'.$imagePath;
        }

        // isimler ayni oldugu icin boyle aldi
        $customer = Customer::create($validatedData);

        // flash message - with
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);  // bulamazsa 404 döner
        return view('customer.show', compact('customer'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);  // bulamazsa 404
        return view('customer.edit', compact('customer'));
    }


    /**
     * Update the specified resource in storage.
     * ayni request kullanılabilir
     */
    public function update(CustomerStoreRequest $request, string $id)
    {
        $customer = Customer::findOrFail($id);
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            // Eski resmi sil
            File::delete(public_path($customer->image));


            $imagePath = $request->file('image')->store('customer_images', 'store_dir');
            $validatedData['image'] = '/uploads/' . $imagePath;
        }

        // Güncelleme işlemi
        $customer->update($validatedData);


        //TODO what if save fails // we would've deleted files already (?)
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            // mesajları session yazacaktır bu şekilde
            return redirect()->route('customers.index')->with('error', 'Customer not found.');
        }

        // artık buldum sorun yok resimi ucurdum buraya geldim aslında delete'den sonra yapmak daha bile iyi -- ama onun icin once path'i degiskende tut -- force delete'e taşıdık bu basit bir algoritma problemiydi

        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Success.');
    }


    function trashIndex(Request $request) {
        $customers = $this->filterCustomers($request,true);


        return view('customer.trash', compact('customers'));
    }

    function restore(string $id) {
        $customer = Customer::withTrashed()->findOrFail($id);
        $customer->restore();

        return redirect()->route('customers.index')->with('success', 'Customer Restored.');
    }

    function forceDelete(string $id) {
        $customer = Customer::withTrashed()->findOrFail($id);
        $customer->forceDelete();

        File::delete(public_path($customer->image));
        
        return redirect()->route('customers.index')->with('success', 'Customer Deleted For good.');
    }
    
    // for api
    public function getAllCustomers()
    {
        $customers = Customer::all();

        return response()->json($customers);
    }
}
