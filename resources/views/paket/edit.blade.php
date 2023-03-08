@extends('template.master')

@section('judul')
<h1> Edit Paket </h1>
@endsection

@section ('content')
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Info Konfirmasi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route ('paket.update',[$paket->id])}}" method="POST">
              @csrf
              @method('PUT') 
              <div class="card-body">
                <div class="form-group">
                    <label for="inputalamat">Outlet Id</label>
                    <input type="text" name="outlet_id" class="form-control" id="inputoutlet_id" value="{{ $paket->outlet_id }}">
                </div>
              
                  <div class="form-group">
                    <label> Jenis Paket </label>
                    <br>
                    <select class="form-control" name="jenis" id="Jenis" value="{{$paket->jenis}}">
                    <option selected>Open this select menu</option>
                    <option value="kiloan">Kiloan</option>
                    <option value="selimut">Selimut</option>
                    <option value="bed_cover">Bed Cover</option>
                    <option value="kaos">Kaos</option>
                    <option value="jenis">Jenis</option>
                    </select>
                  </div>
                  
              
                <div class="form-group">
                    <label for="inputalamat"> Nama Paket </label>
                    <input type="text" name="nama_paket" class="form-control" id="inputnama_paket" placeholder="Enter Nama Paket" value="{{ $paket->nama_paket }}" require>
                </div>
              

                <div class="form-group">
                    <label for="inputHarga"> Harga </label>
                    <input type="text" name="harga" class="form-control" id="inputharga" placeholder="Enter Harga" value="{{ $paket->harga }}" require>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Save</button>
                  <button type="reset" class="btn btn-warning"> Reset</button>
                </div>
            </div>
              </form>
            </div>
                </select>
                </div>
             
@endsection