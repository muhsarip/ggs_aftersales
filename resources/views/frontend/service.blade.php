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
                {!! $setting->term_of_service !!}
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



        <form method="post" style="display: none;" id="actionForm" action="{{url('service')}}">
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
</script>
@endsection