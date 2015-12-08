@extends('layout.master')

@section('main')
    <div id="map"></div>
@endsection

@section('style')
    @parent
    {!! HTML::style(elixir('css/map-lib.css')) !!}
@endsection

@section('script')
    @parent
    {!! HTML::script(elixir('js/map-lib.js')) !!}
    {!! HTML::script(elixir('js/map.js')) !!}
@endsection
