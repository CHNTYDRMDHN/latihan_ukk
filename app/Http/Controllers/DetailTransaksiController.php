<?php

namespace App\Http\Controllers;

use App\Models\Detail_transaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $detailTransaksi    = Detail_transaksi::all();
        $transaksi          = Transaksi::all();
        $paket              = Paket::all();
        return view('detail_transaksi.index', compact('detailTransaksi', 'transaksi', 'paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $transaksi)
    {
        //
        $request->validate([
            'paket_id'  => 'required',
            'qty'       => 'required'
        ],
        [
            'paket_id.required' => 'Pilih Paket',
            'qty.required'      => 'Isi Qty'
        ]);

        $detailTransaksi = new Detail_transaksi;
        $detailTransaksi->transaksi_id  = $transaksi;
        $detailTransaksi->paket_id      = $request->paket_id;
        $detailTransaksi->qty           = $request->qty;
        $detailTransaksi->save();

        return redirect()->route('transaksi.proses', $transaksi);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Detail_transaksi $detail_transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail_transaksi $detail_transaksi)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail_transaksi $detail_transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail_transaksi $detail_transaksi)
    {
        //
    }
}
