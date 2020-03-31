<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public $rules = [
        'nama_produk' => ['required', 'unique:tbl_produk'],
        'image' => ['required', 'max:5120', 'mimes:jpg,jpeg,png'],
        'harga' => 'required|numeric',
        'stock' => 'required|numeric',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        Storage::disk('public')->put($image->getFilename(),  File::get($image));

        $product = new Product();
        $product->nama_produk = $request->nama_produk;
        $product->image = $image->getClientOriginalName();
        $product->harga = $request->harga;
        $product->stock = $request->stock;
        $product->save();
        return redirect()->route('products.show', $product->id)->with('status', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Product $product)
    {
        $request->validate( [
            'nama_produk' => ['required'],
            'image' => ['mimes:jpg,jpeg,png', 'max:5120'],
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);
        $image = $request->file('image');
        if ($request->hasfile('image')) {
            Storage::disk('public')->put($image->getFilename(), File::get($image));
            $product->image = $image->getFilename();
        }
        $product->nama_produk = $request->nama_produk;
        $product->harga = $request->harga;
        $product->stock = $request->stock;
        $product->save();
        return redirect()->route('products.show', $product->id)->with('status', 'Produk berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('status', 'Produk berhasil dihapus!');
    }
}
