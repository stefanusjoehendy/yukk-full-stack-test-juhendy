@extends('layout.app')

@section('styles')    
    @vite([View::getSection('path_page_js')])
@endsection

@section('body_content')
    @yield('content')
@endsection

@section('scripts')
    
@endsection