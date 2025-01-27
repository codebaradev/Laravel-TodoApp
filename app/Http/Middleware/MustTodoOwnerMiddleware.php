<?php

namespace App\Http\Middleware;

use App\Services\TodoService;
use Closure;
use Illuminate\Http\Request;

class MustTodoOwnerMiddleware
{
    private TodoService $todoService;
    
    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $todo_id = $request->route('todo_id'); // mengambil todo_id route paramter
        
        if ($request->session()->get('user_id') == $this->todoService->read((int) $todo_id)->user_id)
        {
            return $next($request);
        }
        
        return response()->redirectTo('/dashboard');
    }
}
