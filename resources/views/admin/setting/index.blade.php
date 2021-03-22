@extends('layouts.admin.app')

@section('title','Home')

@section('source')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endsection

@section('content')
<div>
    <h2>Setting</h2>

    <form action="{{url('admin/settings/1')}}" method="POST">
        @csrf
        @method('put')
        <div class="row justify-content-md-center">
            <div class="col-lg-8 col-12">
                <div class="form-group">
                    <label for="">Syarat & Ketentuan Warranty</label>
                    <textarea id="term_of_warranty" class="form-control" name="term_of_warranty">
                        {{$setting->term_of_warranty}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="">Syarat & Ketentuan Service</label>
                    <textarea id="term_of_service" class="form-control" name="term_of_service">
                        {{$setting->term_of_service}}
                    </textarea>
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

@section('script')
<script>
    CKEDITOR.replace( 'term_of_warranty' );
    CKEDITOR.replace( 'term_of_service' );
</script>
@endsection