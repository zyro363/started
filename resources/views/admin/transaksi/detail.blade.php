@extends('admin.layouts.app', [
'activePage' => 'transaksi',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Detail Transaksi</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin/transaksi">Data Proses</a></li>
                  <li class="breadcrumb-item"><a href="/admin/transaksi">Data Transaksi</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
               </ol>
            </nav>
         </div>
         <div class="col-md-6 col-sm-12">
            <div class="pull-right">
               <a href="/admin/transaksi" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
               <a href="/admin/transaksi/edit/{{$transaksi->id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
            </div>
         </div>
      </div>
   </div>
   
   <!-- Detail Transaksi -->
   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-file-text"></i> Detail Transaksi #{{$transaksi->id}}</h2>
         </div>
      </div>
      <hr style="margin-top: 0px;">
      
      <!-- Informasi Transaksi -->
      <div class="row">
         <div class="col-md-6">
            <table class="table table-borderless">
               <tr>
                  <td width="150"><strong>Tanggal</strong></td>
                  <td>: {{date('d M Y', strtotime($transaksi->tanggal))}}</td>
               </tr>
               <tr>
                  <td><strong>Pukul</strong></td>
                  <td>: {{$transaksi->pukul}}</td>
               </tr>
               <tr>
                  <td><strong>Nama Pelanggan</strong></td>
                  <td>: {{$transaksi->nama}}</td>
               </tr>
               <tr>
                  <td><strong>Contact</strong></td>
                  <td>: {{$transaksi->contact}}</td>
               </tr>
            </table>
         </div>
         <div class="col-md-6">
            <table class="table table-borderless">
               <tr>
                  <td width="150"><strong>Metode Pembayaran</strong></td>
                  <td>: {{$transaksi->nama_metode ?? '-'}}</td>
               </tr>
               <tr>
                  <td><strong>Status</strong></td>
                  <td>: 
                     @if($transaksi->status == 'pending')
                        <span class="badge badge-warning">Belum Bayar</span>
                     @elseif($transaksi->status == 'completed')
                        <span class="badge badge-success">Lunas</span>
                     @else
                        <span class="badge badge-danger">Dibatalkan</span>
                     @endif
                  </td>
               </tr>
               <tr>
                  <td><strong>Total</strong></td>
                  <td>: <strong>Rp {{number_format($transaksi->total, 0, ',', '.')}}</strong></td>
               </tr>
               <tr>
                  <td><strong>Potongan</strong></td>
                  <td>: Rp {{number_format($transaksi->potongan, 0, ',', '.')}}</td>
               </tr>
               <tr>
                  <td><strong>Bayar</strong></td>
                  <td>: Rp {{number_format($transaksi->bayar, 0, ',', '.')}}</td>
               </tr>
               <tr>
                  <td><strong>Kembali</strong></td>
                  <td>: Rp {{number_format($transaksi->kembali, 0, ',', '.')}}</td>
               </tr>
            </table>
         </div>
      </div>
      
      <hr>
      
      <!-- Detail Barang -->
      <h4><i class="icon-copy dw dw-shopping-cart"></i> Detail Barang</h4>
      <div class="table-responsive">
         <table class="table table-striped table-bordered">
            <thead class="bg-primary text-white">
               <tr>
                  <th width="5%">#</th>
                  <th>Nama Barang</th>
                  <th width="10%">Jumlah</th>
                  <th width="15%">Harga Satuan</th>
                  <th width="15%">Diskon</th>
                  <th width="15%">Subtotal</th>
               </tr>
            </thead>
            <tbody>
               <?php $no = 1; ?>
               @foreach($detail_transaksi as $detail)
               <tr>
                  <td class="text-center">{{$no++}}</td>
                  <td>{{$detail->nama}}</td>
                  <td class="text-center">{{$detail->jumlah}}</td>
                  <td class="text-right">Rp {{number_format($detail->harga, 0, ',', '.')}}</td>
                  <td class="text-right">Rp {{number_format($detail->diskon, 0, ',', '.')}}</td>
                  <td class="text-right"><strong>Rp {{number_format($detail->total, 0, ',', '.')}}</strong></td>
               </tr>
               @endforeach
            </tbody>
            <tfoot class="bg-light">
               <tr>
                  <td colspan="5" class="text-right"><strong>Total</strong></td>
                  <td class="text-right"><strong>Rp {{number_format($transaksi->total, 0, ',', '.')}}</strong></td>
               </tr>
            </tfoot>
         </table>
      </div>
   </div>
</div>
@endsection
