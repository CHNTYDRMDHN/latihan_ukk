@extends('template.master')

@section('content')
<div class="row">
  <div class="col-lg-12">
      <div class="box">
          <div class="box-body text-center">
              <h1>Selamat Datang</h1>
              <h2>Anda login sebagai KASIR</h2>
              <br><br>
              <form action="{{ route('transaksi.baru') }}" method="POST">
                @csrf
                <select class="form-control select2" style="width: 100%;" name="member_id">
                  <option selected="selected" disabled>-- Pilih Member --</option>
                  @foreach ($members as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                  @endforeach
                </select>
                <br><br>
                <input type="submit" value="Transaksi baru" class="btn btn-success btn-lg">
              </form>
          </div>
      </div>
  </div>
</div>

@endsection

