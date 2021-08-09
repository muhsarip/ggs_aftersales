@extends('layouts.admin.app')

@section('title','Kategori')

@section('content')
<div>
    <h2>Kategori</h2>

    <div class="text-right mb-5">
        <a href="{{url('admin/categories/create')}}" class="btn btn-primary">Tambah Kategori</a>
    </div>
    @if(Session::get('success'))
    <div class="alert alert-success">
        {{session::get('success')}}
    </div>
    @endif

    <form action="/admin/categories" method="get">
        <div class="row my-4">
            <div class="col-lg-6 col-12">
                <div class="input-group">

                    <input type="text" value="{{request()->keyword}}" name="keyword" class="form-control"
                        placeholder="Cari kategori">
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
                <th>Kategori</th>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>
                    {{$category->name}}
                </td>
                <td class="text-right">
                    <a data-id="{{$category->id}}" class=" btn-mapping-brand btn btn-sm btn-primary mr-2"
                        href="#">Mapping
                        Merk ({{$category->brands_count}}) </a>
                    <a class="btn btn-sm btn-primary mr-2"
                        href="{{url('admin/categories/'.$category->id.'/edit')}}">Edit</a>
                    <a class="btn btn-sm btn-danger mr-2"
                        href="{{url('admin/categories/'.$category->id.'/edit')}}">Delete</a>
                </td>
            </tr>
            @endforeach
            @if(count($categories)==0)
            <tr>
                <td colspan="4">Data belum tersedia</td>
            </tr>
            @endif

        </tbody>
    </table>

    <div>
        {{ $categories->appends(request()->except('page'))->links() }}
    </div>
</div>


@include('admin.category.components.modal-mapping-brand')

@endsection

@section('script')
<script>
    let categories = {!!json_encode($categories)!!}.data

    $(document).ready(function() {
        $('.brands').select2();

        $(".btn-mapping-brand").on("click",function(e){
            e.preventDefault()

            let id = $(this).data("id");

            let category = categories.filter(val=>val.id==id)[0]
            let brandIds = category.brands.map(item=>item.pivot.brand_id);

            $('.brands').val(brandIds);
            $('.brands').select2({});

            $("#modal-brand-title").text(category.name)

            $("#form-brands").attr("action",`/admin/categories/${category.id}/brands`)

            $("#modal-brand").modal("show")
        }); 

        $("#btn-submit-brands").on("click",function(){
            $("#form-brands").submit();
        })
    });


</script>
@endsection