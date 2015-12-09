@extends('layout.master')

@section('main')
    <div id="map"></div>

    @include('picture.upload');

@endsection

@section('style')
    @parent
    {!! HTML::style(elixir('css/map-lib.css')) !!}
@endsection

@section('script')
    @parent
    {{-- {!! HTML::script('http://maps.stamen.com/js/tile.stamen.js?v1.3.0') !!} --}}
    {!! HTML::script(elixir('js/map-lib.js')) !!}
    {!! HTML::script(elixir('js/map.js')) !!}
@endsection
