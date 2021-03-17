@extends('layouts.master')
@section('title')
<i class="ti-check-box"></i> Ubah Profil
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><i class="fas fa-edit"></i> </h3>
            </div>
            <div class="card-body">
                <form action="/loket/{{$datane->id}}/ubahprofilgo" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-body">
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="wfirstName2"> NIP : <span class="danger">*</span> </label>
                                        <input type="number" class="form-control required" name="nip" value="{{$datane->nip}}" required> </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="wfirstName2"> Gelar Depan : </label>
                                        <input type="text" class="form-control" name="gelar_dpn" value="{{$datane->gelar_dpn}}"> </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wfirstName2"> Nama : <span class="danger">*</span> </label>
                                        <input type="text" class="form-control required" name="nama" value="{{$datane->nama}}" required> </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="wfirstName2"> Gelar Belakang : </label>
                                        <input type="text" class="form-control" name="gelar_blkng" value="{{$datane->gelar_blkng}}"> </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wfirstName2"> Password : <span class="danger">*</span> </label>
                                        <input type="password" class="form-control required" name="password" required> </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wfirstName2"> Email : </label>
                                        <input type="text" class="form-control" name="email" value="{{$datane->email}}"> </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wfirstName2"> No. HP : </label>
                                        <input type="number" class="form-control required" name="hp" value="{{$datane->hp}}"> </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wfirstName2"> Alamat : </label>
                                        <input type="text" class="form-control" name="alamat" value="{{$datane->alamat}}"> </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="input-file-max-fs">Foto Profil : </label>
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