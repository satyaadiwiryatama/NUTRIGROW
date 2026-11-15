<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Edukasi Gizi Ibu dan Anak')</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500&family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header><div class="w hb">
    <a class="logo" href="{{ route('beranda') }}"><span class="lg">✦</span><b>Gizi Ibu &amp; Anak</b></a>
    <nav id="top" aria-label="Menu utama">@include('partials.nav')</nav>
    <button class="ib" id="mb" aria-label="Buka menu">☰</button>
</div></header>
<div id="scrim"></div>
<nav id="drawer" aria-label="Menu"><button class="ib" id="cb" aria-label="Tutup menu">✕</button><div id="links">@include('partials.drawer')</div></nav>
<main id="app"><section class="on">@yield('content')</section></main>
<footer>
    <div class="w fg">
        <div><div class="logo"><span class="lg">✦</span><b>Gizi Ibu &amp; Anak</b></div><p>Gizi Seimbang, Ibu Sehat, Anak Tumbuh Optimal.</p></div>
        <div><h4>Navigasi</h4><a href="{{ route('beranda') }}">Beranda</a><a href="{{ route('about') }}">About Me</a></div>
        <div><h4>Materi</h4><a href="{{ route('hamil') }}">Isi Piringku Ibu Hamil</a><a href="{{ route('menyusui') }}">Isi Piringku Ibu Menyusui</a><a href="{{ route('mpasi') }}">MPASI 6–23 Bulan</a></div>
        <div><h4>Hubungi Kami</h4><a href="tel:{{ str_replace([' ', '-'], '', config('edukasi.phone')) }}">📞 {{ config('edukasi.phone') }}</a><a href="https://wa.me/{{ config('edukasi.wa') }}">WhatsApp</a></div>
    </div>
    <div class="cp">Media edukasi gizi ibu dan anak</div>
</footer>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
