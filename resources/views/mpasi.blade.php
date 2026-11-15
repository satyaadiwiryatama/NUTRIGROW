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

    <div class="hd" style="margin-bottom:22px">
        <h3 style="margin:0;font-size:24px">MPASI usia {{ $m['t'] }}</h3>
        <span class="pill">{{ $m['s'] }}</span>
    </div>

    <div class="mpasi-grid">
        <div class="mpasi-col">
            <div class="mpasi-card">
                <h3>A. Tekstur makanan</h3>
                <ul>
                    @foreach($m['tek'] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="mpasi-card">
                <h3>B. Porsi dan frekuensi</h3>
                <ul>
                    @foreach($m['por'] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="mpasi-center">
            <div class="poster-card">
                <img class="plate-poster" src="{{ asset('images/'.$m['img']) }}" alt="Poster MPASI usia {{ $m['t'] }}">
            </div>
        </div>

        <div class="mpasi-col">
            <div class="mpasi-card">
                <h3>C. Contoh makanan bergizi</h3>
                <ul>
                    @foreach($m['mk'] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="mpasi-card">
                <h3>D. Tips pemberian MPASI</h3>
                <ul>
                    @foreach($m['tip'] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="msg" style="margin-top:32px">
        <q>MPASI bergizi, beragam, dan sesuai usia merupakan kunci mendukung tumbuh kembang anak secara optimal.</q>
    </div>
</div>
@endsection
