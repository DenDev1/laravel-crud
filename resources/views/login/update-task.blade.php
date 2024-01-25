@extends('contact.layout')

@section('content')
<div class="container mt-5">
  <div class="text-center">
    <h1 class="display-4">To Do List</h1>
    <p>by @Dendo</p>
    <form action="{{ route('saveUpdateTask') }}" method="POST" class="mt-5">
      @csrf
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="mb-3">
           
      
            <input type="text" name="updatetask" placeholder="Update Task" class="form-control" autocomplete="off" value="{{ $task->task_name }}" >
            <input type="hidden" name="id" value="{{ $task->id }}">

          <button type="submit" class="btn btn-primary btn-block">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
