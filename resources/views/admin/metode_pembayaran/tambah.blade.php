@extends('admin.layouts.app', [
'activePage' => 'metode_pembayaran',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Tambah Metode Pembayaran</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                  <li class="breadcrumb-item"><a href="/admin/metode-pembayaran">Metode Pembayaran</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-credit-card"></i> Form Tambah Metode Pembayaran</h2>
         </div>
      </div>
      <hr style="margin-top: 0px;">
      <form action="/admin/metode-pembayaran/create" method="POST">
         @csrf
         <div class="form-group">
            <label for="nama">Nama Metode Pembayaran</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama metode pembayaran" required>
         </div>
         <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/admin/metode-pembayaran" class="btn btn-secondary">Kembali</a>
         </div>
      </form>
   </div>
</div>
@endsection 