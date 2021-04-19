@extends('layouts.admin.app')

@section('title','Warranty')

@section('content')
<div>
    <h2 class="text-center">Update Status</h2>

    <div class="text-left mb-5">
        <a href="{{url('admin/warranties/')}}" class="btn btn-warning">Kembali ke list</a>
    </div>

    <form action="{{url('admin/warranties/'.$warranty->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="row justify-content-md-center">
            <div class="col-lg-6 col-12">
                <div class="form-group">
                    <label for="">No.</label>
                    <input type="text" class="form-control" readonly value="{{$warranty->no}}">
                </div>

                <div class="form-group">
                    <label for="">Nama Barang</label>
                    <input type="text" class="form-control" readonly value="{{$warranty->nama_barang}}">
                </div>

                <div class="form-group">
                    <label for="">Merk Barang</label>
                    <input type="text" class="form-control" readonly value="{{$warranty->merk_barang}}">
                </div>

                <div class="form-group">
                    <label for="">Detail Kerusakan</label>
                    <textarea class="form-control" readonly>{{$warranty->detail_kerusakan}}</textarea>
                </div>


                @if ($warranty->type == 'warranty')
                <div class="form-group">
                    <label for="">Distributor</label>
                    <select name="distributor_id" class="form-control">
                        <option value="">- pilih distributor -</option>
                        @foreach ($distributors as $distributor)
                        <option value="{{$distributor->id}}"
                            {{($warranty->distributor_id == $distributor->id?'selected':'')}}>
                            {{$distributor->name}}
                        </option>
                        @endforeach
                    </select>

                    <div class="form-group">
                        <label for="">Masukan Case ID </label>
                        <input type="text" class="form-control" name="case_id" value="{{ $warranty->case_id }}">
                    </div>
                </div>
                @endif

                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control" value="{{$status}}">
                        @foreach (config('warranty.status') as $status)
                        <option {{($warranty->status == $status?'selected':'')}}>
                            {{$status}}
                        </option>
                        @endforeach
                    </select>
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