@extends('template.master')

@section('judul')
<h1>Manajemen Outlet</h1>
@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New class</h3>
              </div> 
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('user.store')}}" method="POST">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <div class="row">
            <div class="col-md-6 col-12">
              <label for="name"><center>Nama</center></label>
              <input type="text" name="nama" class="form-control"  value="{{$users->nama}}" disabled>
            </div>
            <!-- <div class="col-md-3 col-12">
              <label for="telepon"><center> Telepon</center></label>
              <input type="text" name="telp" class="form-control"  value="{{$users->tlp}}" disabled>
            </div> -->
            <div class="col-md-3 col-12">
              <label for="level">Level</label>
              <input type="text" name="role" class="form-control"  value="{{$users->role}}" disabled>      
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-6 col-12">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control" value="{{$users->username}}" disabled>
            </div>
            <div class="col-md-6 col-12">
              <label for="password">Password</label>
              <input type="text" name="password" class="form-control" value="{{$users->password}}" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 d-flex justify-content-start">
            <a href="/user" class="btn btn-outline-info">
              Kembali
            </a>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </form>
            </div>
            
@endsection