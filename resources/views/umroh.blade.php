@extends('layouts.app')

@section('content')
<div  align='center'>
    <br>
    <br>
    <h1>PAKET UMROH ALISAN</h1>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    </p>
</div>
<div  align='center'>
    <br>
    <br>
    @foreach ($umroh as $r)
    <br>
        <div>
            <img src="{{ $r->paket->avatar }}" width="50" height="50">
            <div>
                {{ $r->nama_jadwal }}
            </div>
            <a href="{{ route('detailumroh',[$r->id,$r->nama_jadwal_seo]) }}">View Details</a>
        </div>
    <br>
    @endforeach
</div>
@endsection