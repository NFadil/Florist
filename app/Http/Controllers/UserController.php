<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('HomePage.Login');
    }

    public function login(Request $request)
    {
        $request->validate([

            'email'    => 'required',
            'password' => 'required',

        ], [
            'email.required'    => 'Email Tidak Boleh Kosong ',
            'password.required' => 'Password Tidak Boleh Kosong',
        ]);

        $infologin = [
            'email'    => $request->email,
            'password' => $request->password,

        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/admin');
            } else {
                return redirect('/produk');
            }
        } else {
            return redirect('/login')->withErrors(['login_fail' => 'Email atau password tidak sesuai'])->withInput();
        }

    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
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
