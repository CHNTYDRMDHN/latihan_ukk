<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Models\Outlet;
use App\Models\Member;
use APP\Models\User;
use App\Models\Paket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Events;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return view('transaksi.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Transaksi $transaksi, Request $request)
    {
        //
        $lastTransaksi = Transaksi::orderBy('id', 'desc')->first();
        $lastNumber = 0;
        if ($lastTransaksi) {
            $lastNumber = substr($lastTransaksi->kode_invoice, 3);
        }
        $nextNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        $transaksi->kode_invoice = 'trx' . $nextNumber;
        
        $transaksi->outlet_id       = Auth::user()->outlet_id;
        $transaksi->kode_invoice    = '';
        if ($request->has('member_id')) {
            $transaksi->member_id = $request->member_id;
        } else {
            // member_id tidak ada di request, maka berikan nilai default 0
            $transaksi->member_id = 1;
        }
        $transaksi->tgl             = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        $transaksi->batas_waktu     = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        $transaksi->tgl_bayar       = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
        $transaksi->biaya_tambahan  = 0;
        $transaksi->diskon          = 0;
        $transaksi->pajak           = 0;
        $transaksi->status          = 'baru';
        $transaksi->dibayar         = 'belum_dibayar';
        $transaksi->user_id        = Auth::user()->id;
        $transaksi->save();
        return redirect()->route('transaksi.proses', $transaksi->id);
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
        // $request->validate([
        //     'outlet_id'            => 'required',
        //     'kode_invoice'          => 'required',
        //     'members_id'            => 'required',
        //     'tgl'                   => 'required',
        //     'batas_waktu'           => 'required',
        //     'tgl_bayar'             => 'required',
        //     'biaya_tambahan'        => 'required',
        //     'diskon'                => 'required',
        //     'pajak'                 => 'required',
        //     'status'                => 'required',
        //     'dibayar'               => 'required',
        //     'user_id'               => 'required',
        // ]);
        // Transaksi::create([
        //     'outlet_id'            => $request->outlet_id,
        //     'kode_invoice'          => $request->kode_invoice,
        //     'members_id'            => $request->members_id,
        //     'tgl'                   => $request->tgl,
        //     'batas_waktu'           => $request->batas_waktu,
        //     'tgl_bayar'             => $request->tgl_bayar,
        //     'biaya_tambahan'        => $request->biaya_tambahan,
        //     'diskon'                => $request->diskon,
        //     'pajak'                 => $request->pajak,
        //     'status'                => $request->status,
        //     'dibayar'               => $request->dibayar,
        //     'user_id'               => $request->user_id,
        // ]);
        // return redirect('/transaksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
        $transaksis  = Transaksi::find($transaksi->id);
        $members     = Member::all();
        $outlets    = Outlet::all();
        $users       = User::all();
        return view('transaksi.show', compact('transaksis', 'members', 'outlets', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
    * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi, Paket $paket)
    {
        //
        $transaksis = Transaksi::all();
        $pakets = Paket::all();
        $members = Member::all();
        $details = DetailTransaksi::all();
        $autoId = 'trx' . sprintf('%03d', Transaksi::count() + 1);
       return view('transaksi.proses', compact('pakets', 'members','transaksis','details','autoId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
        $request->validate([
            'outlet_id'            => 'required',
            'kode_invoice'          => 'required',
            'members_id'            => 'required',
            'tgl'                   => 'required',
            'batas_waktu'           => 'required',
            'tgl_bayar'             => 'required',
            'biaya_tambahan'        => 'required',
            'diskon'                => 'required',
            'pajak'                 => 'required',
            'status'                => 'required',
            'dibayar'               => 'required',
            'user_id'               => 'required',
        ]);
        $transaksi = Transaksi::find($transaksi->id);
        $transaksi-> outlet_id         = $request->outlet_id;
        $transaksi-> kode_invoice       = $request->kode_invoice;
        $transaksi-> members_id         = $request->members_id;
        $transaksi-> tgl                = $request->tgl;
        $transaksi-> batas_waktu        = $request->batas_waktu;
        $transaksi-> tgl_bayar          = $request->tgl_bayar;
        $transaksi-> biaya_tambahan     = $request->biaya_tambahan;
        $transaksi-> diskon             = $request->diskon;
        $transaksi-> pajak              = $request->pajak;
        $transaksi-> status             = $request->status;
        $transaksi-> dibayar            = $request->dibayar;
        $transaksi-> user_id            = $request->user_id;
        $transaksi->update();
        return redirect('/member');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
        $transaksi = Transaksi::find($transaksi->id);
        $transaksi->delete();
        return redirect('/transaksi');
    }
    public function harga(Paket $pakets)
    {
        $pakets = Paket::find($pakets->id);
        dd($pakets);
        return response()->json([
            'harga' => $pakets->harga
        ]);
    }
}