@extends('layouts.app')
@section('content')
<div class="hero2"><div class="w hg">
    <div>
        <span class="eyebrow">Edukasi Gizi Ibu dan Anak</span>
        <h1>Gizi Seimbang, Ibu Sehat, Anak Tumbuh Optimal</h1>
        <q>Selamat datang di media edukasi gizi ibu dan anak!</q>
        <p>Media ini menyediakan informasi dan edukasi mengenai pentingnya pemenuhan gizi seimbang sejak masa kehamilan, menyusui, hingga pemberian Makanan Pendamping ASI (MPASI). Pemenuhan gizi yang tepat merupakan salah satu faktor penting dalam menjaga kesehatan ibu serta mendukung pertumbuhan dan perkembangan anak secara optimal.</p>
        <a class="btn" href="{{ route('hamil') }}">Mulai belajar</a><a class="btn ghost" href="{{ route('about') }}">About Me</a>
    </div>
    <div class="sl">
        @foreach(['hamil', 'susu', 'm6', 'm9', 'm12'] as $i => $s)
            <img @class(['on' => $i == 0]) src="{{ asset('images/'.$s.'.jpg') }}" alt="Poster edukasi gizi">
        @endforeach
    </div>
</div></div>

<div class="sec"><div class="w two">
    <div><span class="eyebrow">Tentang Media Ini</span><h2>Belajar gizi sesuai tahapan kehidupan</h2></div>
    <div><p>Melalui media ini, ibu dan keluarga dapat mempelajari cara memenuhi kebutuhan gizi sesuai tahapan kehidupan, memilih makanan bergizi, serta menerapkan pola makan sehat dalam kehidupan sehari-hari.</p></div>
</div></div>

<div class="w" style="padding-bottom:60px">
    <span class="eyebrow">Materi Edukasi</span><h2>Pilih materi yang ingin dipelajari</h2>
    <div class="grid">
        @foreach($cards as $i => $c)
            <a class="card mc" href="{{ $c['usia'] ? route($c['route'], $c['usia']) : route($c['route']) }}">
                <img loading="lazy" src="{{ asset('images/'.$c['img']) }}" alt="">
                <small>Materi {{ $i + 1 }}</small><h3>{{ $c['title'] }}</h3>
                <p style="margin:0;color:var(--mute)">{{ $c['desc'] }}</p>
            </a>
        @endforeach
    </div>
</div>

<div class="sec dark"><div class="w">
    <span class="eyebrow" style="color:#fff;opacity:.8">Tujuan Edukasi</span><h2>Upaya kami membangun keluarga yang sehat</h2>
    <div class="grid">
        @foreach($goals as $i => $g)
            <div class="card"><span class="num">0{{ $i + 1 }}</span><p style="margin:0;color:inherit">{{ $g }}</p></div>
        @endforeach
    </div>
</div></div>

<div class="w sec"><div class="band2">
    <span class="eyebrow">Pesan Kami</span>
    <q>Awali kehidupan yang sehat dengan gizi yang tepat. Ibu sehat, ASI berkualitas, MPASI tepat, dan anak tumbuh optimal.</q>
    <p style="margin:0 auto;max-width:620px">Yuk, pelajari setiap materi dan terapkan dalam kehidupan sehari-hari untuk mewujudkan keluarga sehat dan generasi yang berkualitas!</p>
</div></div>
@endsection
