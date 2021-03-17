@extends('layouts.master')
@section('title')
<i class="fas fa-building"></i> Ubah Kantor/Instansi
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><i class="fas fa-edit"></i> </h3>
            </div>
            <div class="card-body">
                <form action="/kantorgo" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="wfirstName2">Nama Kantor/Instansi (Kop Surat) : <span class="danger">* </span> </label>
                                    <textarea class="form-control" id="exampleTextarea" rows="3" name="nama_kantor" placeholder="Gunakan <br> agar text berpindah baris Contoh : KEMENTRIAN <br> CABANG <br>" required>{{$datane->nama_kantor}}</textarea>
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="wfirstName2">Alamat Kantor/Instansi : <span class="danger">*</span> </label>
                                    <textarea class="form-control" id="exampleTextarea" rows="3" name="alamat_kantor" placeholder="Contoh : Jl. Dr. Radjimin. Telp. (0274) 869501,869502 Fax. (0274) 869144 Triharjo, Sleman, Kode Pos 55514" required>{{$datane->alamat_kantor}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="wfirstName2"> Email : <span class="danger">*</span> </label>
                                <input type="text" class="form-control required" name="email" value="{{$datane->email}}"> </div>
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