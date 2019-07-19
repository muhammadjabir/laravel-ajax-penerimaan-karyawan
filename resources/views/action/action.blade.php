
    <form method="post" id="form-delete" class="form-inline float-right ml-2" action="{{$url_delete}}">
    @csrf
    <input type="hidden" name="_method" value="delete">
    <button class="btn btn-sm btn-danger shadow-sm"><i class="fa fa-trash"></i>&nbsp;</button>
    </form>
    <a href="{{$url_edit}}" data-edit="{{$data}}" id="edit" class="btn btn-sm btn-success shadow-sm float-right"><i class="far fa-edit"></i>&nbsp;</a>
        
