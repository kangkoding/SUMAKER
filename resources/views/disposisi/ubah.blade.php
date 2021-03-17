@extends('layouts.master')
@section('title')
<i class="ti-share"></i> Disposisi
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-subtitle">Ubah Disposisi</h4>
				<form action="/suratmasuk/disp/ubah/{{$datane->id}}/go" method="post" enctype="multipart/form-data">
				    {{csrf_field()}}
				    <div class="form-body">
				        <div class="row">
				        		<div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="control-label"> Tujuan : </label>
                                        <select class="form-control custom-select" name="id_tujuan" required>
                                        	<option value="">-- Pilih Tujuan Disposisi --</option>
                                            @foreach($dataSeksi as $datas)
                                              <option value="{{$datas->pegawai_id}}" {{ ($datane->id_tujuan == $datas->pegawai_id) ? 'selected' : ''}}>{{$datas->sebagai}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
				                <div class="col-md-6">
				                    <div class="form-group">
				                        <label for="wfirstName2"> Isi Disposisi : </label>
				                        <textarea class="form-control" id="exampleTextarea" rows="6" placeholder="" name="isi_disposisi" required>{{$datane->isi_disposisi}}</textarea> </div>
				                </div>
				            </div>
				    </div>
				    <div class="form-actions">
				        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Tambah</button>
				        <button type="reset" class="btn btn-danger"> <i class="fas fa-undo-alt"></i> Batal</button>
				    </div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection