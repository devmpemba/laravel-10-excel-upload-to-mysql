<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function importProducts(Request $request)
{
    $request->validate([
        'excel_file' => 'required|mimes:xlsx,xls',
    ]);

    // Retrieve the uploaded file
    $file = $request->file('excel_file');

    // Check if file exists
    if ($file) {
        
        // Import data from the uploaded Excel file
        $data = Excel::toCollection(new ProductImport, $file);

        foreach ($data[0] as $row) {
            Product::create([
                'product_name' => $row[0],
                'buying_price' => $row[1],
                'selling_price' => $row[2],
                'quantity' => $row[3],
            ]);
        }

        return redirect()->back()->with('success', 'Products imported successfully.');
    } else {
        return redirect()->back()->with('error', 'No file was uploaded.');
    }
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
