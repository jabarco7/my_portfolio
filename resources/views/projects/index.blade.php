@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <!-- Hero Section -->
    @include('projects.components.hero')

    <!-- Filter Section -->
    @include('projects.components.filter')

    <!-- Projects Grid Section -->
    @include('projects.components.grid')

    <!-- Project Process Section -->
    @include('projects.components.process')

    <!-- Project Modal -->
    @include('projects.components.modal')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/projects.css') }}">
@endpush

@push('scripts')
    <script type="module" src="{{ asset('js/projects-main.js') }}"></script>
@endpush