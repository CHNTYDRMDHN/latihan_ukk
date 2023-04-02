<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Invoice</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }} ">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Date: 2/10/2014</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <address>
                  <div class="invoice-to mt25">
                                @if($details->count() > 0)
                                <ul class="list-unstyled">
                                    <b>Invoiced To</b>
                                    <li>{{$details->first()->transaksi->member->nama }}</li>
                                    <li>{{$details->first()->transaksi->member->alamat }}</li>
                                    <li>{{$details->first()->transaksi->member->tlp }}</li>
                                </ul>
                                @endif
                            </div>
                  </address>
                </div>
                <!-- /.col -->
                
                            <div class="invoice-details mt25">
                                    @if($details->count() > 0)
                                    <ul class="list-unstyled mb0">
                                        <li><strong>Invoice</strong> {{$details->first()->transaksi->kode_invoice }}</li>
                                        <li><strong>Tanggal Invoice:</strong>{{ now('Asia/Jakarta')->format('Y-m-d H:i:s') }}</li>
                                        <li><strong>Tanggal Transaksi:</strong>{{ $details->first()->transaksi->tgl }}</li>
                                        <li><strong>Status:</strong> <span class="label label-success">{{ $details->first()->transaksi->status}}</span></li>
                                    </ul>
                                    @endif
                            </div>
              </div>
              <div class="row">

              
                <div class="col-12 table-responsive">
                <table class="table align-items-center table-flush" id="dataTable">
                <thead class="thead-dark">
                    <tr>
                    <th class="per70 text-center">Description</th>
                       <th class="per5 text-center">Qty</th>
                       <th class="per25 text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                       <tr>
                          <td>{{$details->first()->paket->nama_paket }}</td>
                         <td class="text-center">{{$details->first()->qty }}</td>
                          <td class="text-center">Rp. {{ number_format($details->first()->paket->harga * $details->first()->qty, 0, ',', '.') }}</td>
                           </tr>
                          <tr>
                            <td>Pajak</td>
                             <td class="text-center">{{ number_format($details->first()->transaksi->pajak * 100, 2, ',', '.') }}%</td>
                              <td class="text-center">{{ number_format($details->first()->transaksi->pajak * 100, 2, ',', '.') }}%</td>
                             </tr>
                              <tr>
                              <td>Diskon</td>
                              <td class="text-center">{{ number_format($details->first()->transaksi->diskon * 100, 2, ',', '.') }}%</td>
                              <td class="text-center">{{ number_format($details->first()->transaksi->diskon * 100, 2, ',', '.') }}%</td>
                                  </tr>
                                 </tbody>
                              <tfoot>
                              <tr>
                               <th colspan="2" class="text-right">Sub Total:</th>
                               <th class="text-center">Rp. {{ number_format($details->first()->paket->harga * $details->first()->qty + $details->first()->transaksi->pajak + $details->first()->transaksi->diskon , 0, ',', '.') }}</th>
                              </tr>
                              <tr>
                             <th colspan="2" class="text-right">Total:</th>
                             <th class="text-center">Rp. {{ number_format($details->first()->paket->harga * $details->first()->qty + $details->first()->transaksi->pajak + $details->first()->transaksi->diskon , 0, ',', '.') }}</th>
                            </tr>
                            <tr>
                            <th colspan="2" class="text-right">Bayar:</th>
                           <th class="text-center">Rp. {{ number_format($details->first()->bayar  , 0, ',', '.') }}</th>
                           </tr>
                           <tr>
                          <th colspan="2" class="text-right">Kembalian:</th>
                          <th class="text-center">Rp. {{ number_format($details->first()->bayar - $details->first()->paket->harga * $details->first()->qty + $details->first()->transaksi->pajak + $details->first()->transaksi->diskon , 0, ',', '.') }}</th>
                          </tr>
                            </tfoot>
                  </table>
                </div>
                <!-- /.col -->
              </div>
     

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
</body>
</html>
