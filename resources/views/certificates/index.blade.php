@extends('layouts.app')

@section('title', 'Certificates')

@section('content')
    <!-- Hero Section -->
    @include('certificates.components.hero')

    <!-- Filter Section -->
    @include('certificates.components.filter')

    <!-- Certificates Grid Section -->
    @include('certificates.components.grid')

    <!-- Certificate Modal -->
    @include('certificates.components.modal')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/certificates.css') }}">
@endpush

@push('scripts')
    <script type="module" src="{{ asset('js/certificates-main.js') }}"></script>
@endpush