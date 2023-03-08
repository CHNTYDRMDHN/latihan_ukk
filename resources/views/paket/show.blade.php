@extends('template.master')

@section('judul')
    <h1>Halaman Detail</h1>
@endsection

@section ('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detail Paket</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="paket/create" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputNIS"> Outlet id</label>
                    <input type="text" name="outlet_id" class="form-control" id="inputNIS" placeholder="Enter Nama Induk Siswa" value="{{ $paket->outlet_id }}" disabled  >
                  </div>

                  <div class="form-group">
                    <label for="inputjenis">Jenis</label>
                     <select class="form-control" name="jenis">
                        <option value="L" disabled {{ $paket->jenis == "kiloan" ? "selected" : ""}}>Kiloan</option>
                        <option value="p" disabled {{ $paket->jenis == "selimut" ? "selected" : ""}}>Selimut</option>
                        <option value="L" disabled {{ $paket->jenis == "bed_cover" ? "selected" : ""}}>bed_cover</option>
                        <option value="L" disabled {{ $paket->jenis == "kaos" ? "selected" : ""}}>Kaos</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="inputNama">Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control" id="inputNama" placeholder="Enter Nama Siswa" value="{{ $paket->nama_paket }}" disabled >
                  </div>

                  <div class="form-group">
                    <label for="inputalamat">Harga</label>
                    <input type="text" name="harga" class="form-control" id="inputAlamat" placeholder="Enter Alamat Siswa" value="{{ $paket->harga }}" disabled >
                  </div>

                </select>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
              <a class="btn btn-primary" href="/paket">
                <i class="nav-icon fas fa-solid fa-arrow-left"></i>
                Kembali
              </a>
              </form>
            </div>
@endsection