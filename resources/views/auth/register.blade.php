@extends('layout')
@section('title','新規登録')
@section('contents')

@guest

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"/></head>
<div class="login-container">
	<div class="row-block">
		 <h1><i class="fa fa-lock" aria-hidden="true"></i> Sign Up</h1>
       
        </div><br /><br />
        <form method="POST" action="{{ 'register'}}">
            @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                        </div>
                        <input type="text" name="name" class="form-control" placeholder="Name"/>
                    </div><br />

                	<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user-tie"></i></span>
								</div>
								<input type="text" name="email" class="form-control" placeholder="email"/>
							</div><br />
         
                	<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-key icon"></i></span>
								</div>
									<input type="Password" name="password" class="form-control" placeholder="password"/>
							</div><br />

                            <div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-key icon"></i></span>
								</div>
									<input type="Password" name="password_confirmation" class="form-control" placeholder="password again"/>
							</div><br />
            <div class="login-box">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-off"></span> SignUp</button>
                </form>
         
        <button type="submit" class="btn btn-info" onclick="location.href='/login/google'"><span class="glyphicon glyphicon-remove" ></span>Login with google </button><br />
            </div>
               <br /> <center><div style="border:1px solid black;height:1px;width:300px;"></div></center><br />
        <div class="footer">
          <p>Forgot <a href="{{route('password.request')}}">Password?</a></p>
        </div>
 
	</div>
@endguest
@endsection
