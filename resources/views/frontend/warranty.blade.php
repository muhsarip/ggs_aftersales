@extends('layouts.frontend.app')

@section('title')
Warranty
@endsection

@section('content')
<div class="row justify-content-md-center">
    <div class="col-lg-12">
        <h2>Form Pengajuan Warranty</h2>
        <br>
        <br>
        @if($errors->any())
        <div class="alert alert-danger">

            <h4>{{$errors->first()}}</h4>
        </div>
        @endif

        <div class="border p-3 mb-2">
            <h4>Syarat dan Ketentuan Garansi:</h4>
            <div>
                <ul>
                    <li>User harus menyerah barang yang di claim beserta dengan BOX TIDAK ADA BOX = TIDAK BISA DI CLAIM
                    </li>
                    <li>User harus menyertakan Struk belanja / bukti pembelian</li>
                    <li>User harus menyatakan bahwa tidak ada kerusakan fisik sebelum dikirimkan</li>
                    <li>Kerusakan fisik adalah mutlak tidak bisa di claim Garansi</li>
                    <li>Apabila terjadi kerusakan fisik dalam proses pengiriman bukan menjadi tanggung GGS</li>
                    <li>User berkewajiban untuk membayarkan ongkos kirim pulang pergi</li>
                    <li>User harus mensetujui lama nya proses garansi semua tergantung dari Distributor pemegang Merek
                        masing masing</li>
                </ul>
            </div>
        </div>

        <form method="post" action="{{url('warranty')}}" enctype="multipart/form-data">
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
                        <label for="">Merk Barang <sup>*</sup></label>
                        <input type="text" class="form-control" name="merk_barang" required>
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

                <div class="col-lg-12 col-12 ">
                    <h4>Attachment</h4>
                    <div class="row">

                        <div class="form-group col-lg-4 col-12 ">
                            <label for="">Foto Barang (1)</label>
                            <input type="file" name="foto_barang_1" class="form-control">
                            <small class="text-info">
                                (Gambar: png / jpg - Max Size 2mb)
                            </small>
                        </div>
                        <div class="form-group col-lg-4 col-12">
                            <label for="">Foto Barang (2)</label>
                            <input type="file" name="foto_barang_2" class="form-control">
                            <small class="text-info">
                                (Gambar: png / jpg - Max Size 2mb)
                            </small>
                        </div>
                        <div class="form-group col-lg-4 col-12">
                            <label for="">Nota Pembelian <sup>*</sup></label>
                            <input type="file" name="file_nota_pembelian" class="form-control" required>
                            <small class="text-info">(File : pdf - Max Size 2mb)</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <p style="color: gray">
                        Note <sup>*</sup> : wajib diisi
                    </p>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Ajukan Klaim</button>
                    </div>
                </div>


            </div>




        </form>



    </div>

</div>

@endsection