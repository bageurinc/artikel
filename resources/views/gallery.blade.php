@extends('layouts.app')

@section('content')
<div  align='center'>
    <br>
    <br>
    <h1>GALLERY ALISAN</h1>
</div>
@foreach ($album as $r)
<div>
    <a href="{{ route('detailgallery',[$r->id,$r->nama_seo]) }}">{{ $r->group }}</a>
</div>
@endforeach
@foreach ($album as $r)
<div>
    <img src="{{ $r->avatar }}">
</div>
@endforeach

@endsection