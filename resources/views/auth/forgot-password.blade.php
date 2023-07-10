@extends('layout')
@section('title','ログインページ')
@section('contents')

@guest
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"/></head>
<div class="login-container">
	<div class="row-block">
		 <h1><i class="fa fa-lock" aria-hidden="true"></i> Login</h1>
       
        </div><br /><br />
        <form method="POST" action="{{ route('password.email')}}">
            @csrf
        
                	<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user-tie"></i></span>
								</div>
								<input type="text" name="email" class="form-control" placeholder="email"/>
							</div><br />
            <div class="login-box">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-off"></span> Login</button>
                </form>
 
	</div>
@endguest
@endsection
