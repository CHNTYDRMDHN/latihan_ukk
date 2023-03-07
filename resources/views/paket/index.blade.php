@extends('template.master')

@section('judul')
    <h1>Ini Halaman Index Paket</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
      <h3 class="card-title"></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <a href="paket/create" class="btn btn-info mb-3">
    <i class="fas fa-plus"></i>
           Create
        </a>
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th>Outlet Id</th>
          <th>Jenis</th>
          <th>Nama Paket</th>
          <th>Harga</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
          @forelse($paket as $paket)
         <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $paket->outlet_id }}</td>
          <td>{{ $paket->jenis }}</td>
          <td>{{ $paket->nama_paket }}</td>
          <td>{{ $paket->harga }}</td>
          <td>
          <form action="{{ route ('paket.destroy', [$paket->id])}}" method="POST">
              <a class="btn btn-info mr-3" href="paket/{{$paket->id}}">Detail</a>
              <a class="btn btn-warning mr-3" href="paket/{{$paket->id}}/edit">Edit</a>
            @csrf
            @method('DELETE')
           <input type="submit" class="btn btn-danger" value="Delete">
          </form>
            </td>
         </tr>
         @empty
         <tr>
          <td>Data Masih Kosong</td>
        </tr>

        @endforelse
      </table>
    </div>
    <!-- /.card-body -->
  
@endsection

@push('scripts')
<script src="{{ asset ('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset ('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<script>
    $(function () {
     $('#data-paket').DataPaket();
        
      $('#example2').DataPaket({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
    });
  </script>
@endpush