@extends('layouts.master')
@section('title')
<i class="ti-check-box"></i> Ubah Surat Keluar
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><i class="far fa-envelope-open"></i> No. Agenda : {{$datane->nmr_agenda}}</h3>
            </div>
            <div class="card-body">
                <form action="/suratkeluar/ubah/{{$datane->id}}/go" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="nmr_agenda" value="{{$datane->nmr_agenda}}">
                    <div class="form-body">
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wfirstName2"> Nomor Surat : <span class="danger">*</span> </label>
                                        <input type="number" class="form-control required" name="nmr_surat" value="{{$datane->nmr_surat}}" required> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wemailAddress2"> Tanggal Surat : <span class="danger">*</span> </label>
                                        <input type="date" class="form-control" id="wdate1" name="tgl_surat" value="<?php if($datane->tgl_surat != null){
                                              echo date('Y-m-d', strtotime($datane->tgl_surat));
                                            }else{
                                              echo '-';
                                            }
                                            ?>" required> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wemailAddress2"> Tanggal Keluar : <span class="danger">*</span> </label>
                                        <input type="date" class="form-control" id="wdate1" name="tgl_keluar" value="<?php if($datane->tgl_keluar != null){
                                              echo date('Y-m-d', strtotime($datane->tgl_keluar));
                                            }else{
                                              echo '-';
                                            }
                                            ?>" required> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wfirstName2"> Ringkasan Isi : </label>
                                        <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Ringkasan isi surat" name="ringkasan">{{$datane->ringkasan}}</textarea> </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="input-file-max-fs">Lampiran : </label>
                                    <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="20M" /> </div>
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