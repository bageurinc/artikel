@extends('layouts.app')

@section('content')
<div  align='center'>
    <br>
    <br>
    <h1>{{ $album->group }}</h1>
</div>
<div>
    @foreach ($albumdetail as $r)
        <img src="{{ $r->gambar }}">
    @endforeach
</div>
@endsection