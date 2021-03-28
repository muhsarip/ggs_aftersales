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
                {!! $setting->term_of_warranty !!}
            </div>
        </div>

        <div class="text-center" id="agreeForm">
            <div class="form-group">
                <input type="checkbox" id="agree" value="yes">
                <label for="agree">Saya menyetujui syarat dan ketentuan diatas</label>
            </div>
            <div class="text-center">
                <button id="agreeButton" class="btn btn-primary">Lanjutkan</button>
            </div>
        </div>

        <form style="display: none;" method="post" id="actionForm" action="{{url('warranty')}}"
            enctype="multipart/form-data">
            @csrf
            <div class="row mb-5">
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="">Nama <sup>*</sup> </label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat <sup>*</sup></label>
                        <textarea class="form-control" name="address" id="address" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Telepon <sup>*</sup> </label>
                        <input type="text" class="form-control" name="phone" id="phone" required>
                    </div>

                    <div class="form-group">
                        <label for="">Email<sup>*</sup></label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="">Nama Barang <sup>*</sup></label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" required>
                    </div>

                    <div class="form-group">
                        <label for="">Merk Barang <sup>*</sup></label>
                        <input type="text" class="form-control" name="merk_barang" id="merk_barang" required>
                    </div>

                    <div class="form-group">
                        <label for="">Serial Number <sup>*</sup></label>
                        <input type="text" class="form-control" name="serial_number" id="serial_number"
                            id="serial_number" required>
                    </div>

                    <div class="form-group">
                        <label for="">Detail Kerusakan <sup>*</sup></label>
                        <textarea name="detail_kerusakan" id="detail_kerusakan" class="form-control" rows="5"
                            required></textarea>
                    </div>


                </div>

                <div class="col-lg-12 col-12 ">
                    <h4>Attachment</h4>
                    <div class="row">

                        <div class="form-group col-lg-4 col-12 ">
                            <label for="">Foto Barang (1)</label>
                            @include('components.file-uploader',['id'=>'foto_barang_1'])
                            <small class="text-info">
                                (Gambar: png / jpg - Max Size 2mb)
                            </small>
                        </div>
                        <div class="form-group col-lg-4 col-12">
                            <label for="">Foto Barang (2)</label>
                            @include('components.file-uploader',['id'=>'foto_barang_2'])
                            <small class="text-info">
                                (Gambar: png / jpg - Max Size 2mb)
                            </small>
                        </div>
                        <div class="form-group col-lg-4 col-12">
                            <label for="">Nota Pembelian <sup>*</sup></label>
                            @include('components.file-uploader',['id'=>'file_nota_pembelian'])
                            <small class="text-info">(File : png / jpg / pdf - Max Size 2mb)</small>
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


@section('script')
<script>
    $("#agreeButton").on("click",function(){
        if($('#agree').is(":checked")){
            $("#agreeForm").hide();
            $("#actionForm").show();
            
   
        }else{
            alert("Anda harus menyetujui sayarat dan ketentuan diatas untuk melanjutkan pembuatan form.")
        }
    })


    $("#actionForm").on("submit",function(e){
        e.preventDefault()
        $.LoadingOverlay("show");
        $.ajax({
            type: "POST",
            dataType:"json",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function(response) {
                $.LoadingOverlay("hide");
                if(response.rma_id !=undefined){
                    Swal.fire({
                        icon: 'success',
                        text: 'Form berhasil dikirim, anda akan di redirect ke halaman baru.',
                    })
                    setTimeout(() => {
                        window.location=`/warranty/${response.rma_id}`
                    }, 1000);
                    
                }
            },
            error:function(){
                $.LoadingOverlay("hide");
                Swal.fire({
                    icon: 'error',
                    text: 'Something went wrong!',
                })
            }
        });

    })


</script>
@endsection