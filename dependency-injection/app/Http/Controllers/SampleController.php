<?php

namespace App\Http\Controllers;

use App\Traits\ImageUpload;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    // trait kullanmak
    use ImageUpload;

    // dependency have to be a class !

    public $request;
    function __construct(Request $request)
    {
        return $this->request = $request;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return [1,2,3,4,5, $this->request->id];

        // trait sayesinde geldi
        // $this->handleZipFile();


        // global function
        echo makeSlug("Buğra Wick");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
