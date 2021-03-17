@extends('layouts.master')
@section('title')
<i class="ti-save"></i> Buat Surat Keluar
@endsection
@section('content')
<div class="row" id="validation">
    <div class="col-12">
        <div class="card wizard-content">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <h6 class="card-subtitle"></h6>
                <form method="post" action="/suratkeluar/buat/go" class="validation-wizard wizard-circle" enctype="multipart/form-data">
                	{{csrf_field()}}
                    <!-- Langkah 1 -->
                    <h6>Langkah 1</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Jenis Agenda <span class="danger">*</span> </label>
                                    <select class="form-control custom-select" id="agenda" required>
                                    	<option value="">-- Pilih Agenda Surat --</option>
                                        @foreach($daftarAgenda as $dataAgenda)
                                                <option value="{{$dataAgenda->counter_kd}}">
                                                {{$dataAgenda->counter_kd}} -
                                                {{$dataAgenda->keterangan}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    </section>
                    <!-- Langkah  2-->
                    <h6>Langkah 2</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wfirstName2"> Nomor Agenda : <span class="danger">*</span> </label>
                                    <input type="text" class="form-control required" id="nmr_agenda" name="nmr_agenda" readonly>
                                    <input type="hidden" class="form-control required" id="jns_surat" name="jns_surat" readonly> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wemailAddress2"> Tanggal Keluar : <span class="danger">*</span> </label>
                                    <input type="date" class="form-control" id="wdate1" name="tgl_keluar" required> </div>
                            </div>
                        </div>
                    </section>
                    <!-- Langkah 3 -->
                    <h6>Langkah 3</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wfirstName2"> Nomor Surat : <span class="danger">*</span> </label>
                                    <input type="number" class="form-control required" name="nmr_surat" required> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wphoneNumber2">Tanggal Surat : <span class="danger">*</span> </label>
                                    <input type="date" class="form-control" id="wdate3" name="tgl_surat" required> </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="wfirstName2"> Ringkasan Isi : <span class="danger">*</span> </label>
                                    <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Ringkasan isi surat" name="ringkasan" required></textarea> </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                            	<div class="form-group">
                                <label for="input-file-max-fs">Lampiran : </label>
                                <input type="file" name="file" id="input-file-max-fs" class="dropify" data-max-file-size="20M" required /> </div>
                            </div>
                        </div>
                    </section>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection