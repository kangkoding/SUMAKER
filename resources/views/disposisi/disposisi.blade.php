@extends('layouts.master')
@section('title')
<i class="ti-share"></i> Disposisi
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><i class="far fa-envelope-open"></i> No. Agenda : {{$dataSuratMasuk->nmr_agenda}} </h3>
            </div>
			<div class="card-body">
				<div class="button-group"> 
				    <button type="button" class="btn waves-effect waves-light btn-rounded btn-success" onclick="window.location.href='/suratmasuk/disp/buat/{{$dataSuratMasuk->id}}'"> <i class="fas fa-plus"></i> Tambah Disposisi</button>
				</div>  
				<div class="table-responsive m-t-40">
					<table id="datatable-disposisi" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>Tujuan</th>
						<th>Isi Disposisi</th>
						<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($datane as $data)
						<tr>
							<td>{{$data->sebagai}}</td>
							<td>{{$data->isi_disposisi}}</td>
							<td><button type="button" style="width: 100%;" class="btn btn-success btn-rounded" onclick="window.location.href='/suratmasuk/disp/ubah/{{$data->id}}'"><i class="fas fa-edit"></i> Ubah</button><br><hr /><button type="button" style="width: 100%;" class="btn btn-danger btn-rounded" onclick="window.location.href='/suratmasuk/disp/hapus/{{$data->id}}'"><i class="fas fa-trash-alt"></i> Hapus</button></td>
						</tr>
						@endforeach
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection