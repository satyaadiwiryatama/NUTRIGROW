@extends('layouts.app')
@section('title', $title)
@section('content')
@include('partials.pagehead')
@php $plate = config('edukasi.plate'); @endphp
<div class="w in">
    <div class="card"><p style="margin:0">{{ $d['intro'] }}</p></div>
    <h3 style="margin:26px 0 14px">Komponen makanan dalam Isi Piringku</h3>
    <div class="orb">
        <div class="col">
            @foreach([0, 1, 2] as $i)
                <div class="card comp"><h3>{{ $plate[$i][0] }}</h3><p style="margin:0 0 6px;color:var(--mute)">Contoh: {{ $plate[$i][1] }}.</p>@include('partials.list', ['items' => $d['c'][$i]])</div>
            @endforeach
        </div>
        <div class="ctr"><img class="poster" src="{{ asset('images/'.$img) }}" alt="Poster {{ $title }}"></div>
        <div class="col">
            @foreach([3, 4] as $i)
                <div class="card comp"><h3>{{ $plate[$i][0] }}</h3><p style="margin:0 0 6px;color:var(--mute)">Contoh: {{ $plate[$i][1] }}.</p>@include('partials.list', ['items' => $d['c'][$i]])</div>
            @endforeach
            <div class="band" style="margin:0"><h3>{{ isset($d['ttd']) ? 'Air putih' : 'Kebutuhan air putih' }}</h3>@include('partials.list', ['items' => $d['air']])</div>
        </div>
    </div>
    @isset($d['ttd'])
        <div class="band"><h3>Tablet Tambah Darah (TTD)</h3><p style="margin:0">{{ $d['ttd'] }}</p></div>
    @endisset
    <div class="msg"><h3>Pesan penting poster</h3><div style="text-align:left;display:inline-block">@include('partials.list', ['items' => $d['pesan']])</div></div>
</div>
@endsection
