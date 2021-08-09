@extends('layouts.admin.app')

@section('title','Kategori')

@section('content')
<div>
    <h2 class="text-center">Form Tambah Kategori</h2>

    <div class="text-left mb-5">
        <a href="{{url('admin/categories')}}" class="btn btn-warning">Kembali ke list</a>
    </div>

    <form action="{{url('admin/categories')}}" method="POST">
        @csrf
        <div class="row justify-content-md-center">
            <div class="col-lg-6 col-12">
                <div class="form-group">
                    <label for="">Kategori</label>
                    <input type="text" class="form-control" name="name">
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