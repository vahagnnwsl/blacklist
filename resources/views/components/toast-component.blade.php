
<div class="alert alert-{{$class}} alert-dismissible fade show" role="alert"  style="position: absolute; top: 55px; right: 0;z-index: 255">
    {{$text}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

{{session()->forget('message')}}
