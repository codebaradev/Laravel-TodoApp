@extends('layouts.app')

@section('title', $title)

@push('styles')
    <link rel="stylesheet" href="/styles/home/dashboard.css">
@endpush
    
@section('content')
    @include('partials.sidebar')

    <section class="dashboard-section">
        <div class="todolist-container">

            {{-- Todolist Header --}}

            <div class="todolist-header">
                <h2>Todolist</h2>
                <button onclick="displayFlexById('todolist-add-container'); focusByContainerId('todolist-add-container')">
                    <span>Add</span>
                    <svg fill="#ffffff" width="15px" height="15px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">

                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                        
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                        
                        <g id="SVGRepo_iconCarrier">
                        
                        <path d="M3,11h8V3a1,1,0,0,1,2,0v8h8a1,1,0,0,1,0,2H13v8a1,1,0,0,1-2,0V13H3a1,1,0,0,1,0-2Z"/>
                        
                        </g>
                    </svg>
                </button>

                <div class="todolist-add-container" id="todolist-add-container">
                    <form action="/todo/add" method="post">
                        @csrf
                        <div class="todolist-add-header">
                            <h2>Add New <span>Todo</span></h2>
                            <button type="button" onclick="displayNoneById('todolist-add-container')">
                                <svg width="20px" height="20px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" stroke="#ffffff">
        
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                    
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                    
                                    <g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}</style> </defs> <title/> <g id="cross"> <line class="cls-1" x1="7" x2="25" y1="7" y2="25"/> <line class="cls-1" x1="7" x2="25" y1="25" y2="7"/> </g> </g>
                                </svg>
                            </button>
                        </div>
                        <input type="text" name="todo_title" placeholder="new todo" required>
                        <div class="button-container">
                            <button class="cancel-button" type="button" onclick="displayNoneById('todolist-add-container')">Cancel</button>
                            <button class="save-button" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Todolist Body --}}

            <div class="todolist-body">
                <table class="todolist-table">
                    {{-- <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                    </thead> --}}
                    <tbody>
                        @foreach ($todos as $todo)
                            
                        <tr onclick="directToUrl('/todos/{{ $todo->id }}')">
                            <td class="check-td">
                                <div>
                                    <input type="checkbox" disabled @checked($todo->is_completed)>
                                </div>
                            </td>
                            <td>{{ $todo->title }}</td>
                            <td class="delete-td">
                                <form action="/todo/delete" method="post">
                                    @csrf
                                    <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                    <button type="submit">
                                        <svg width="15px" height="15px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="#ffffff" stroke="#ffffff">

                                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                            
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                            
                                            <g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}</style> </defs> <title/> <g id="cross"> <line class="cls-1" x1="7" x2="25" y1="7" y2="25"/> <line class="cls-1" x1="7" x2="25" y1="25" y2="7"/> </g> </g>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection