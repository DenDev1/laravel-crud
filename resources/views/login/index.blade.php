@extends('contact.layout')
@section('content')
  



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


        <form style="top: 40px;"  class="form" action="{{ route('todolist') }}" method="post">
            {!! csrf_field() !!}   
            <h2><i class="fas fa-lock"></i> Login</h2>
            <input type="email" name="email" id="email" placeholder="email" required />
            <input type="password" name="password" id="password" placeholder="Password" required/>
            <button type="submit" name="submit" value="Login">login</button>    
            <div class="mt-3">
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
             </div>
          </form>
     


@endsection