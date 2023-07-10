@extends('layout')
@section('title','マイページ')
@section('contents')
<div class="mypage-container">
<h1>アカウントサービス</h1>
    <div class="mypage-unit">
        <div class="card-row">
            <div class="card-cell">
                <a href="{{ route('history') }}">
                    <div class="itembox">
                        <h2>購入履歴<i class="fa-solid fa-clock-rotate-left"></i></h2>
                    </div>
                </a>
            </div>
            <div class="card-cell">
                <a href="{{route('updateUser')}}"> 
                    <div class="itembox">
                        <h2>ユーザー情報変更<i class="fa-regular fa-user"></i></h2>
                    </div>
                </a>
            </div>
            <div class="card-cell jsbox">
                <form method="POST" name="withdrawal_form" action="{{ route('withdrawal') }}">
                    @csrf
                    
                    <div class="itembox">
                    <h2><a class="jsbtn" href="javascript:withdrawal_form.submit()" onClick="return confirm('本当に退会しますか？');">退会処理<i class="fa-solid fa-square-xmark"></i></a></h2>
                    </div>
                </a>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection