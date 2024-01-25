<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Services\TaskService;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $task;




    public function __construct(Task $task)
    {
        $this->task = $task;
    }
    
    public function index()
    {
        return view('login.index');
    }
    
    public function todolist(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            // Authentication successful
            $tasks = $this->task->getTaskList(); // Assuming $this->task is set up correctly
            return view('login.todolist', compact('tasks'));
        }
    
        // Authentication failed
        return "<h2>Username or Password Invalid!</h2>";
    }
    
}