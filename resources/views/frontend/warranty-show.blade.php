@extends('layouts.frontend.app')

@section('title')
Warranty
@endsection

@section('content')
<div class="row justify-content-md-center">
    <div class="col-lg-12">
        <h2>Warranty </h2>
        <div class="my-2">
            <div class=" alert alert-success">
                Form pengajuan berhasil terkirim.
            </div>
        </div>

        <div>
            <p>Untuk proses selanjutnya anda harus mencetak form dengan mengklik tombol dibawah ini, lalu sertakan pada
                barang yang akan di kirim ke Toko GGS</p>

            <div class="text-center">
                <a href="{{url('warranty-download/'.$data->rma_id)}}" target="_blank" class="btn btn-primary btn-lg">
                    <i class="fa fa-print"></i> Cetak Form
                </a>
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

        </div>
    </div>
</div>

@endsection