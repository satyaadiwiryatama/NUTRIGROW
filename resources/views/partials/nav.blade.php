<a href="{{ route('beranda') }}" @class(['on' => request()->routeIs('beranda')])>Beranda</a>
<div class="dd"><span tabindex="0">Isi Piringku ▾</span><div>
    <a href="{{ route('hamil') }}" @class(['on' => request()->routeIs('hamil')])>Ibu Hamil</a>
    <a href="{{ route('menyusui') }}" @class(['on' => request()->routeIs('menyusui')])>Ibu Menyusui</a>
</div></div>
<div class="dd"><span tabindex="0">MPASI ▾</span><div>
    @foreach(config('edukasi.mpasi') as $slug => $m)
        <a href="{{ route('mpasi', $slug) }}">{{ $slug }} bulan</a>
    @endforeach
</div></div>
<a href="{{ route('konseling') }}" @class(['on' => request()->routeIs('konseling')])>Konseling</a>
<a href="{{ route('about') }}" @class(['on' => request()->routeIs('about')])>About Me</a>
