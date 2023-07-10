@extends('layout')
<head><link href="{{ asset('css/items.css') }}" rel="stylesheet" type="text/css"></head>
@section('title','商品ページ')
@section('contents')

<div class="shop-container">
    <h1>商品一覧</h1>
    <div class="item-container">
        @if($data->isNotEmpty())  
@foreach($data as $product)             
            <div class="item">
                <a href="{{route('detail',['id' => $product->id])}}">
                    <p>{{$product->name}}<br>{{$product->price}}円</p>         
                    <div><img id="itemImg" src="{{asset('storage/images/'.$product->imgpath)}}" alt=""></div>
                </a>
                    @auth
                    <div class="itemContainer">
                    <form action="{{route('addmycart')}}" method="post" class="form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="imgpath" value="{{$product->imgpath}}">
                        <button type="submit" class="addcart"><i class="fas fa-shopping-cart"></i></button>
                    </form>

                    @if (!$product->isLikedBy(Auth::user()))
                        <span class="likes">
                            <i class="fas fa-heart like-toggle" data-product-id="{{ $product->id }}"></i>
                        <span class="like-counter">{{$product->likes_count}}</span>
                        </span><!-- /.likes -->
                    @else
                        <span class="likes">
                            <i class="fas fa-heart like-toggle liked" data-product-id="{{ $product->id }}"></i>
                        <span class="like-counter">{{$product->likes_count}}</span>
                        </span><!-- /.likes -->
                    @endif
                    </div>
                    @endauth

            </div>
              
            @endforeach

            @else
            <p class="empty">登録されている商品はありません。</p>
            @endif

              
    </div>
</div>
@endsection
