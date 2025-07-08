<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $username = Auth::user()->name;
        $cat      = Category::all();
        return view('AdminPage.Category', [
            'username' => $username, 'cat' => $cat,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $username = Auth::user()->name;
        $cat      = Category::all();
        return view('AdminPage.TambahCategory', [
            'username' => $username,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name'   => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Simpan path gambar jika diunggah
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('kategori', 'public'); // simpan ke storage/app/public/kategori
        }

        // Simpan kategori ke database
        $category = Category::create([
            'name'   => $request->name,
            'slug'   => Str::slug($request->name),
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('Categori.admin')->with('success', 'Kategori berhasil ditambahkan!');
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
    public function edit(Category $slug)
    {
        $username = Auth::user()->name;
        return view('AdminPage.UpdateCategory', [
            'username' => $username,
            'cat'      => $slug,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cat = Category::findOrFail($id);

        // Validasi input
        $request->validate([
            'name'   => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Simpan nama file jika ada gambar yang diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($cat->gambar) {
                Storage::disk('public')->delete($cat->gambar);
            }

            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->store('kategori', 'public');
        } else {
            $gambarPath = $cat->gambar; // tetap gunakan gambar lama jika tidak ada upload baru
        }

        // Update kategori
        $cat->update([
            'name'   => $request->name,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('Categori.admin')->with('success', 'Kategori berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cat = Category::findOrFail($id);

        // Hapus file gambar jika ada
        if ($cat->gambar && Storage::disk('public')->exists($cat->gambar)) {
            Storage::disk('public')->delete($cat->gambar);
        }

        $cat->delete();

        return back()->with('success', 'Kategori berhasil dihapus');
    }
}
