<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paket = Paket::all();
        $outlet = Outlet::all();
        return view('paket.index', compact('paket', 'outlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $paket = Paket::all();
        $outlet = Outlet::all();
        return view('paket.create', compact('paket', 'outlet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'outlet_id'  => 'required',
            'jenis'      => 'required',
            'nama_paket' => 'required',
            'harga'      => 'required',
        ]);
        Paket::create([
            'outlet_id'  =>$request->outlet_id,
            'jenis'      =>$request->jenis,
            'nama_paket' =>$request->nama_paket,
            'harga'      =>$request->harga,
        ]);
        return redirect('/paket');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        //
        $paket = Paket::find($paket->id);
        return view('paket.show', compact('paket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        //
        $paket = Paket::find($paket->id);
        return view('paket.edit', compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket $paket)
    {
        //
        $request->validate([
            'outlet_id' => 'required',
            'jenis'     => 'required',
            'nama_paket'=> 'required',
            'harga'     => 'required',
        ]);
        $paket = Paket::find($paket->id);
        $paket->outlet_id   = $request->outlet_id;
        $paket->jenis       = $request->jenis;
        $paket->nama_paket  = $request->nama_paket;
        $paket->harga       = $request->harga;
        $paket->update();
        return redirect('/paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket)
    {
        //
        $paket = Paket::find($paket->id);
        $paket->delete();
        return redirect('/paket');
    }
}
