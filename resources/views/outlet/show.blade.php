@extends('template.master')

@section('judul')
    <h1>Halaman Detail</h1>
@endsection

@section ('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detail Outlet</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="outlet/create" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputid">Nama</label>
                    <input type="integer" name="Nama" class="form-control" id="inputnama" placeholder="Enter Nama" value="{{ $outlet->nama }}" disabled  >
                  </div>

                  <div class="form-group">
                    <label for="inputNamaKelas">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="inputalamat" placeholder="Enter Alamat" value="{{ $outlet->alamat }}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="inputJurusan">Telepon</label>
                    <input type="text" name="tlp" class="form-control" id="inputTelepon" placeholder="Enter Telepon" value="{{ $outlet->tlp }}" disabled >
                  </div>
                </select>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
              <a class="btn btn-primary" href="/outlet">
                <i class="nav-icon fas fa-solid fa-arrow-left"></i>
                Kembali
              </a>
                </div>
              </form>
            </div>
@endsection