@extends('layouts.frontend.app')

@section('title')
Warranty
@endsection

@section('source')
<link rel="stylesheet" href="/css/print.min.css">
<script src="/js/print.min.js"></script>
@endsection


@section('content')
<div class="row justify-content-md-center">
    <div class="col-lg-12">
        <h2>Service </h2>
        <div class="my-2">
            <div class=" alert alert-success">
                Form pengajuan berhasil terkirim.
            </div>
        </div>

        <div>
            <p>Untuk proses selanjutnya anda harus mencetak form dengan mengklik tombol dibawah ini, lalu sertakan pada
                barang yang akan di kirim ke Toko GGS</p>

            <div class="text-center">
                <button onclick="printJS('printJS-form', 'html')" target="_blank" class="btn btn-primary btn-lg">
                    <i class="fa fa-print"></i> Cetak Form
                </button>
            </div>

        </div>

        <div class="row mt-4">

            <div class="col-lg-6 col-12">
                <table>
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

            <div class="col-lg-12">
                <div class="alert alert-info font-bold" style="font-size: 20px;padding:20px;margin-top:20px;">
                    Email : {{$data->email}} <br>
                    No. Servican : {{$data->ser_id}}
                </div>
            </div>

        </div>
    </div>
</div>


{{-- PRINT AREA --}}
<div class="d-none">
    <div id="printJS-form" style="margin:2% 5% 10% 5%">
        <table style="width:100%;">
            <tr>
                <td style="width: 100px;">
                    <img src="{{url('images/logo-ggs.png')}}" width="120" alt="">
                </td>
                <td>
                    <h1>Service Information</h1>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <h2 style="padding-left: 5px;">
            No. SERVICE : <strong>{{$data->ser_id}}</strong>
        </h2>
        <table style="width: 100%;font-size:20px;">
            <tr>
                <td style="width: 50%">
                    <table>
                        <tr>
                            <td>Nama Pelanggan</td>
                            <td>: <strong>{{$data->name}}</strong> </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <strong>{{$data->address}}</strong> </td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td>: <strong>{{$data->phone}}</strong> </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: <strong>{{$data->email}}</strong> </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td>Nama Barang</td>
                            <td>: <strong>{{$data->nama_barang}}</strong> </td>
                        </tr>
                        <tr>
                            <td>Serial Number</td>
                            <td>: <strong>{{$data->serial_number}}</strong> </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
        <div style="margin-top: 20px;font-size:20px;">
            <p>Detail Kerusakan</p>
            <h3><strong>
                    {{$data->detail_kerusakan}}
                </strong>

            </h3>
        </div>

        <div style="margin-top: 20px;">
            <p>
                This is text for claim text, so long and can be changed everywhehere
            </p>
        </div>

    </div>

</div>

@endsection