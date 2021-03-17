@extends('layouts.master')
@section('title')
<i class="ti-files"></i> Lampiran Surat Masuk
@endsection
@section('content')
<div class="row el-element-overlay">
    @if($count > 0)
    @foreach($datane as $data)
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1">
                    <img src="/assets/images/logo/pdf-icon.png" alt="user" />
                    <div class="el-overlay">
                        <ul class="el-info">
                            <li>
                                <a class="btn default btn-outline" href="/suratmasuk/lampiran/{{$data->id}}/download">
                                    <i class="fas fa-download"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="el-card-content">
                    <h4 class="box-title">{{$data->lampiran}}</h4>
                    <br/> </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fas fa-exclamation"></i> Tidak ada lampiran yang tersedia.</h3>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection