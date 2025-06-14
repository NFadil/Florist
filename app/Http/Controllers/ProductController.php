<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk   = Product::latest()->get();
        $category = Category::latest()->get();

        return view('HomePage.Produk', [
            'products'   => $produk,
            'categories' => $category,
        ]);
    }
    public function category(Category $category)
    {
        $cat = Category::latest()->get();
        return view('HomePage.Produk', [
            'products'   => $category->products,
            'categories' => $cat,
        ]);
    }
    public function adminshow()
    {
        $username = Auth::user()->name;
        $produk   = Product::all();
        return view('AdminPage.Produk', [
            'username' => $username, 'products' => $produk,
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
    public function update(Request $request, string $id)
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
