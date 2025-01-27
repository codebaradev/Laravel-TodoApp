@extends('layouts.app')

@section('title', $title)

@push('styles')
    <link rel="stylesheet" href="/styles/todo/edit.css">
@endpush
    
@section('content')
    @include('partials.sidebar')

    <section class="dashboard-section">
        <div class="todo-container">
            <form action="" method="post">
                @csrf

                <div class="text-field">
                    <label for="title">Titile</label>
                    <input id="title" type="text" value="{{ $todo->title }}" name="todo_title" placeholder="Title" required>
                </div>
                
                <div class="checkbox-field">
                    <label for="is_completed">Is Completed</label>
                    <input id="is_completed" type="checkbox" name='todo_is_completed' @checked($todo->is_completed)>
                </div>

                <div class="description-field">
                    <label for="description">Description</label>
                    <textarea name="todo_description" id="description" cols="30" rows="10" placeholder="Write here...">{{ $todo->description }}</textarea>
                </div>
                
                <div class="button-container">
                    <a class="cancel-button" type="button" href="/dashboard">Cancel</a>
                    <button class="save-button" type="submit">Save</button>
                </div>
            </form>
        </div>
    </section>
@endsection