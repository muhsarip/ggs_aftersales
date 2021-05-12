@extends('layouts.admin.app')

@section('title','Change Password')

@section('content')
<div class="row justify-content-md-center">
    <div class="col-lg-6 col-xs-12">
        <h2>Change Password</h2>

        @if(Session::get('success'))
        <div class="alert alert-success">
            {{session::get('success')}}
        </div>
        @endif

        <form action="{{ route('change-password.update',['user'=>auth()->user()->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="">Current Password</label>
                <input name="current_password" type="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">New Password</label>
                <input name="password" type="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">New Password Confirmation</label>
                <input name="password_confirmation" type="password" class="form-control">
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