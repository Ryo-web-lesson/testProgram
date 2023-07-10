@extends('layout')
@section('title','購入確認')
@section('contents')

<div class="purchase-container">
    <h2>{{ Auth::user()->name }}さんご購入ありがとうございました</h2>
    <p>ご登録頂いたメールアドレスへ決済情報をお送りしております。お手続き完了次第商品を発送致します。</p>
    <a href="{{route('products')}}">商品一覧へ</a>
</div>

@endsection