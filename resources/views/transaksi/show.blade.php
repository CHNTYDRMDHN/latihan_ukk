@extends('template.master')

@section('content')
<div class="col-md-12">
  <div class="card card-primary">
     <div class="card-header">
       <h3 class="card-title">Detail Transaksi Anda</h3>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <form action="/transaksi" method="POST">
         @csrf
       <div class="card-body">
        <div class="form-group">
          <label for="outlet_id">Outlet Id</label>
          <input type="text" name="outlet_id" class="form-control" id="inputNIS" 
          placeholder="Nama Outlet"value="{{ $transaksis->outlet_id }}" disabled > 
        </div>
             <div class="form-group">
               <label for="Kode_Invoice">Kode Invoice</label>
               <input type="text" name="kode_invoice" class="form-control" id="Kode_Invoice" 
               placeholder="Kode Invoide" value="{{$transaksis->kode_invoice}}" disabled>
             </div>
             <div class="form-group">
              <label for="member_id">Member Id</label>
              <input type="text" name="member_id" class="form-control" id="inputNIS" 
              placeholder="Nama Member"value="{{ $transaksis->member_id }}" disabled > 
            </div>
              <div class="form-group">
                <label for="harga_awal">Tanggal</label>
                <input type="date" name="tgl" class="form-control" id="Tanggal"
                 placeholder="Tanggal" value="{{$transaksis->tgl}}" disabled>
              </div>
              <div class="form-group">
                <label for="harga_awal">Tanggal Bayar</label>
                <input type="date" name="tgl_bayar" class="form-control" id="Tgl_Bayar" 
                placeholder="Tanggal Bayar" value="{{$transaksis->tgl_bayar}}" disabled>
              </div>
              <div class="form-group">
                <label for="harga_awal">Batas Waktu</label>
                <input type="date" name="batas_waktu" class="form-control" id="Batas_Waktu" 
                placeholder="Batas Waktu" value="{{$transaksis->batas_waktu}}" disabled>
              </div>
              <div class="form-group">
                <label for="harga_awal">Biaya Tambahan</label>
                <input type="number" name="biaya_tambahan" class="form-control" id="Biaya_Tambahan" 
                placeholder="Biaya Tambahan" value="{{$transaksis->biaya_tambahan}}" disabled>
              </div>
              <div class="form-group">
                <label for="harga_awal">Diskon</label>
                <input type="number" name="diskon" class="form-control" id="Diskon" 
                placeholder="Diskon" value="{{$transaksis->diskon}}" disabled>
              </div>
              <div class="form-group">
                <label for="harga_awal">Pajak</label>
                <input type="number" name="pajak" class="form-control" id="Pajak"
                 placeholder="Pajak" value="{{$transaksis->pajak}}" disabled>
              </div>
            </select>
            <div class="form-group">
              <label for="statsu">Dibayar</label>
              <input type="text" name="status" class="form-control" id="inputNIS" 
              placeholder="Status"value="{{ $transaksis->status }}" disabled > 
            </div>
            <div class="form-group">
              <label for="status">Dibayar</label>
              <input type="text" name="dibayar" class="form-control" id="inputNIS" 
              placeholder="Status Pembayaran"value="{{ $transaksis->dibayar }}" disabled > 
            </div>
            <div class="form-group">
              <label for="user_id">User Id</label>
              <input type="text" name="user_id" class="form-control" id="inputNIS" 
              placeholder="Nama User"value="{{ $transaksis->user_id }}" disabled > 
            </div>
       </div>
       <!-- /.card-body -->
     </form>
   </div>
 </div>
@endsection