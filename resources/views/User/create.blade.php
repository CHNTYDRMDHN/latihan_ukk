@extends('template.master')

@section('content')
<div class="col-md-12">
  <div class="card card-primary">
     <div class="card-header">
       <h3 class="card-title">Masukan Data Barang</h3>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <form action="{{route('user.store')}}" method="POST">
        @csrf
      <div class="card-body">
        <div class="row">
          <div class="form-group col-12">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control p_input">
          </div>
        </div>
          <div class="row">
            <div class="form-group col-12">
              <label>Username</label>
              <input type="text" name="username" class="form-control p_input">
            </div>
          </div>
          <div class="row">
          <div class="form-group col-12">
            <label>Password</label>
            <input type="password" name="password" class="form-control p_input">
          </div>
          </div>
          <div class="form-group">
          <label>Outlet</label>
          <select class="form-select" aria-label="Default select example" name="outlets_id" >
            <option selected>Open this select menu</option>
            @foreach ($outlet as $item)
            <option value="{{ $item->id}}">{{ $item->id }}</option>
            @endforeach
          </select>
          </div>
          <div class="form-group">
        <label for="">Pilih roles</label>
          <select class="form-select" name="role" id="role">
            <option selected>Pilih role</option>
            <option value="admin">admin</option>
            <option value="kasir">kasir</option>
            <option value="owner">owner</option>
          </select>
          </div>
            
          
          <div class="row">
            <div class="col-md-6 d-flex justify-content-start">
              <button type="submit" class="btn btn-primary">Submit</button> 
            </div>
            @if (auth()->user()->role == 'admin')
          <div class="col-md-6 d-flex justify-content-end">
            <a href="/dashboard/admin" class="btn btn-outline-info">
              Kembali
            </a>
          </div>
          @endif
          @if (auth()->user()->role == 'kasir')
          <div class="col-md-6 d-flex justify-content-end">
            <a href="/dashboard/kasir" class="btn btn-outline-info">
              Kembali
            </a>
            </div>
          @endif
          </div>
      </div>
      <!-- /.card-body -->
     </form>
     </div>
 </div>
</div>
@endsection