@extends('layouts.admin.app')

@section('title','Detail')

@section('content')
<div>
    <h2 class="text-center">No : {{$warranty->no}}</h2>

    <div class="text-left mb-5">
        <a href="{{url('admin/distributors/')}}" class="btn btn-warning">Kembali ke list</a>
    </div>

    <div class="row mt-4">

        <div class="col-lg-6 col-12">
            <table>
                <tr>
                    <td width="100">Nama</td>
                    <td>: {{$warranty->name}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{$warranty->address}}</td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>: {{$warranty->phone}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: {{$warranty->email}}</td>
                </tr>
            </table>
        </div>

        <div class="col-lg-6 col-12">
            <table>
                <tr>
                    <td width="150">Nama Barang</td>
                    <td>: {{$warranty->nama_barang}}</td>
                </tr>
                <tr>
                    <td>Serial Number</td>
                    <td>: {{$warranty->serial_number}}</td>
                </tr>
                <tr>
                    <td>Detail Kerusakan</td>
                    <td>: {{$warranty->detail_kerusakan}}</td>
                </tr>
            </table>
        </div>

        <div class="col-lg-12 mt-5">
            <div class="row">
                @if ($warranty->foto_barang_1 != '')
                <div class="col-lg-4 border border-secondary">
                    Foto Barang 1


                    <img class="img-fluid" src="{{Storage::url($warranty->foto_barang_1)}}" alt="">

                </div>
                @endif

                @if ($warranty->foto_barang_2 != '')
                <div class="col-lg-4 border border-secondary">
                    Foto Barang 2


                    <img class="img-fluid" src="{{Storage::url($warranty->foto_barang_2)}}" alt="">

                </div>
                @endif

                @if ($warranty->file_nota_pembelian != '')
                <div class="col-lg-4 border border-secondary">
                    Nota Pembelian <br>


                    <a href="{{Storage::url($warranty->file_nota_pembelian)}}">Open file new tab</a>

                </div>
                @endif

            </div>
        </div>

    </div>

</div>
@endsection