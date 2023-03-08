@extends('template.master')

@section ('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
    <form action="{{route('user.update', [$users->id])}}" method="POST">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-12">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control" id="username" value="{{$users->username}}">
            </div>
          </div>  
          <div class="col-md-4 col-12">
            <div class="form-group">
                <label for="level">Otoritas</label>
                  <select name="role" id="role" class="form-select form-control" data-parsley-required>
                    <option value="" disabled><strong>PILIH ROLE</strong></option>
                    <option value="owner">Owner</option>
                    <option value="kasir">Kasir</option>
                  </select>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="password">Password</label>
              <input type="text" name="password" class="form-control" id="password" value="{{$users->password}}">
            </div>
          </div>
        </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="row">
          <div class="col-md-6 d-flex justify-content-start">
            <button type="submit" class="btn btn-primary">Submit</button> 
          </div>
          @if (auth()->user()->role == 'admin')
          <div class="col-md-6 d-flex justify-content-end">
            <a href="/dasboard/admin" class="btn btn-outline-info">
              Kembali
            </a>
          </div>
          @endif
          @if (auth()->user()->role == 'kasir')
          <div class="col-md-6 d-flex justify-content-end">
            <a href="/dasboard/kasir" class="btn btn-outline-info">
              Kembali
            </a>
          </div>
          @endif
      </div>
      </div>
    </form>
 </div>
@endsection