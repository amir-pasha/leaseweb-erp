<div>
    <a href="{{ $data->previousPageUrl() }}"></a>
    @for($i=1; $i<=$data->lastPage(); $i++)
        <a href="{{$data->url($i)}}">{{$i}}</a>
    @endfor
    <a href="{{ $data->nextPageUrl() }}"></a>
    - Total {{ $data->total() }}
</div>
