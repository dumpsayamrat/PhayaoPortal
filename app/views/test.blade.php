<ul>
@foreach($result as $r)
    <li>{{$r->name}} - {{$r->link}} - {{$r->descript}}</li>
@endforeach
</ul>