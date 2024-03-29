<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{Product,ProductImage};
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        
        $products = Product::query()->when(Request::input('search'),function($query,$search){
                        $query->where('title','like',"%".$search."%");
                    })->with('category','brand')->paginate(10)->withQueryString();

        $count = $products->count();
        
        $filter = Request::only(['search']);
        
        return Inertia::render('Admin/Products/Index', [
            'products' => $products,
            'count' => $count,
            'filter' => $filter
        ]);
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
        $product = Product::create([
            'title' => $request->title,
            'quantity'=>$request->quantity,
            'description'=>$request->desc,
            'price'=>$request->price,
            'published'=>$request->published,
            'inStock' =>$request->stock,
            'created_by' =>$request->auth()->user()->id,
            'brand_id' => $request->brand,
            'category_id' =>$request->brand,
        ]);

        if($request->hasFile('images'))
        {
            $images = $request->file('images');
            foreach($images as $img){

            }
        }

        
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
