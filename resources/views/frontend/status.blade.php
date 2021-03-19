@extends('layouts.frontend.app')

@section('title')
Warranty
@endsection

@section('content')
<div class="row justify-content-md-center">
    <div class="col-lg-9 col-12">
        <h2>Check status </h2>
        <div class="mt-5">
            <form action="/status/check" method="post">
                @csrf
                <div class="form-group">
                    <input type="email" value="" placeholder="Masukan email anda" class="form-control" name="email">
                </div>
                <div class="input-group">

                    <input type="text" value="" name="number" class="form-control"
                        placeholder="Masukan No. RMA / Service">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            @if (session()->has('errors'))
            <div class="alert alert-danger mt-5">
                {{$errors}}
            </div>
            @endif

            @if (session()->has('instance'))
            <div class="mt-5">
                @php
                $data = session()->get('instance');
                @endphp
                <p class="text-secondary">Status:</p>
                <h2>
                    <strong>
                        {{$data->no}}
                    </strong>
                </h2>
                <div class="alert alert-info">
                    <strong>
                        {{$data->status}}
                    </strong>
                </div>
                <br>
                <p class="text-secondary">Detail:</p>
                <div class="row mt-4">
                    <div class="col-lg-6 col-12">
                        <table style="width:100%">
                            <tr>
                                <td width="100">Nama</td>
                                <td>: {{$data->name}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: {{$data->address}}</td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>: {{$data->phone}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: {{$data->email}}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-lg-6 col-12">
                        <table>
                            <tr>
                                <td width="150">Nama Barang</td>
                                <td>: {{$data->nama_barang}}</td>
                            </tr>
                            <tr>
                                <td>Serial Number</td>
                                <td>: {{$data->serial_number}}</td>
                            </tr>
                            <tr>
                                <td>Detail Kerusakan</td>
                                <td>: {{$data->detail_kerusakan}}</td>
                            </tr>
                        </table>
                    </div>

                </div>

                <br>
                <br>
                @if ($data->distributor)
                <p class="text-secondary">Info Distributor:</p>
                <div class="mt-2 alert alert-success">
                    <h2>
                        <strong>{{$data->distributor->name}}</strong>
                    </h2>
                    <p>
                        <small>Alamat</small>: {{$data->distributor->address}} <br>
                        <small>Telepon</small>: {{$data->distributor->phone}}
                    </p>
                    <p>

                    </p>
                </div>
                @endif

                <br>
            </div>
            @endif


        </div>
    </div>

    <div>

    </div>
</div>

@endsection