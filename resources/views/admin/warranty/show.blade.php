@extends('layouts.admin.app')

@section('title','Detail')

@section('source')
<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="/css/magnific-popup.css">

<!-- Magnific Popup core JS file -->
<script src="/js/jquery.magnific-popup.js"></script>
@endsection

@section('content')
<div>
    <h2 class="text-center">No : {{$warranty->no}}</h2>

    <div class="text-left mb-5">
        <a href="{{url('admin/warranties/')}}" class="btn btn-warning">Kembali ke list</a>
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
                @if ($warranty->type=='warranty')
                <tr>
                    <td width="150">Merk Barang</td>
                    <td>: {{$warranty->merk_barang}}</td>
                </tr>
                @if ($warranty->distributor)
                <tr>
                    <td width="150">Dsitributor</td>
                    <td>: {{$warranty->distributor->name}}</td>
                </tr>
                <tr>
                    <td width="150">Case ID</td>
                    <td>: {{$warranty->case_id}}</td>
                </tr>
                @endif

                @endif
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

                    <a class="popup-link" href="{{Storage::url($warranty->foto_barang_1)}}">
                        <img class="img-fluid" src="{{Storage::url($warranty->foto_barang_1)}}" alt="">
                    </a>


                </div>
                @endif

                @if ($warranty->foto_barang_2 != '')
                <div class="col-lg-4 border border-secondary">
                    Foto Barang 2

                    <a class="popup-link" href="{{Storage::url($warranty->foto_barang_2)}}">
                        <img class="img-fluid" src="{{Storage::url($warranty->foto_barang_2)}}" alt="">
                    </a>

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


@section('script')
<script>
    $('.popup-link').magnificPopup({
  type: 'image'
  // other options
});
</script>

@endsection