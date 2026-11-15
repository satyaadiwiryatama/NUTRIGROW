<a href="{{ route('beranda') }}">Beranda</a>
<a href="{{ route('hamil') }}">Isi Piringku Ibu Hamil</a>
<a href="{{ route('menyusui') }}">Isi Piringku Ibu Menyusui</a>
@foreach(config('edukasi.mpasi') as $slug => $m)
    <a href="{{ route('mpasi', $slug) }}">MPASI {{ $slug }} bulan</a>
@endforeach
<a href="{{ route('about') }}">About Me</a>
