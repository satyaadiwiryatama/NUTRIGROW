@extends('layouts.app')
@section('title', 'MPASI Sesuai Usia')
@section('content')
@include('partials.pagehead', ['title' => 'MPASI Sesuai Usia'])
<div class="w in">
    <div class="tabs" role="tablist">
        @foreach($all as $slug => $x)
            <a class="tab" role="tab" aria-selected="{{ $slug === $usia ? 'true' : 'false' }}" href="{{ route('mpasi', $slug) }}">{{ $x['t'] }}</a>
        @endforeach
    </div>
    <div class="hd" style="margin-bottom:16px"><h3 style="margin:0">MPASI usia {{ $m['t'] }}</h3><span class="pill">{{ $m['s'] }}</span></div>
    <div class="orb">
        <div class="col">
            <div class="card comp"><h3>A. Tekstur makanan</h3>@include('partials.list', ['items' => $m['tek']])</div>
            <div class="card comp"><h3>B. Porsi dan frekuensi</h3>@include('partials.list', ['items' => $m['por']])</div>
        </div>
        <div class="ctr"><img class="poster" src="{{ asset('images/'.$m['img']) }}" alt="Poster MPASI usia {{ $m['t'] }}"></div>
        <div class="col">
            <div class="card comp"><h3>C. Contoh makanan bergizi</h3>@include('partials.list', ['items' => $m['mk']])</div>
            <div class="card comp"><h3>D. Tips pemberian MPASI</h3>@include('partials.list', ['items' => $m['tip']])</div>
        </div>
    </div>
    <div class="msg"><q>MPASI bergizi, beragam, dan sesuai usia merupakan kunci mendukung tumbuh kembang anak secara optimal.</q></div>
</div>
@endsection
