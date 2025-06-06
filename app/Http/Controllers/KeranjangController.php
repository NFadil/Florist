<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Keranjang::with('product')->where('user_id', Auth::id())->get();
        return view('keranjang.index', compact('items'));
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
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty'        => 'required|integer|min:1',
        ]);

        $user = Auth::user();

        $keranjang = Keranjang::where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($keranjang) {
            // Jika produk sudah ada, update qty
            $keranjang->qty += $request->qty;
            $keranjang->save();
        } else {
            // Kalau belum, tambahkan baru
            Keranjang::create([
                'user_id'    => $user->id,
                'product_id' => $request->product_id,
                'qty'        => $request->qty,
            ]);
        }

        return redirect('/keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
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
