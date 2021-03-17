@extends('layouts.master')
@section('title')
<i class="ti-check-box"></i> Ubah Tindak Lanjut
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><i class="far fa-envelope-open"></i> No. Agenda : {{$datane->nmr_agenda}}</h3>
            </div>
            <div class="card-body">
                <form action="/suratmasuk/ubah/tindaklanjut/{{$datane->id}}/go" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="nmr_agenda" value="{{$datane->nmr_agenda}}">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="wfirstName2"> Tindak Lanjut : <span class="danger">*</span> </label>
                                    <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Tindak Lanjut" name="tindaklanjut"></textarea> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
                        <button type="reset" class="btn btn-danger"> <i class="fas fa-undo-alt"></i> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection