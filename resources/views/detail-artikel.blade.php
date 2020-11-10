@extends('layouts.app')

@section('content')
<div align='center'>
    <img src="{{ $find->avatar }}" width="400" height="400">
    <h2>{{$find->judul}}</h2>
</div>
<div>
    <p>{!! $find->text !!}</p>
</div>
@endsection