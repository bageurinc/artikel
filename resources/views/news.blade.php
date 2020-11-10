@extends('layouts.app')

@section('content')
<div align='center'>
    <br>
    <br>
    <h1>NEWS & ARTIKEL UPDATE</h1>
</div>
@foreach($artikel as $r)
    <table>
    <thead>
        <tr>
            <th colspan="2">{{ $r->judul }}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">{{ $r->text_limit }}</td>
        </tr>
        <tr>
            <td colspan="2"><a href="{{ route('detailartikel',[$r->id,$r->judul_seo]) }}">Lihat Selengkapnya</a></td>
        </tr>
        <tr>
            <td>{{ $r->created_at }}</td>
            <td>{{ $r->author_id }}</td>
        </tr>
    </tbody>
@endforeach
@endsection
