@extends('layouts.admin.app')

@section('title','Home')

@section('content')
<div>
    <h2>Distrubutor</h2>

    <div class="text-right mb-5">
        <a href="{{url('admin/distributors/create')}}" class="btn btn-primary">Tambah Distributor</a>
    </div>
    @if(Session::get('success'))
    <div class="alert alert-success">
        {{session::get('success')}}
    </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Distributor</th>
                <td>No. Telepon</td>
                <td>Alamat</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($distributors as $distributor)
            <tr>
                <td>
                    {{$distributor->name}}
                </td>
                <td>
                    {{$distributor->phone}}
                </td>
                <td>
                    {{$distributor->address}}
                </td>
                <td>
                    <a href="{{url('admin/distributors/'.$distributor->id.'/edit')}}">Edit</a>
                </td>
            </tr>
            @endforeach
            @if(count($distributors)==0)
            <tr>
                <td colspan="4">Data belum tersedia</td>
            </tr>
            @endif

        </tbody>
    </table>

    <div>
        {{ $distributors->appends(request()->except('page'))->links() }}
    </div>
</div>
@endsection