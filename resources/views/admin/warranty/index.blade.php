@extends('layouts.admin.app')

@section('title','Home')

@section('content')
<div>
    <h2>Aftersales Data</h2>
    @if(Session::get('success'))
    <div class="alert alert-success">
        {{session::get('success')}}
    </div>
    @endif

    <div class="row">
        <div class="">

        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>No. Telepon</th>
                    <th>Email</th>
                    <th>Barang</th>
                    <th>Status</th>
                    <th width="180"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($warranties as $warranty)
                @if ($warranty->no != '')
                <tr>
                    <td>
                        {{$warranty->type}}
                    </td>
                    <td>
                        {{$warranty->no}}
                    </td>
                    <td>
                        {{$warranty->name}}
                    </td>
                    <td>
                        {{$warranty->phone}}
                    </td>
                    <td>
                        {{$warranty->email}}
                    </td>
                    <td>
                        {{$warranty->nama_barang}}
                    </td>
                    <td class="text-uppercase">
                        {{$warranty->status}}
                    </td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{url('admin/warranties/'.$warranty->id)}}">
                            <i class="fa fa-search"></i>
                            Detail</a>
                        <a class="btn btn-primary btn-sm" href="{{url('admin/warranties/'.$warranty->id.'/edit')}}">
                            <i class="fa fa-pencil"></i>
                            Edit</a>
                    </td>
                </tr>
                @endif

                @endforeach
                @if(count($warranties)==0)
                <tr>
                    <td colspan="4">Data belum tersedia</td>
                </tr>
                @endif

            </tbody>
        </table>
    </div>


    <div>
        {{ $warranties->appends(request()->except('page'))->links() }}
    </div>
</div>
@endsection