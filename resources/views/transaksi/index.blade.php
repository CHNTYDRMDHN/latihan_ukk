@extends('template.master')

@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
  
  <div class="table-responsive p-3">
    <table class="table align-items-center table-flush" id="dataTable">
      <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Nama Outlet</th>
              <th>Nama Paket</th>
              <th>Harga</th>
              <th>Qty</th>
              <th>Total Harga </th>
              <th>Status</th>
              <th>Status Pembayaran</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @php
                $kode_invoice_terpilih = $transaksis->pluck('kode_invoice')->first();
               @endphp

              @foreach ($details as $detail)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $detail->paket->outlet->nama }}</td>
                  <td>{{ $detail->paket->nama_paket }}</td>
                  <td>Rp. {{ number_format($detail->paket->harga, 0, ',', '.') }}</td>
                  <td><center>{{ $detail->qty }}</center></td>
                  <td>Rp. {{ number_format($detail->paket->harga * $detail->qty, 0, ',', '.') }}</td>
                  <td>{{ $detail->transaksi->dibayar }}</td>
                  <td>{{ $detail->transaksi->status }}</td>
                  <td class="th4">
                    @if (auth()->user()->role == 'kasir || auth()->user()->role == 'admin')
                    <form action="{{ route('transaksi.updateStatus',$detail->transaksi->id ) }} " method="POST">
                      @csrf
                      @method('PATCH')
                      <button type="submit" class="btn btn-info">Update Status</button>
                    </form>
                    @endif
                    <br>                  
                          <a href="{{ route('transaksi.invoice', ['transaksi' => $detail->transaksi->id]) }}" class="btn btn-info">Invoice</a>
                </td>
                </tr>
              @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
 @endsection