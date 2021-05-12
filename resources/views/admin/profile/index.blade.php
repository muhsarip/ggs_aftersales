@extends('layouts.admin.app')

@section('title','Edit Profile')

@section('content')
<div class="row justify-content-md-center">
    <div class="col-lg-6 col-xs-12">
        <h2>Edit Profile</h2>

        @if(Session::get('success'))
        <div class="alert alert-success">
            {{session::get('success')}}
        </div>
        @endif

        <form action="{{url('admin/profiles/'.auth()->user()->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="">Name</label>
                <input name="name" value="{{auth()->user()->name}}" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input name="email" value="{{auth()->user()->email}}" type="text" class="form-control">
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save
                </button>
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
        </form>
    </div>


</div>
@endsection