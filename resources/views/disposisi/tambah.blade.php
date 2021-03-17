@extends('layouts.master')
@section('title')
<i class="ti-share"></i> Disposisi
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><i class="far fa-envelope-open"></i> No. Agenda : {{$dataSuratMasuk->nmr_agenda}} / Tambah Disposisi</h3>
            </div>
			<div class="card-body">
				<form action="/suratmasuk/disp/buat/{{$dataSuratMasuk->id}}/go" method="post" enctype="multipart/form-data">
				    {{csrf_field()}}
				    <input type="hidden" name="suratmasuk_id" value="{{$dataSuratMasuk->id}}">
				    <div class="form-body">
				        <div class="row">
				        		<div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="control-label"> Tujuan : </label>
                                        <select class="form-control custom-select" name="id_tujuan" required>
                                        	<option value="">-- Pilih Tujuan Disposisi --</option>
                                            @foreach($dataSeksi as $datas)
                                              <option value="{{$datas->pegawai_id}}">{{$datas->sebagai}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
				                <div class="col-md-6">
				                    <div class="form-group">
				                        <label for="wfirstName2"> Isi Disposisi : </label>
				                        <textarea class="form-control" id="exampleTextarea" rows="6" placeholder="" name="isi_disposisi" required></textarea> </div>
				                </div>
				            </div>
				    </div>
				    <div class="form-actions">
				        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Tambah</button>
				        <button type="reset" class="btn btn-danger"> <i class="fas fa-undo-alt"></i> Batal</button>

				        <button type="button" class="btn btn-info float-right" onclick="window.location.href='/suratmasuk/disp/{{$dataSuratMasuk->id}}'"> <i class="ti-arrow-left"></i> Kembali</button>
				    </div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection