@extends('layouts.admin.app')

@section('title','Home')

@section('content')
<div>
    <h2 class="text-center">Form Tambah Distrubutor</h2>

    <div class="text-left mb-5">
        <a href="{{url('admin/distributors')}}" class="btn btn-warning">Kembali ke list</a>
    </div>

    <form action="{{url('admin/distributors')}}" method="POST">
        @csrf
        <div class="row justify-content-md-center">
            <div class="col-lg-6 col-12">
                <div class="form-group">
                    <label for="">Nama Distributor</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">Nomot Telepon</label>
                    <input type="text" class="form-control" name="phone">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea cols="5" class="form-control" name="address"></textarea>
                </div>
                <div class="my-4 text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </form>

</div>
@endsection