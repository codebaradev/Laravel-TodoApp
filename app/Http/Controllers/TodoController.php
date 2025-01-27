<?php

namespace App\Http\Controllers;

use App\Services\TodoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    private TodoService $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }
    
    public function postAdd(Request $request): RedirectResponse
    {   
        $validatedData = $this->validate($request, ['todo_title' => ['required', 'max:255']]);
        $validatedData['user_id'] = $request->session()->get('user_id');

        $this->todoService->create($validatedData);

        return response()->redirectTo('/dashboard');
    }

    public function edit(Request $request, $todo_id)
    {
        $todo = $this->todoService->read($todo_id);
        return response()->view('todo.edit', [
            'title' => 'Dashboard',
            'todo' => $todo
        ]);
    }

    public function postEdit(Request $request, $todo_id)
    {
        $validatedData = $this->validate($request, ['todo_title' => ['required', 'max:255']]);
        $validatedData['todo_is_completed'] = $request->boolean('todo_is_completed');
        $validatedData['todo_description'] = $request->input('todo_description');

        $this->todoService->update($todo_id, $validatedData);
        return response()->redirectTo('/dashboard');
    }

    public function postDelete(Request $request): RedirectResponse
    {
        $this->todoService->delete($request->input('todo_id'));
        return response()->redirectTo('/dashboard');
    }
}
