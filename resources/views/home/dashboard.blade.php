@extends('layouts.app')

@section('title', $title)
    
@section('content')
    @include('partials.sidebar')

    <section class="dashboard-section">
        <div class="todolist-container">
            <div class="todolist-header">

            </div>

            <div class="todolist-body">
                <table class="todolsit-table">
                    
                </table>
            </div>
        </div>
    </section>
@endsection