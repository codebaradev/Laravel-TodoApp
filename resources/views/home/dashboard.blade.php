@extends('layouts.app')

@section('title', $title)
    
@section('content')
    <section>
        <div>
            dashboard
        </div>
        <p>{{ $userId }}</p>
    </section>
@endsection