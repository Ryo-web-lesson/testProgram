@extends('layout')
@section('title','購入確認')
@section('contents')

<div class ="user-container">
    <h2>パスワード変更</h2>
    @if(session('message'))
            <div class="flash">
                {{session('message')}}
            </div>
            @endif
    <form action="{{ route('passChangeComplete') }}" method="post" class ="validationForm">
        @csrf
        <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
            <span class="required">*</span>
            は必須項目となります。
        </p>
        <dl>
            <dd>
                <input type="hidden" name="id" value={{$Userdata->id}}>
            </dd>
            <dt>
                <label for="password">パスワード</label>
                <span class="required">*</span>
                <div class = errormsg>@if($errors->has('currentpassword')){{$errors->first('currentpassword')}} @endif</div>
            </dt>
                <dd>
                <input type="password" name="currentpassword" placeholder="Old Password" value="@if(session()->has('currentpassword')){{session('currentpassword')}}@else{{old('currentpassword')}}@endif">
                    
                </dd>
                <dt>
                    <label for="password">パスワード</label>
                    <span class="required">*</span>
                    <div class = errormsg>@if($errors->has('password')){{$errors->first('password')}} @endif</div>
                </dt>
                    <dd>
                    <input type="password" name="password" placeholder="New Password"value="@if(session()->has('password')){{session('password')}}@else{{old('password')}}@endif">
                        
                    </dd>
                    <dt>
                        <label for="password2">パスワード</label>
                        <span class="required">*</span>
                        <div class = errormsg>@if($errors->has('password')){{$errors->first('password')}} @endif</div>
                    </dt>
                        <dd>
                        <input type="password" name="password2" placeholder="New Password Confirm"value="@if(session()->has('password2')){{session('password2')}}@else{{old('password2')}}@endif">
                            
                        </dd>
            
        </dl>
                <button type="submit" id="submit_btn">送 信</button>
            </dd>
        </dl>
    </form>
</div>

@endsection