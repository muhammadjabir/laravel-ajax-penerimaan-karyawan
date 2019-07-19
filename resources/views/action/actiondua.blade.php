
    <form method="post" id="form-delete" class="form-inline float-right ml-1" action="{{$url_delete}}">
    @csrf
    <input type="hidden" name="_method" value="delete">

    <button class="btn btn-sm btn-danger shadow-sm"><i class="fa fa-trash"></i>&nbsp;</button>
    </form>
    @if($calon->lamaran->status == 0 and $calon->lamaran->interview == false)
    <a href="{{route('calon.create')}}" class="btn btn-info btn-sm shadow-sm float-right ml-1" data-id="{{$calon->lamaran->id}}" id="interview">Interview</a>
    @endif
   