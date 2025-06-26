<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gambar_Produk;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $username = Auth::user()->name;
        $cat      = Category::latest()->get();
        return view('AdminPage.TambahProduk', [
            'username' => $username, 'cat' => $cat,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'        => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'stok'        => 'required|integer',
            'harga'       => 'required|integer',
            'deskripsi'   => 'required|string',
            'gambar.*'    => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $produk = Product::create([
            'nama'        => $request->nama,
            'category_id' => $request->category_id,
            'stok'        => $request->stok,
            'slug'        => Str::slug($request->nama),
            'harga'       => $request->harga,
            'deskripsi'   => $request->deskripsi,
        ]);

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('produk', 'public');
                Gambar_Produk::create([
                    'produk_id' => $produk->id,
                    'gambar'    => $path,
                ]);
            }
        }

        return redirect()->route('Produk.admin')->with('success', 'Produk berhasil ditambahkan!');
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
    public function edit(Product $slug)
    {
        $username = Auth::user()->name;
        $cat      = Category::latest()->get();
        return view('AdminPage.UpdateProduk', [
            'username' => $username,
            'cat'      => $cat,
            'produk'   => $slug,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produk = Product::findOrFail($id);

        $produk->update([
            'nama'        => $request->nama,
            'category_id' => $request->category_id,
            'stok'        => $request->stok,
            'harga'       => $request->harga,
            'deskripsi'   => $request->deskripsi,
        ]);

        if ($request->hasFile('gambar')) {
            // Simpan gambar baru
            foreach ($request->file('gambar') as $img) {
                $path = $img->store('produk', 'public');
                Gambar_Produk::create([
                    'produk_id' => $produk->id,
                    'gambar'    => $path,
                ]);
            }
        }

        return redirect()->route('Produk.admin')->with('success', 'Produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Product::findOrFail($id);

        // Hapus semua gambar
        foreach ($produk->gambars as $gambar) {
            Storage::disk('public')->delete($gambar->gambar);
            $gambar->delete();
        }

        $produk->delete();
        return back()->with('success', 'Produk berhasil dihapus');
    }
    public function hapusGambar($id)
    {
        $gambar = Gambar_Produk::findOrFail($id);
        Storage::disk('public')->delete($gambar->gambar);
        $gambar->delete();
        return back()->with('success', 'Gambar berhasil dihapus');
    }
}
