@extends('layouts.main')

@section('site')
<div class="background-overlay">
    <div class="container">
        <div class="container-sm">
            <div class="form-header">
                <a href="#" class="logo text-center">
                <img src="{{asset('images/spark-logo.png')}}">
                  <span>Spark</span>
              </a>
          </div>
          <div class="signup-container fadeInUp">
              <h1>Create your account.</h1>
              <div class="signup-form">
                <form action="signup.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Username" required class="form-control input-lg">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" required class="form-control input-lg">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" required class="form-control input-lg">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirm" placeholder="Password (Confirm)" required class="form-control input-lg">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Sign Up</button>
                    </div>
                </form>
            </div>
            <div class="form-footer">
                <p>Already have an account?</p>
                <a class="btn btn-transparent" href="{{route('login')}}">Log in</a>
            </div>
        </div>
    </div>
</div>

@stop

