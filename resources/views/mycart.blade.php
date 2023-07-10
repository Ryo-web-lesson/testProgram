@extends('layout')
@section('title','カート情報')
@section('contents')

<div class="mycart-container">
    <div>
        <h1>{{Auth::user()->name}}さんのカートの中身</h1>
        <p class="message">{{ $message ?? '' }}</p>
            @if($my_carts->isNotEmpty())  
            <div class="items">
                @foreach($my_carts as $my_cart)
                <div class="item">
                    <p>{{$my_cart->product->name}}</p>
                    <p>{{ number_format($my_cart->product->price)}}円</p>
                    <select class="quantity" name='quantity' data-product-id="{{ $my_cart->product->id }}">
                        <option id="quantityVal" value="{{$my_cart->quantity}}" selected>{{ $my_cart->quantity }}</option>
                        <option id="quantityVal" value="1">1</option>
                        <option id="quantityVal" value="2">2</option>
                        <option id="quantityVal" value="3">3</option>
                        <option id="quantityVal" value="4">4</option>
                        <option id="quantityVal" value="5">5</option>
                    </select>個

                    <img id="itemimg" src="{{asset('storage/images/'.$my_cart->product->imgpath)}}" alt="">
                        <div class="itemContainer">
                            @if (!$my_cart->product->isLikedBy(Auth::user()))
                                <span class="likes">
                                    <i class="fas fa-heart like-toggle" data-product-id="{{ $my_cart->product->id }}"></i>
                                <span class="like-counter">{{$my_cart->product->likes_count}}</span>
                                </span><!-- /.likes -->
                            @else
                                <span class="likes">
                                    <i class="fas fa-heart like-toggle liked" data-product-id="{{ $my_cart->product->id }}"></i>
                                <span class="like-counter">{{$my_cart->product->likes_count}}</span>
                                </span><!-- /.likes -->
                            @endif

                            <form action="{{route('cartdelete')}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="product_id" value="{{ $my_cart->product->id }}">
                                <button type="submit"  class="delete" onClick="return confirm('本当に削除しますか？');"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                 @endforeach
            </div>
            <div class="purchase">
                <p>個数 : {{$count}}個</p>
                <p>合計金額 : {{number_format($sum)}}円</p>
                <form action="/purchase" method="POST">
                    @csrf
                    <input type="submit" value="購入する" id="button">
                </form>  
            </div>

            @else
            <p class="empty">カートは空っぽです。</p>
            @endif

            
        <a href="{{route('products')}}" class="index">商品一覧へ</a>

        <script src="{{ asset('js/common.js') }}"></script> 
    </div>
</div>

@endsection