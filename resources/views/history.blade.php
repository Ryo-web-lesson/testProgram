@extends('layout')
@section('title','お気に入り')
@section('contents')

<div class="mylike-container">
    <div>
        <p class="message">{{ $message ?? '' }}</p>
            @if($getHistory->isNotEmpty())  
            <div class="items">
                @foreach($getHistory as $key =>$value)
                <div class="item">
                    
                    <a href="{{route('purchaseDetail',$value['id'])}}"><p class="product_name">購入日時 : {{$value->created_at}}</p></a>

                </div>
                @endforeach

                {{$getHistory->links()}}

                @else
                <p class="empty">購入履歴はありません。</p>
                @endif


            </div>


            
        <a href="{{route('products')}}" class="index">商品一覧へ</a>

        <script src="{{ asset('js/common.js') }}"></script> 
    </div>
</div>

@endsection