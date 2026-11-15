@extends('layouts.app')
@section('title', $title)
@section('content')
@include('partials.pagehead')
<div class="w in">
    <div class="card intro-card">
        <p style="margin:0">{{ $d['intro'] }}</p>
    </div>

    <h3 class="plate-heading">Komponen makanan dalam Isi Piringku</h3>

    <div class="plate-grid">
        {{-- Kolom Kiri: 3 Kartu (Makanan pokok, Protein hewani, Protein nabati) --}}
        <div class="plate-col plate-left">
            @foreach(array_slice($d['items'], 0, 3) as $item)
                <div class="card plate-card">
                    <h4>{{ $item['title'] }}</h4>
                    @if(!empty($item['contoh']))
                        <p class="plate-contoh">{{ $item['contoh'] }}</p>
                    @endif
                    <div class="plate-lines">
                        @foreach($item['lines'] as $line)
                            <p>{{ $line }}</p>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Kolom Tengah: Poster --}}
        <div class="plate-col plate-center">
            <div class="poster-card">
                <img class="plate-poster" src="{{ asset('images/'.$img) }}" alt="Poster {{ $title }}">
            </div>
        </div>

        {{-- Kolom Kanan: 3 Kartu (Sayuran, Buah-buahan, Air putih) --}}
        <div class="plate-col plate-right">
            @foreach(array_slice($d['items'], 3, 3) as $item)
                <div class="card plate-card {{ !empty($item['is_air']) ? 'air-card' : '' }}">
                    <h4>{{ $item['title'] }}</h4>
                    @if(!empty($item['contoh']))
                        <p class="plate-contoh">{{ $item['contoh'] }}</p>
                    @endif
                    <div class="plate-lines">
                        @foreach($item['lines'] as $line)
                            <p>{{ $line }}</p>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @isset($d['ttd'])
        <div class="band ttd-card">
            <h3>Tablet Tambah Darah (TTD)</h3>
            <p style="margin:0">{{ $d['ttd'] }}</p>
        </div>
    @endisset

    <div class="msg" style="margin-top:28px">
        <h3>Pesan penting poster</h3>
        <div style="text-align:left;display:inline-block">
            @include('partials.list', ['items' => $d['pesan']])
        </div>
    </div>
</div>
@endsection
