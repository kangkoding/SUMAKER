@extends('layouts.master')
@section('title')
<i class="ti-check-box"></i> Counter Surat
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-subtitle">Counter di reset pada : <?php echo "1 Januari ".date("Y", strtotime(date("Y", time())." + 365 day")); ?></h4>
				<!--<div class="button-group"> 
				    <button type="button" class="btn waves-effect waves-light btn-rounded btn-success" onclick="window.location.href='/counter/buat'"> <i class="fas fa-plus"></i> Tambah Counter</button>
				</div>--> 
				<div class="table-responsive m-t-40">
					<table id="datatable-counter" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>Kode Counter</th>
						<th>Keterangan</th>
						<th>Nilai</th>
						@if(Session::get('role') == 'ADMIN')
						<th>Aksi</th>
						@endif
						</tr>
					</thead>
					<tbody>
						@foreach($datane as $data)
						<tr>
							<td>{{$data->counter_kd}}</td>
							<td>{{$data->keterangan}}</td>
							<td>{{$data->nilai}}</td>
							@if(Session::get('role') == 'ADMIN')
							<td><button type="button" style="width: 100%;" class="btn btn-success btn-rounded" onclick="window.location.href='/counter/edit/{{$data->id}}'"><i class="fas fa-edit"></i> Edit</button><!--&nbsp;<button type="button" style="width: 50%;" class="btn btn-danger btn-rounded" onclick="window.location.href='/counter/hapus/{{$data->id}}'"><i class="fas fa-trash"></i> Hapus</button>--><br><hr /><button type="button" style="width: 100%;" class="btn btn-info btn-rounded" onclick="window.location.href='/counter/reset/{{$data->id}}'"><i class="ti-reload"></i> Reset</button>
							@endif
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