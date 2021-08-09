@extends('layouts.admin.app')

@section('title','Kategori')

@section('content')
<div>
    <h2>Merk</h2>

    <div class="text-right mb-5">
        <a href="{{url('admin/brands/create')}}" class="btn btn-primary">Tambah Merk</a>
    </div>
    @if(Session::get('success'))
    <div class="alert alert-success">
        {{session::get('success')}}
    </div>
    @endif

    <form action="/admin/brands" method="get">
        <div class="row my-4">
            <div class="col-lg-6 col-12">
                <div class="input-group">

                    <input type="text" value="{{request()->keyword}}" name="keyword" class="form-control"
                        placeholder="Cari merk">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Merk</th>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
            <tr>
                <td>
                    {{$brand->name}}
                </td>
                <td class="text-right">
                    <a class="btn btn-sm btn-primary mr-2" href="{{url('admin/brands/'.$brand->id.'/edit')}}">Edit</a>
                    <a class="btn btn-sm btn-danger mr-2" href="{{url('admin/brands/'.$brand->id.'/edit')}}">Delete</a>
                </td>
            </tr>
            @endforeach
            @if(count($brands)==0)
            <tr>
                <td colspan="4">Data belum tersedia</td>
            </tr>
            @endif

        </tbody>
    </table>

    <div>
        {{ $brands->appends(request()->except('page'))->links() }}
    </div>


    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('script')
<script>

</script>
@endsection