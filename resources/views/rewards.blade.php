@extends('layouts.app')

@section('content')

<div  align='center'>
    <br>
    <br>
    <div>Rewards & Acknowledgement</div>
</div>
<div  align='center'>
    <br>
    <br>
    @foreach ($reward as $r)
    <br>
        <div>
            <img src="{{ $r->img }}" width="50" height="50">
            <div>
                {{ $r->judul }}
            </div>
            <div>
                {!! $r->caption !!}
            </div>
        </div>
    <br>
    @endforeach
</div>
@endsection