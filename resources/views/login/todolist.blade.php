@extends('contact.layout')
@section('content')




<div class="text-center mt-10">
    <h1 class="text-3xl">To Do List</h1>
    <p>by @Dendo</p>
    <form action="{{ route('save') }}" method="POST" class="pt-10">
      @csrf
      <div class="d-flex flex-column w-80 m-auto">
        <input type="text" name="taskname" placeholder="Task" class="p-3 border border-2 border-secondary rounded" autocomplete="off">
        <button type="submit" class="p-2 mt-3 bg-primary text-white rounded hover:bg-primary-dark font-bold">Save</button>
      </div>
    </form>
  
    <table class="table m-auto border border-2 border-secondary mt-10">
      <thead class="border border-2 border-secondary">
        <tr>
          <th class="border border-2 border-secondary w-96 text-start p-2">Task</th>
          <th class="border border-2 border-secondary w-40">Action</th>
        </tr>
      </thead>
      <tbody>
        @if($tasks)
            @foreach( $tasks as $task)
                <tr>
                  <td class="border border-2 border-secondary pt-5 pb-5 text-start p-2">{{ $task->task_name }}</td>

                    <td class="border border-2 border-secondary p-2">
                        <a href="{{route('updateTask',$task->id)}}" class="btn btn-primary p-1 text-white rounded hover:bg-primary-dark text-sm font-weight-bold">Update</a>
                        <a href="{{route('deleteTask',$task->id)}}" class="btn btn-danger p-1 text-white rounded hover:bg-danger text-sm font-weight-bold">Delete</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    
    </table>
  </div>



    @endsection