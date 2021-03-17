@extends('layouts.master')
@section('title')
<i class="ti-check-box"></i> Monitoring Surat Keluar
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-subtitle">Rekap Surat Keluar</h4>
				<div class="table-responsive m-t-40">
					<table id="datatable-suratkeluar" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>No. Agenda<br><hr />No. Surat</th>
						<th>Jenis</th>
						<th>Tanggal Surat</th>
						<th>Tanggal Keluar</th>
						<th>Ringkasan</th>
						<th>Download</th>
						<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($datane as $data)
						<tr>
							<td>{{$data->nmr_agenda}}<br><hr />{{$data->nmr_surat}}</td>
							<td>{{$data->jns_surat}}</td>
							<td>{{$data->tgl_surat}}</td>
							<td>{{$data->tgl_keluar}}</td>
							<td>{{$data->ringkasan}}</td>
							<td>@if($data->lampiran != NULL)
							    <a class="btn default btn-outline" href="/suratkeluar/lampiran/{{$data->id}}/download">
                                    <i class="fas fa-download"></i> {{$data->lampiran}}
                                </a>
                                @else
                                Tidak ada lampiran.
                                @endif
                                </td>
							<td><button type="button" style="width: 50%;" class="btn btn-success btn-rounded" onclick="window.location.href='/suratkeluar/ubah/{{$data->id}}'"><i class="fas fa-edit"></i> Ubah</button>&nbsp;<button type="button" style="width: 50%;" class="btn btn-danger btn-rounded" onclick="window.location.href='/suratkeluar/hapus/{{$data->id}}'"><i class="fas fa-trash-alt"></i> Hapus</button><br><hr />
							@if($data->tgl_dikirim == NULL)
							<button type="button" style="width: 100%;" class="btn btn-info btn-rounded" onclick="window.location.href='/suratkeluar/kirim/{{$data->id}}'"><i class="fas fa-paper-plane"></i> Kirim</button>
							@else
							<button type="button" style="width: 100%;" class="btn btn-info btn-rounded" disabled><i class="fas fa-paper-plane"></i> Terkirim</button>
							@endif
							</td>
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