<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TodolistController extends Controller

{
    private $task;

    //
    
    function __construct()
    {
        $this->task= new Task;
    }

function index(){

    
    $tasks= $this->task->getTaskList();

    
    return view ('login.todolist',compact('tasks'));
 
    
}

    function saveTask(Request $request) {
        $data = [
            'task_name' => $request->taskname

        ];

            $this->task->saveTask($data);
            return back();
    }

    function deleteTask($id){
     
        $this->task->deleteTask($id);
        return back();
    }
    
    function updateTask($id){

        $task = $this->task->getTask($id);
        return view('login.update-task',compact('task'));
    }

     function saveUpdateTask( Request $request ){
            
        
        $data=[

            'task_name' => $request->updatetask
        ];

        $this->task->updateTask($data, $request->id);


        return redirect()->route('login.todolist');

    

     }
      
}


