@extends('template.master')

@section('judul')
<h1>Create Paket</h1>
@endsection

@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Menambahkan Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/paket" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                  <label> Nama Outlet </label>
                    <br>
                    <select class="form-control" arial-label="Default select example" name="outlet_id">
                      <option selected>Open this select menu</option>
                      @foreach ($outlet as $item)
                      <option value="{{ $item->id}}">{{ $item->nama. '  |  ' . $item->alamat }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                  <label> Jenis Paket </label>
                    <br>
                    <select name="jenis" class="form-control" id="jenis">
                      <option selected>Open this select menu</option>
                      <option value="kiloan">Kiloan</option>
                      <option value="selimut">Selimut</option>
                      <option value="bed_cover">Bed Cover</option>
                      <option value="kaos">Kaos</option>
                      <option value="jenis">Lainnya</option>
                    </select>
                  </div>
                 
                  <div class="form-group">
                    <label for="harga_awal">Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control" id="nama_paket" placeholder="Masukan Nama Paket">
                  </div>
                  <div class="form-group">
                    <label for="harga_awal">Harga</label>
                    <input type="text" name="harga" class="form-control" id="harga" placeholder="Masukan Harga Awal">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                 <button type="reset" class="btn btn-primary"> Reset</button>
                </div>
              </form>
            </div>
@endsection