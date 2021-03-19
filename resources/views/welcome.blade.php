@extends('layouts.frontend.app')

@section('title','Home')

@section('content')
<div class="text-center">
    <h1>Welcome to Aftersales Goodgaming Shop</h1>


    <div style="margin-top:50px;">
        <p>Silahkan pilih layanan yang anda inginkan:</p>

        <a href="{{url('warranty')}}" class="btn btn-primary btn-lg mr-3">Klaim Warranty
            <i class="fa fa-arrow-right"></i>
        </a>
        <a href="{{url('service')}}" class="btn btn-success btn-lg">Service
            <i class="fa fa-arrow-right"></i>
        </a>
    </div>
</div>
@endsection