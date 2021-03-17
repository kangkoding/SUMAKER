@extends('layouts.master')
@section('title')
<i class="icon-speedometer"></i> Dashboard
@endsection
@section('content')
<div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30">
                    @if(Session::get('foto_dir')!=NULL)<img src="{{'/assets/images/fotoprofil/'.Session::get('foto_dir')}}" class="img-circle" width="150" />
                    @else
                    <img src="/assets/images/users/5.jpg" class="img-circle" width="150" />
                    @endif
                    <h4 class="card-title m-t-10">{{Session::get('dpn')}} {{Session::get('nama')}} {{Session::get('blkng')}}</h4>
                    <h6 class="card-subtitle">PETUGAS LOKET</h6>
                </center>
            </div>
            <div>
                <hr> </div>
            <div class="card-body"> <small class="text-muted">Alamat Email</small>
                <h5>@if(Session::get('email')!=NULL) {{Session::get('email')}} @else {{'-'}} @endif</h5> <small class="text-muted p-t-30 db">No. HP</small>
                <h5>@if(Session::get('hp')!=NULL) {{Session::get('hp')}} @else {{'-'}} @endif</h5> <small class="text-muted p-t-30 db">Alamat</small>
                <h5>@if(Session::get('alamat')!=NULL) {{Session::get('alamat')}} @else {{'-'}} @endif</h5>
            </div>
        </div>
    </div>
</div>                    
@endsection