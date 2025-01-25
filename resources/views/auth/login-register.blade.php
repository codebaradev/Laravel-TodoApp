@extends('layouts.app')

@section('title', $title)

@push('styles')
    <link rel="stylesheet" href="/styles/auth/login-register.css">
@endpush
    
@section('content')
    <section class="section-container">

        {{-- Register or Login Section --}}

        <section class="login-register-section">

            
            <h1>{{ $title }}</h1>
            
            @if ($errors->any())
                <div class="errors-container">
                    <p>Testing</p>
                </div>
            @endif

            @if ($isRegister)        
                {{-- Register --}}
                @include('auth.register')
            @else
                {{-- Login --}}
                @include('auth.login')
            @endif
        </section>

        {{-- logo section --}}

        <section class="logo-section">
            <h1><span>Codebara</span> TodoApp</h1>
            <img src="/assets/images/codebara.png" alt="">
        </section>
    </section>

@endsection