@extends('layout.master')

@section('main')
    <section class="page-section" id="section-map">
        <div id="map"></div>
    </section>

    @include('module.upload')

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
