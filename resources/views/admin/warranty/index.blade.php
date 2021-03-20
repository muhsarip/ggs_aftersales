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

    <form action="/admin/warranties" method="get">
        <div class="row my-4">
            <div class="col-lg-6 col-12">

                <div class="form-group">
                    <select class="form-control" name="status">
                        <option value="">Semua Status</option>
                        @foreach ($status as $item)
                        <option value="{{$item}}" class="text-uppercase" {{$item==request()->status?'selected':''}}>
                            {{$item}}
                        </option>
                        @endforeach
                    </select>
                </div>


            </div>
            <div class="col-lg-6 col-12">
                <div class="input-group">

                    <input type="text" value="{{request()->keyword}}" name="keyword" class="form-control"
                        placeholder="Cari dengan No. RMA / No. Service/ Nama Customer">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Barang</th>
                    <th>Tanggal Update</th>
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
                        {{$warranty->nama_barang}}
                    </td>
                    <td>
                        {{$warranty->updated_at->format("d F Y \n h:i")}}
                    </td>
                    <td class="text-uppercase">
                        {{$warranty->status}}
                    </td>
                    <td>
                        <a class="btn btn-info btn-sm mb-2" href="{{url('admin/warranties/'.$warranty->id)}}">
                            <i class="fa fa-search"></i>
                            Detail</a>
                        <a class="btn btn-primary btn-sm mb-2"
                            href="{{url('admin/warranties/'.$warranty->id.'/edit')}}">
                            <i class="fa fa-pencil"></i>
                            Edit</a>
                    </td>
                </tr>
                @endif

                @endforeach
                @if(count($warranties)==0)
                <tr>
                    <td colspan="8">Data belum tersedia</td>
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