@extends('admin.layouts.app', [
'activePage' => 'barang',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Tambah Barang</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                  <li class="breadcrumb-item"><a href="/admin/barang">Data Barang</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-box"></i> Form Tambah Barang</h2>
         </div>
      </div>
      <hr style="margin-top: 0px;">
      <form action="/admin/barang/create" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="form-group">
            <label for="id_kategori">Kategori</label>
            <select class="form-control select2" id="id_kategori" name="id_kategori" required>
               <option value="">Pilih Kategori</option>
               @foreach($kategori as $kat)
               <option value="{{$kat->id}}">{{$kat->nama}}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group">
            <label for="id_jenis">Jenis</label>
            <select class="form-control select2" id="id_jenis" name="id_jenis" required>
               <option value="">Pilih Jenis</option>
               @foreach($jenis as $jen)
               <option value="{{$jen->id}}">{{$jen->nama}}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group">
            <label for="nama">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama barang" required>
         </div>
         <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga barang" required>
         </div>
         <div class="form-group">
            <label for="foto">Foto Barang</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
            <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB.</small>
         </div>
         <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/admin/barang" class="btn btn-secondary">Kembali</a>
         </div>
      </form>
   </div>
</div>
@endsection 