@extends('layout')
@section('title','購入確認')
@section('contents')

<div class ="user-container">
    <h2>ユーザー情報更新</h2>
    @if(session('message'))
            <div class="flash">
                {{session('message')}}
            </div>
            @endif
    <form action="{{ route('updateComplete') }}" method="post" class ="validationForm">
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
                <label for="name">氏名</label>
                <span class="required">*</span>
                <div class = errormsg>@if($errors->has('name')){{$errors->first('name')}} @endif</div>
            </dt>
                <dd>
                    <input class ="maxlength"type="text" name="name" id ="name" placeholder="{{$Userdata->name}}" maxlength = "15" value="@if(session()->has('name')){{session('name')}}@else{{old('name')}}@endif" >
                    
                </dd>
            <dt>
                <label for="email">メールアドレス</label>
                <span class="required">*</span>
                <div class = errormsg>@if($errors->has('email')){{$errors->first('email')}} @endif</div>
            </dt>
                <dd>
                    <input type="text" name="email" placeholder="{{$Userdata->email}}"  value="@if(session()->has('email')){{session('email')}}@else{{old('email')}}@endif">
                    
                </dd>
            <dt>
                <label for="password">パスワード</label>
                <span class="required">*</span>
                <div class = errormsg>@if($errors->has('password1')){{$errors->first('password2')}} @endif</div>
            </dt>
                <dd>
                <input type="password" name="password1" placeholder="*********"value="@if(session()->has('password')){{session('password')}}@else{{old('password')}}@endif">
                    
                </dd>
            <span class="changepass"><a href="{{route('pass_change')}}">⇒パスワードの変更はこちらから</a></span>
            
        </dl>
                <button type="submit" id="submit_btn">送 信</button>
            </dd>
        </dl>
    </form>
</div>

@endsection