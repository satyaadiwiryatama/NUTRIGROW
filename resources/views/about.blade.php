@extends('layouts.app')
@section('title', 'About Me')
@section('content')
@include('partials.pagehead', ['title' => 'About Me'])
<div class="w in">
    <div class="pers">
        @foreach($people as $p)
            <article class="pc {{ $p['rev'] ? 'rev' : '' }}">
                <div class="pp" style="--c:{{ $p['color'] }}">
                    <img src="{{ asset('images/'.$p['img']) }}" alt="Foto {{ $p['name'] }}">
                    <div class="gl qt">“{{ $p['quote'] }}”</div>
                    <div class="gl inf"><div>NIM<b>{{ $p['nim'] }}</b></div><div>Program Studi<b>{{ $p['prog'] }}</b></div></div>
                </div>
                <div class="pb">
                    <div class="nm"><h3>{{ $p['name'] }}</h3><span class="tag">{{ $p['tag'] }}</span></div>
                    <h4>{{ $p['head'] }}</h4>
                    {!! $p['body'] !!}
                </div>
            </article>
        @endforeach
    </div>
    <div class="band2" style="margin-top:30px"><span class="eyebrow">My Personal Quote</span><q>Becoming better, one step at a time.</q></div>
</div>
@endsection
