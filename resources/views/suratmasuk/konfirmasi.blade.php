@extends('layouts.master')
@section('title')
<i class="ti-save"></i> Buat Surat Masuk
@endsection
@section('content')
<div class="row" id="validation">
    <div class="col-12">
        <div class="card wizard-content">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <h6 class="card-subtitle"></h6>
                <form method="post" action="/suratmasuk/lampiran/{{$datane->id}}/download" class="validation-wizard wizard-circle" enctype="multipart/form-data">
                	{{csrf_field()}}
                    <!-- Cetak Lembar Disposisi -->
                    <h6>Cetak Lembar Disposisi</h6>
                    <!--href="/suratmasuk/lampiran/{{$data->id}}/download"-->
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wfirstName2"> Cetak Disposisi surat : </label>
                                    <input type="text" class="form-control required" name="nmr_surat"> Nomor Surat {{$datane->nmr_surat}}</div>
                            </div>
                            <div class="col-md-6">
                                <button type="button" style="width: 50%;" class="btn btn-warning btn-rounded" onclick="window.location.href='/suratmasuk/disp/cetak/{{$data->id}}'"><i class="ti-printer"></i> Cetak Disposisi</button>
                            </div>
                        </div>
                    </section>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection