@extends('template.master')

@section('content')
  <br>
  <div class="container container-fluid">
    <div class="card mt-4 mb-4">
      <h5 class="card-header d-flex flex-row align-items-center justify-content-between">
        <a>Tambah Transaksi</a>
        <a href="?page=Transaksi" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
        </a>
      </h5>
      <div class="card-body">
  
        <form action="{{ route('transaksi.detail.store', request()->segment(2)) }}" method="post">
          @csrf
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Id Transaksi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control-plaintext" id="id" name="id" value="{{$autoId}}" required
                readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control-plaintext" id="tanggal" name="tanggal" value="<?= date('d M Y'); ?>"
                required readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="kd_paket" class="col-sm-2 col-form-label">Kode Paket</label>
            <div class="col-sm-10">
              <select name="paket_id" id="paket_id" class="form-control">
                <option selected disabled>--Pilih Data Paket--</option>
                @forelse ($pakets as $paket)
                  <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>                  
                @empty
                  <option selected disabled>Tidak Ada Paket Tersedia</option>
                @endforelse
              </select>
              @error('id_paket')
                <div class="text-danger small">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="jenis" class="col-sm-2 col-form-label">Jenis Paket</label>
            <div class="col-sm-10">
          <select name="jenis" id="jenis" class="form-control">
            <option selected disabled>--Pilih Jenis Paket --</option>
            @foreach ($pakets as $paket)
                <option value="{{ $paket->nama_paket }}" data-harga="{{ $paket->harga }}">{{ $paket->jenis }}</option>
            @endforeach
          </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="qty" class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
              <input type="number" min="1" class="form-control" id="qty" name="qty" onkeyup="jumlahBiaya();" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="bayar" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
              <select name="nama_paket" id="nama_paket" class="form-control" onchange="updateHarga()" required>
                <option value="">-- Pilih Paket --</option>
                @foreach ($pakets as $paket)
                <option value="{{ $paket->nama_paket }}" data-harga="{{ $paket->harga }}">{{ $paket->harga }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="bayar" class="col-sm-2 col-form-label">Bayar</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="bayar" name="bayar" onclick="hitungKembalian()" required>
            </div>
          </div>
          <div class="card-footer text-center">
            <button type="reset" class="btn btn-danger mr-2"><i class="fas fa-undo"></i> Reset</button>
            <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
          </div>
        </form>
      </div>
  </div>

  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h5 class="m-0 font-weight-bold text-dark">Tabel Transaksi</h5>
      </div>
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
                  <td>
                    <form action="{{ route('transaksi.updateStatus',$detail->transaksi->id ) }} " method="POST">
                      @csrf
                      @method('PATCH')
                      <button type="submit" class="btn btn-info">Update Status</button>
                    </form>
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
@endsection