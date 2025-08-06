@extends('admin.layouts.app', [
'activePage' => 'pemasukan',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Tambah Pemasukan</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Pemasukan</a></li>
                  <li class="breadcrumb-item"><a href="/admin/pemasukan">Data Pemasukan</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-money"></i> Form Tambah Pemasukan</h2>
         </div>
      </div>
      <hr style="margin-top: 0px;">
      <form action="/admin/pemasukan/create" method="POST">
         @csrf
         <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
         </div>
         <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan keterangan pemasukan" required></textarea>
         </div>
         <div class="form-group">
            <label for="id_metode">Metode Pembayaran</label>
            <select class="form-control select2" id="id_metode" name="id_metode" required>
               <option value="">Pilih Metode Pembayaran</option>
               @foreach($metode_pembayaran as $metode)
               <option value="{{$metode->id}}">{{$metode->nama}}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group">
            <label for="total">Total</label>
            <input type="number" class="form-control" id="total" name="total" placeholder="Masukkan total pemasukan" required>
         </div>
         <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/admin/pemasukan" class="btn btn-secondary">Kembali</a>
         </div>
      </form>
   </div>
</div>
@endsection 