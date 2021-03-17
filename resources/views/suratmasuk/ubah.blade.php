@extends('layouts.master')
@section('title')
<i class="ti-check-box"></i> Ubah Surat Masuk
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><i class="far fa-envelope-open"></i> No. Agenda : {{$datane->nmr_agenda}}</h3>
            </div>
            <div class="card-body">
                <form action="/suratmasuk/ubah/{{$datane->id}}/go" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="nmr_agenda" value="{{$datane->nmr_agenda}}">
                    <div class="form-body">
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wfirstName2"> Nomor Surat : <span class="danger">*</span> </label>
                                        <input type="text" class="form-control required" name="nmr_surat" value="{{$datane->nmr_surat}}" required> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wemailAddress2"> Tanggal Penerimaan : <span class="danger">*</span> </label>
                                        <input type="date" class="form-control" id="wdate1" name="tgl_diterima" value="<?php if($datane->tgl_diterima != null){
                                              echo date('Y-m-d', strtotime($datane->tgl_diterima));
                                            }else{
                                              echo '-';
                                            }
                                            ?>" required> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wphoneNumber2">Tanggal Penyelesaian : </label>
                                        <input type="date" class="form-control" id="wdate2" name="tgl_penyelesaian" disabled> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wphoneNumber2">Tanggal Surat : <span class="danger">*</span> </label>
                                        <input type="date" class="form-control" id="wdate3" name="tgl_surat" value="<?php if($datane->tgl_surat != null){
                                              echo date('Y-m-d', strtotime($datane->tgl_surat));
                                            }else{
                                              echo '-';
                                            }
                                            ?>" required> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wlastName2"> Tingkat Keamanan : <span class="danger">*</span> </label>

                                        <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="tkt_keamanan" class="custom-control-input" value="SR" <?php if($datane->tkt_keamanan == 'SR'){ echo 'checked'; }?>>
                                        <label class="custom-control-label" for="customRadio1">SR</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="tkt_keamanan" class="custom-control-input" value="R" <?php if($datane->tkt_keamanan == 'R'){ echo 'checked'; }?>>
                                        <label class="custom-control-label" for="customRadio2">R</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio3" name="tkt_keamanan" class="custom-control-input" value="B" <?php if($datane->tkt_keamanan == 'B'){ echo 'checked'; }?>>
                                        <label class="custom-control-label" for="customRadio3">B</label>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wfirstName2"> Asal Surat : <span class="danger">*</span> </label>
                                        <input type="text" class="form-control required" name="asal_surat" value="{{$datane->asal_surat}}" required> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wfirstName2"> Ringkasan Isi : </label>
                                        <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Ringkasan isi surat" name="ringkasan">{{$datane->ringkasan}}</textarea> </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wfirstName2"> Tindak Lanjut : <span class="danger">*</span> </label>
                                    <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Tindak Lanjut" name="tindaklanjut">{{$datane->tindaklanjut}}</textarea> </div>
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