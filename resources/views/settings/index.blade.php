@extends('layouts.app')

@section('title', $title)

@push('styles')
    <link rel="stylesheet" href="/styles/settings/index.css">
@endpush
    
@section('content')
    @include('partials.sidebar')

    <section class="dashboard-section">
        <div class="settings-container">
            <div class="settings-header">
                <h2>Settings</h2>
            </div>

            <div class="settings-body">
                @include('partials.settings-sidebar')
                @yield('setting-content')
            </div>
        </div>
    </section>
@endsection