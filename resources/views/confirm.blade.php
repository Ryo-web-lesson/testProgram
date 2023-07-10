@extends('layout')
@section('title','確認ページ')
@section('contents')

<section>
    <div class ="confirm_box">
        <h2>内容確認</h2>
        <form action="{{ route('complete') }}" method="post" enctype="multipart/form-data">
            @csrf
            <p>下記の内容をご確認の上送信ボタンを押してください</p>
            <p>内容を訂正する場合は戻るを押してください。</p>

            <dl class="confirm">
                <input type="hidden" name="id" value="{{ $inputs['id'] }}">
                <dt>宛名</dt>
                    <dd name='name'>{{ $inputs['name'] }} 様宛</dd>
                    <input type="hidden" name="name" value="{{$inputs['name']}}">
                <dt>郵便番号</dt>
                    <dd name='postal_code'>{{$inputs['postal_code']}}</dd>
                    <input type="hidden" name="postal_code" value="{{$inputs['postal_code']}}">
                <dt>お送り先（都道府県）</dt>
                    <dd name='prefecture'>{{$inputs['prefecture']}}</dd>
                    <input type="hidden" name="prefecture" value="{{$inputs['prefecture']}}">
                <dt>お送り先（市区町村番地）</dt>
                    <dd name='address1'>{{$inputs['address1']}}</dd>
                    <input type="hidden" name="address1" value="{{$inputs['address1']}}">
                <dt>お送り先（建物名・部屋番号）</dt>
                    <dd name='address2'>{{$inputs['address2']}}</dd>
                    <input type="hidden" name="address2" value="{{$inputs['address2']}}">
                <dt>合計金額（請求金額+送料）円</dt>
                    <dd name='billing_amount'>{{$inputs['billing_amount'] + $inputs['postage']}}</dd>
                    <input type="hidden" name="billing_amount" value="{{$inputs['billing_amount']}}">
                <input type="hidden" name="postage" value="{{$inputs['postage']}}">
                <input type="hidden" name="status" value="{{$inputs['status']}}">
                
                <dd class="confirm_btn">
                    <button type="submit">送 信</button>
                    <button id="back" type="submit" name="back" value="back">戻 る</button>
                </dd>
            </dl>
        </form>
</section>

@endsection