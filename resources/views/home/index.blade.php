@extends('layouts.app')

@section('title', $title)

@push('styles')
    <link rel="stylesheet" href="styles/index.css">
@endpush
    
@section('content')
    <section class="main-section">
        <h1><span>Codebara</span> TodoApp</h1>
        <img src="assets/images/codebara.png" alt="">
        <div class="button-container">
            <a class="sign-up-button" href="/auth/register">Sign Up</a>
            <a class="login-button" href="/auth/login">Login</a>
        </div>
    </section>
@endsection