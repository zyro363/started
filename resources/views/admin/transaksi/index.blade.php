@extends('admin.layouts.app', [
'activePage' => 'transaksi',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Data Transaksi</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Proses</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
               </ol>
            </nav>
         </div>
         <div class="col-md-6 col-sm-12">
            <div class="pull-right">
               <a href="/admin/transaksi/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
            </div>
         </div>
      </div>
   </div>
   <!-- Striped table start -->
   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-list"></i> List Data Transaksi</h2>
         </div>
      </div>
      <hr style="margin-top: 0px;">
      
      @if (session('error'))
      <div class="alert alert-danger">
         {{ session('error')}}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      @endif
      @if (session('success'))
      <div class="alert alert-success">
         {{ session('success')}}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      @endif

      <!-- Search and Filter Section -->
      <div class="row mb-3">
         <div class="col-md-6">
            <div class="form-group">
               <label>Show entries:</label>
               <select class="form-control form-control-sm" style="width: 80px;">
                  <option>10</option>
                  <option>25</option>
                  <option>50</option>
                  <option>100</option>
               </select>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
               <label>Search:</label>
               <input type="text" class="form-control form-control-sm" placeholder="Search transactions...">
            </div>
         </div>
      </div>

      <!-- Filter Section -->
      <div class="row mb-3">
         <div class="col-md-12">
            <form method="GET" action="/admin/transaksi" class="form-inline">
               <div class="form-group mr-2">
                  <label class="mr-2">Filter Tanggal:</label>
                  <input type="date" name="filter_date" class="form-control form-control-sm" value="{{ request('filter_date', date('Y-m-d')) }}">
               </div>
               <div class="form-group mr-2">
                  <label class="mr-2">Status:</label>
                  <select name="status" class="form-control form-control-sm">
                     <option value="">Semua Status</option>
                     <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Belum Bayar</option>
                     <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Lunas</option>
                     <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                  </select>
               </div>
               <button type="submit" class="btn btn-primary btn-sm mr-2">Filter</button>
               <a href="/admin/transaksi" class="btn btn-secondary btn-sm">Reset</a>
            </form>
         </div>
      </div>
             
      <table class="table table-striped table-bordered data-table hover">
          <thead class="bg-primary text-white">
             <tr>
                <th width="5%" >#</th>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Contact</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
                <th>Status</th>
                <th class="table-plus datatable-nosort text-center">Action</th>
               </tr>
            </thead>
            <tbody>
               <?php $no = 1; ?>
               @foreach($transaksi as $data)
               <tr>
                  <td class="text-center">{{$no++}}</td>
                  <td>{{date('d M Y', strtotime($data->tanggal))}}</td>
                  <td>{{$data->nama}}</td>
                  <td>{{$data->contact}}</td>
                  <td>Rp {{number_format($data->total, 0, ',', '.')}}</td>
                  <td>{{$data->nama_metode ?? '-'}}</td>
                  <td class="text-center">
                     @if($data->status == 'pending')
                        <span class="badge badge-warning">Belum Bayar</span>
                     @elseif($data->status == 'completed')
                        <span class="badge badge-success">Lunas</span>
                     @else
                        <span class="badge badge-danger">Dibatalkan</span>
                     @endif
                  </td>
                  <td class="text-center" width="20%">
                     <a href="/admin/transaksi/detail/{{$data->id}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                        <i class="fa fa-eye"></i>
                     </a>
                     <a href="/admin/transaksi/edit/{{$data->id}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Data">
                        <i class="fa fa-edit"></i>
                     </a>
                     <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#data-{{$data->id}}" data-toggle="tooltip" data-placement="top" title="Delete Data">
                        <i class="fa fa-trash"></i>
                     </button>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>

         <!-- Pagination Info -->
         <div class="row mt-3">
            <div class="col-md-6">
               <p>Showing {{$transaksi->count()}} of {{$transaksi->count()}} entries</p>
            </div>
            <div class="col-md-6 text-right">
               <nav>
                  <ul class="pagination pagination-sm">
                     <li class="page-item disabled"><a class="page-link" href="#">&lt;</a></li>
                     <li class="page-item active"><a class="page-link" href="#">1</a></li>
                     <li class="page-item disabled"><a class="page-link" href="#">&gt;</a></li>
                  </ul>
               </nav>
            </div>
         </div>
   </div>
   <!-- Striped table End -->
</div>
<!-- Modal -->
@foreach($transaksi as $data)
<div class="modal fade" id="data-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <h2 class="text-center">
            Apakah Anda Yakin Menghapus Data Ini ?
            </h2>
            <hr>
            <div class="form-group" style="font-size: 17px;">
               <label for="exampleInputUsername1">Tanggal</label>
               <input class="form-control" value="{{date('d M Y', strtotime($data->tanggal))}}" readonly style="background-color: white;pointer-events: none;">
            </div>
            <div class="form-group" style="font-size: 17px;">
               <label for="exampleInputUsername1">Nama Pelanggan</label>
               <input class="form-control" value="{{$data->nama}}" readonly style="background-color: white;pointer-events: none;">
            </div>
            <div class="form-group" style="font-size: 17px;">
               <label for="exampleInputUsername1">Total Harga</label>
               <input class="form-control" value="Rp {{number_format($data->total, 0, ',', '.')}}" readonly style="background-color: white;pointer-events: none;">
            </div>
            <div class="row mt-4">
               <div class="col-md-6">
                  <a href="/admin/transaksi/delete/{{$data->id}}" style="text-decoration: none;">
                  <button type="button" class="btn btn-primary btn-block">Ya</button>
                  </a>
               </div>
               <div class="col-md-6">
                  <button type="button" class="btn btn-danger btn-block" data-dismiss="modal" aria-label="Close">Tidak</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endforeach
@endsection

