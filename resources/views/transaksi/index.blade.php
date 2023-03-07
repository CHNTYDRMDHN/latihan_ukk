@extends('template.master')

@section('judul')
 <h1> Ini Halaman Create Transaksi </h1>
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
      <h3 class="card-title">Data Transaksi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <a href="transaksi/create" class="btn btn-danger">
          <i class="fas fa-plus"></i>
           Tambah
        </a>
      <table id="example2" class="table table-bordered table-hover">
        <thead>
    <tr>
        <td class="td1">No</td>
        <td class="td5">Outlet Id</td>
        <td class="td3">Kode Invoice</td>
        <td class="td2">Tanggal</td>
        <td class="td4">Status</td>
        <td class="td4">Dibayar</td>
        <td class="td4">Action</td>
    </tr>
        </thead>
        <tbody>
            <tr>
          @forelse($transaksi as $transaksi)
          <th class="th1">{{ $loop->iteration}}</th>
            <td class="th2">{{ $transaksi->outlet_id }}</td>
            <td class="th3">{{ $transaksi->kode_invoice }}</td>
            <td class="th2">{{ $transaksi->tgl}}</td>
            <td class="th2">{{ $transaksi->status}}</td>
            <td class="th2">{{ $transaksi->dibayar}}</td>
            <td class="th4">
          <form action="{{ route ('transaksi.destroy', [$transaksi->id])}}" method="POST">
              <a class="btn btn-info mr-3" href="transaksi/{{$transaksi->id}}">
                <i class="fas fa-info-circle"></i>
                Detail
              </a>
              <a class="btn btn-warning mr-3" href="transaksi/{{$transaksi->id}}/edit">
              <i class="far fa-edit"></i> 
              Edit
              </a>
            @csrf
            @method('DELETE')
           <button type="submit" class="btn btn-danger" value="Delete">
           <i class="fas fa-solid fa-trash"></i>
            Delete
           </button>
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
     $('#data-transaksi').DataTransaksi();
        
      $('#example2').DataTransaksi({
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