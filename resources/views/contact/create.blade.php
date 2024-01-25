@extends('contact.layout')
@section('content')
  

        <form class="form" action="{{ route('register') }}" method="post">
            {!! csrf_field() !!}
            
            <h2><i class="fas fa-lock"></i> Register</h2>
            <input type="text" name="name" id="name" placeholder="First Name " required/>
    
            <input type="email" name="email" id="email" placeholder="Email " required/>
            <input type="password" name="password" id="password" placeholder="Password " required/>
            <button type="submit" name="submit" id="submit">Register</button>
            
        <div class="mt-3">
            <p>Already have an account? <a href="{{ route('login.index') }}">Login</a></p>

        </div>
        
        </form>























    @endsection