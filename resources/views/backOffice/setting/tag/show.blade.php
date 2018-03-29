@extends('layouts.backOffice.template-with-right-sidebar')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/back-office/<module_name>/show.css')}}"/>
@endsection

@section('module_name', 'MODULE_NAME')
@section('page_name', 'PAGE_NAME')

@section('body')
    <div>Visit http://localhost/home for Code sample</div>
    <div>Visit http://localhost/home2 for Code sample</div>
    <div>Visit http://localhost/home3 for Code sample</div>
    <div>Field 1: {{ $tag->id }}</div>
    <div>Field 2: {{ $tag->name }}</div>
    <div>{{ $tag->created_at->format('d/m/Y H:i') }}</div>
    <div>{{ $tag->updated_at->format('d/m/Y H:i') }}</div>

@endsection

@section('right-sidebar')
    <div>Right Sidebar</div>
@endsection

@section('script')
    <script src="{{ asset('js/back-office/<module_name>/show.js') }}"></script>
@endsection