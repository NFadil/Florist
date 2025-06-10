<?php
namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Transaksi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user    = Auth::user();
        $pesanan = $user->transaksis;
        return view('Homepage.Pesanan', [
            'pesanan' => $pesanan,
        ]);
        // $userId = auth()->id();

        // // Eager load product, category, dan gambar produk sekaligus
        // $pesanan = Transaksi::with([
        //     'product', // eager load gambar produk
        //     'category',
        // ])
        //     ->where('user_id', $userId)
        //     ->orderBy('created_at', 'desc')
        //     ->get();
        // return view('Homepage.Pesanan', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function adminshow()
    {
        $username = Auth::user()->name;
        $trans    = Transaksi::all();
        return view('AdminPage.Pesanan', ['username' => $username, 'pesanan' => $trans]);
    }
    public function admintransaksi()
    {
        $username = Auth::user()->name;
        $trans    = Transaksi::all();
        return view('AdminPage.Transaksi', ['username' => $username, 'pesanan' => $trans]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk' => 'required|array',
        ]);

        $userId = Auth::id();

        try {
            DB::beginTransaction();

            foreach ($request->produk as $keranjangId) {
                $item = Keranjang::with(['product', 'product.category'])
                    ->where('id', $keranjangId)
                    ->where('user_id', $userId)
                    ->first();

                if ($item) {
                    // Buat transaksi baru
                    Transaksi::create([
                        'id_pemesanan'      => 'ORD-' . strtoupper(Str::random(8)), // kode unik
                        'user_id'           => $userId,
                        'product_id'        => $item->product_id,
                        'category_id'       => $item->product->category_id,
                        'keranjang_id'      => $item->id,
                        'qty'               => $item->qty,
                        'total_harga'       => $item->qty * $item->product->harga,
                        'status'            => 'pending',
                        'alamat_pengiriman' => null, // bisa diisi nanti
                        'catatan'           => null, // bisa diisi nanti
                    ]);

                    // Hapus dari keranjang setelah transaksi dibuat
                    $item->delete();
                }
            }

            DB::commit();

            return redirect()->route('User.Pesanan')->with('success', 'Transaksi berhasil dibuat.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal membuat transaksi: ' . $e->getMessage());
        }

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
