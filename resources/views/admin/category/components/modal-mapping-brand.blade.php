<div class="modal" id="modal-brand">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="modal-brand-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" id="form-brands" action="/admin/categories/brands">
                    @csrf
                    <div class="form-group">
                        <label for="">Pilih merk : </label>
                        <select class="brands form-control" style="width:100%;" name="brands[]" multiple="multiple">
                            @foreach ($brands as $item)
                            <option value="{{$item->id}}">
                                {{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>


            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-submit-brands">Simpan</button>
            </div>

        </div>
    </div>
</div>