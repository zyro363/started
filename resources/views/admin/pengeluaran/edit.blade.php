@extends('admin.layouts.app', [
'activePage' => 'pengeluaran',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Edit Pengeluaran</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Pengeluaran</a></li>
                  <li class="breadcrumb-item"><a href="/admin/pengeluaran">Data Pengeluaran</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-shopping-cart"></i> Form Edit Pengeluaran</h2>
         </div>
      </div>
      <hr style="margin-top: 0px;">
      <form action="/admin/pengeluaran/update/{{$pengeluaran->id}}" method="POST">
         @csrf
         <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{$pengeluaran->tanggal}}" required>
         </div>
         <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan keterangan pengeluaran" required>{{$pengeluaran->keterangan}}</textarea>
         </div>
         <div class="form-group">
            <label for="id_metode">Metode Pembayaran</label>
            <select class="form-control select2" id="id_metode" name="id_metode" required>
               <option value="">Pilih Metode Pembayaran</option>
               @foreach($metode_pembayaran as $metode)
               <option value="{{$metode->id}}" {{$pengeluaran->id_metode == $metode->id ? 'selected' : ''}}>{{$metode->nama}}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group">
            <label for="total">Total</label>
            <input type="number" class="form-control" id="total" name="total" value="{{$pengeluaran->total}}" placeholder="Masukkan total pengeluaran" required>
         </div>
         <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/admin/pengeluaran" class="btn btn-secondary">Kembali</a>
         </div>
      </form>
   </div>
</div>
@endsection 