<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $outlet = Outlet::all();
        return view('outlet.index', compact('outlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $outlets = Outlet::all();
        return view('outlet.create', compact('outlets'));
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
        'nama' => 'required',
        'alamat' => 'required',
        'tlp' => 'required',
        ]);
        Outlet::create([
            'nama' =>$request->nama,
            'alamat' =>$request->alamat,
            'tlp' =>$request->tlp,
        ]);
        return redirect('/outlet');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        //
        $outlet = Outlet::find($outlet->id);
        return view('outlet.show', compact('outlet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlet $outlet)
    {
        //
        $outlet = Outlet::find($outlet->id);
        return view('outlet.edit', compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
        //
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
            ]);
            $outlet = Outlet::find($outlet->id);
            $outlet-> nama = $request->nama;
            $outlet-> alamat = $request->alamat;
            $outlet-> tlp = $request->tlp;
            $outlet->update();
            return redirect('/outlet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        //
        $outlet = Outlet::find($outlet->id);
        $outlet->delete();
        return redirect('/outlet');
    }
}
