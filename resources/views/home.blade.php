@extends('layouts.app')

@section('content')
<h1 align='center'>Home</h1>
<p>Slider Should be Here!!</p>
@foreach($slider as $r)
<div>
    <img src="{{ $r->img }}" width="100%" height="500">
</div>
@endforeach
<form method="get" action="{{url('paket')}}">
    <div class="posisi-jadwalnya topnya-list">
        <div class="row">
            <label for="tanggalnya">
                <input type="date" class="form-control inputnya" name="t" id="tanggalnya">
            </label>
            <label for="paketnya">
                <select class="form-control inputnya" name="p" id="paketnya" autofocus="true">
                    <option value="">Pilih Paket</option>
                    @foreach($paket as $p)
                    <option value="{{$p->id}}">{{$p->nama}}</option>
                    @endforeach
                </select>
            </label>
                <button>
                    Cari
                </button>
            </div>
        </div>
    </div>
</form>
<div><h3 align='center'>PAKET UMROH</h3></div>
@foreach ($umroh as $r)
<div>
    <img src="{{ $r->paket->avatar }}" width="50" height="50">
    <div>
        {{$r->paket->nama}}
    </div>
    <a href="{{ route('detailproduk',[$r->id,$r->nama_jadwal_seo]) }}">lihat selengkapnya</a>
</div>
@endforeach
<div><h3 align='center'>PAKET HAJI</h3></div>
@foreach ($haji as $r)
<div>
    <img src="{{ $r->paket->avatar }}" width="50" height="50">
    <div>
        {{$r->paket->nama}}
    </div>
    <a href="{{ route('detailproduk',[$r->id,$r->nama_jadwal_seo]) }}">lihat selengkapnya</a>
</div>
@endforeach
<div><h3 align='center'>CUSTOMER REVIEW</h3></div>
<div>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</div>
<div><h3 align='center'>ARTIKEL ALISAN</h3></div>
@foreach ($artikel as $r)
<table>
    <tr>
      <th><img src="{{ $r->avatar }}" width="50" height="50"></th>
    </tr>
    <tr>
      <td>{{ $r->judul }}</td>
    </tr>
    <tr>
        <td>    
            <p>{!! $r->textlimit !!}</p>
            <a href="{{ route('detailartikel',[$r->id,$r->judul_seo]) }}">
            READ MORE
            </a>
        </td>
    </tr>
</table>
@endforeach
@endsection
