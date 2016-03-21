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
              <h1>Log in</h1>
              <div class="signup-form">
                <form action="login.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Username" required class="form-control input-lg">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" required class="form-control input-lg">
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me.
                            </label>
                            <a href="{{route('forgotpassword')}}" class="pull-right">Forgot password?</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Log In</button>
                    </div>
                </form>
            </div>
            <div class="form-footer">
                <p>If don't have an account?</p>
                <a class="btn btn-transparent" href="{{route('signup')}}">Sign Up</a>
            </div>
        </div>
    </div>
</div>
</div>
@stop