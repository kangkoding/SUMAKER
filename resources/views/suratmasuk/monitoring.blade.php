@extends('layouts.master')
@section('title')
<i class="ti-check-box"></i> Monitoring Surat Masuk
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-subtitle">Rekap Surat Masuk</h4>
				<div class="table-responsive m-t-40">
					<table id="datatable-suratmasuk" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>No. Agenda<br><hr />No. Surat</th>
						<th>Jenis</th>
						<th>Tingkat Keamanan</th>
						<th>Asal</th>
						<th>Tanggal Surat</th>
						<th>Tanggal Diterima</th>
						<th>Tanggal Penyelesaian</th>
						<th>Tindak Lanjut</th>
						<th>Ringkasan</th>
						<th>Disposisi ke</th>
						<th>Download</th>
						<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($datane as $data)
						<tr>
							<td>{{$data->nmr_agenda}}<br><hr />{{$data->nmr_surat}}</td>
							<td>{{$data->jns_surat}}</td>
							<td>{{$data->tkt_keamanan}}</td>
							<td>{{$data->asal_surat}}</td>
							<td>{{$data->tgl_surat}}</td>
							<td>{{$data->tgl_diterima}}</td>
							<td>{{$data->tgl_penyelesaian}}</td>
							<td>{{$data->tindaklanjut}}</td>
							<td>{{$data->ringkasan}}</td>
							<td>
								<?php
									$dataDisp = new App\disposisi;
									$disp = $dataDisp->select('disposisi.*','pegawai.sebagai')->join('pegawai','disposisi.id_tujuan','=','pegawai.pegawai_id')->where('disposisi.suratmasuk_id', $data->id)->get();
									$no = 0;
									foreach ($disp as $key){
									  echo (++$no).'. '.$key->sebagai;
									  echo "<br>";
									}
								?>
							</td>
							<td>@if($data->lampiran != NULL)
							    <a class="btn default btn-outline" href="/suratmasuk/lampiran/{{$data->id}}/download">
                                    <i class="fas fa-download"></i> {{$data->lampiran}}
                                </a>
                                @else
                                Tidak ada lampiran.
                                @endif
                                </td>
							@if(Session::get('role') != 'SEKSI')
							<td><button type="button" style="width: 50%;" class="btn btn-success btn-rounded" onclick="window.location.href='/suratmasuk/ubah/{{$data->id}}'"><i class="fas fa-edit"></i> Ubah</button>&nbsp;<button type="button" style="width: 50%;" class="btn btn-danger btn-rounded" onclick="window.location.href='/suratmasuk/hapus/{{$data->id}}'"><i class="fas fa-trash-alt"></i> Hapus</button>
							@endif
							@if(Session::get('role')=='ADMIN')
							<br><hr /><button type="button" style="width: 50%;" class="btn btn-info btn-rounded" onclick="window.location.href='/suratmasuk/disp/{{$data->id}}'"><i class="ti-share"></i> Disposisi</button>&nbsp;<button type="button" style="width: 50%;" class="btn btn-warning btn-rounded" onclick="window.location.href='/suratmasuk/disp/cetak/{{$data->id}}'"><i class="ti-printer"></i> Cetak Disposisi</button></td>
							@endif
							@if(Session::get('role') == 'SEKSI')
							<td>
								<button type="button" style="width: 100%;" class="btn btn-info btn-rounded" onclick="window.location.href='/suratmasuk/ubah/tindaklanjut/{{$data->id}}'"><i class="fas fa-edit"></i> Tindak Lanjut</button>
							</td>
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