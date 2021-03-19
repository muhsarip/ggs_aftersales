@extends('layouts.frontend.app')

@section('title')
Service
@endsection

@section('content')
<div class="row justify-content-md-center">
    <div class="col-lg-12">
        <h2>Form Service</h2>
        <br>
        <br>
        @if($errors->any())
        <div class="alert alert-danger">

            <h4>{{$errors->first()}}</h4>
        </div>
        @endif

        <div class="border p-3 mb-2">
            <h4>Syarat dan Ketentuan Service:</h4>
            <div>
                <ul>
                    <li>User berkwajiban untuk membayarkan ongkos kirim pulang dan Pergi </li>
                    <li>User berkewajiban untuk mempacking barang seaman mungkin Kerusakan pada proses pengiriman tidak
                        menjadi tanggung jawab pihak GOODGAMINGSHOP</li>
                    <li>User berkewajiban mengirimkan foto Fisik kepada pihak GGS melalui WA disertakan dengan Nomer
                        Servican yang nantinya akan didapatkan di email anda </li>
                    <li>User berkewajiban untuk membuat video produknya sebelum barang itu dikirim disertakan dengan
                        Nomer Servican yang nantinya akan didapatkan di email anda</li>
                </ul>
            </div>
        </div>

        <form method="post" action="{{url('service')}}">
            @csrf
            <div class="row mb-5">
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="">Nama <sup>*</sup> </label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat <sup>*</sup></label>
                        <textarea class="form-control" name="address" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Telepon <sup>*</sup> </label>
                        <input type="text" class="form-control" name="phone" required>
                    </div>

                    <div class="form-group">
                        <label for="">Email<sup>*</sup></label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="">Nama Barang <sup>*</sup></label>
                        <input type="text" class="form-control" name="nama_barang" required>
                    </div>

                    <div class="form-group">
                        <label for="">Serial Number <sup>*</sup></label>
                        <input type="text" class="form-control" name="serial_number" required>
                    </div>

                    <div class="form-group">
                        <label for="">Detail Kerusakan <sup>*</sup></label>
                        <textarea name="detail_kerusakan" class="form-control" rows="5" required></textarea>
                    </div>


                </div>
                <div class="col-lg-12">
                    <p style="color: gray">
                        Note <sup>*</sup> : wajib diisi
                    </p>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Ajukan Serivce</button>
                    </div>
                </div>


            </div>




        </form>
    </div>

</div>

@endsection