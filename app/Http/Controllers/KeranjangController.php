<?php
namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user      = Auth::user();
        $keranjang = $user->keranjangs()->with(['product', 'user', 'category'])->get();
        return view('HomePage.Keranjang', [
            'keranjang' => $keranjang,
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
        $request->validate([
            'product_id'  => 'required|exists:products,id',
            'category_id' => 'required|exists:categories,id',
            'qty'         => 'required|integer|min:1',
        ]);

        $user = Auth::user()->id;

        $keranjang = Keranjang::where('user_id', $user)
            ->where('product_id', $request->product_id)
            ->first();

        if ($keranjang) {
            // Jika produk sudah ada, update qty
            $keranjang->qty += $request->qty;
            $keranjang->save();
        } else {
            // Kalau belum, tambahkan baru
            Keranjang::create([
                'user_id'     => $user,
                'category_id' => $request->category_id,
                'product_id'  => $request->product_id,
                'qty'         => $request->qty,
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
    public function update(Request $request)
    {
        $id  = $request->id;
        $qty = $request->qty;

        $cartItem = Keranjang::find($id);

        if (! $cartItem) {
            return response()->json(['success' => false]);
        }

        if ($qty <= 0) {
            $cartItem->delete(); // hapus produk dari keranjang
        } else {
            $cartItem->qty = $qty;
            $cartItem->save();
        }

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Keranjang::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }

}
