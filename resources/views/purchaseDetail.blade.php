@extends('layout')
@section('title','購入詳細')
@section('contents')

<div class="purchase-container">

    <table>
        <th>購入日時</th>
        <th>決済時価格</th>
        <th>購入数量</th>
        <th></th>

@foreach($detail as $details)
            <tr>
                <td>{{$details->created_at}}</td>
                <td>￥{{$details->price}}</td>
                <td>{{$details->quantity}}個</td>
                <td><a href="{{route('detail',['id' => $details->product_id])}}"><img id="detailimg" src="{{asset('storage/images/'.$details->imgpath)}}" alt=""></a></td>
            </tr>
@endforeach
</table>

<table>
    <th>送り先名</th>
    <th>郵便番号</th>
    <th>送り先住所</th>
    <th>合計金額</th>
    <th>送料</th>

        <tr>
            <td>{{$orders['0']->name}} 様</td>
            <td>{{$orders['0']->postal_code}}</td>
            <td>{{$orders['0']->prefecture.$orders['0']->address1.$orders['0']->address2}} </td>
            <td>{{$orders['0']->billing_amount}} 円</td>
            <td>{{$orders['0']->postage}} 円</td>
        </tr>

</table>

</div>

@endsection