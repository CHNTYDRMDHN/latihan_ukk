<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Models\Paket;
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
        $details = DetailTransaksi::all();
        $transaksis       = Transaksi::all();
        $paket           = Paket::all();
        return view('transaksi.index', compact('details','transaksis','paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Transaksi $transaksi)
    {
        //
        // $detailTransaksi = DetailTransaksi::find($transaksi->id);
        // $transaksis       = Transaksi::all();
        // $paket           = Paket::all();
        // return view('detail_transaksi.create', compact('detailTransaksi','transaksis','paket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $transaksi)
    {
        $request->validate([
            'paket_id' => 'required',
            'qty' => 'required',
        ], 
        [
            'paket_id.required' => 'Pilih Paket',
            'qty.required' => 'Isi Qty'
        ]);
    
        $transaksiModel = Transaksi::findOrFail($transaksi);

        // mencari paket dengan id yang sesuai
        $paket = Paket::find($request->paket_id);
        if (!$paket) {
            return redirect()->back()->withErrors(['Paket tidak ditemukan']);
        }

        // Mengambil data outlet terkait dari paket
        $outlet = $paket->outlet;

        $detailTransaksi = new DetailTransaksi;
        $detailTransaksi->transaksi_id = $transaksiModel->id;
        $detailTransaksi->paket_id = $paket->id;
        $detailTransaksi->qty = $request->qty;
        $detailTransaksi->bayar = $request->bayar;
    
        $detailTransaksi->save();


        $latestInvoice = Transaksi::orderBy('created_at', 'desc')->pluck('kode_invoice')->first();
        $latestInvoiceNumber = substr($latestInvoice, 3);
        $newInvoiceNumber = $latestInvoiceNumber + 1;
        $newInvoiceId = 'trx' . str_pad($newInvoiceNumber, 3, '0', STR_PAD_LEFT);

        // Mengambil nama outlet dari data outlet terkait
        $autoId = $newInvoiceId;
        $detailTransaksi->save();

        return redirect()->route('transaksi.proses', compact('transaksi','autoId','outlet', 'transaksiModel'));
    }
    
    public function updateStatus(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = 'selesai';
        $transaksi->dibayar = 'dibayar';
        $transaksi->save();

        return redirect()->route('transaksi.proses',$transaksi);
    }


    public function invoice($id)
    {
        $transaksi = Transaksi::where('id', $id)->where('status', 'Selesai')->first();

        if (!$transaksi) {
            return view('transaksi.no_invoice');
        }

        $details = DetailTransaksi::where('transaksi_id', $transaksi->id)->get();

        return view('transaksi.invoice', compact('transaksi', 'details'));
    }

    

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function show(DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailTransaksi $detailTransaksi)
    {
        //
    }
}