@extends('layout.app')

@section('styles')
    @vite(['resources/js/header.js'])
    @vite([View::getSection('path_page_js')])
@endsection

@section('body_content')
    @include('base.header')
    @yield('content')
    @include('base.scrolltotop')
    {{-- @include('base.footer') --}}
@endsection

@section('scripts')
    
@endsection