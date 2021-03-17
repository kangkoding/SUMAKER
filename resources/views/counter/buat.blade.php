@extends('layouts.master')
@section('title')
<i class="fas fa-building"></i> Tambah Counter
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white"><i class="fas fa-edit"></i> </h3>
            </div>
            <div class="card-body">
                <form action="/counter/tambah/go" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-body">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="wfirstName2"> Kode Counter : <span class="danger">*</span> </label>
                                <input type="text" class="form-control required" name="counter_kd"  onkeyup="this.value = this.value.toUpperCase();"> </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="wfirstName2"> Keterangan : <span class="danger">*</span> </label>
                                <input type="text" class="form-control required" name="keterangan"> </div>
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