<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();

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
        //
    }

    // for api
    public function getAllCustomers()
    {
        $customers = Customer::all();

        return response()->json($customers);
    }
}
