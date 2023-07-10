@extends('layout')
@section('title','お気に入り')
@section('contents')

<div class="mylike-container">
    <div>
        <p class="message">{{ $message ?? '' }}</p>
            @if($my_likes->isNotEmpty())  
            <div class="items">
                @foreach($my_likes as $my_like)
                <div class="item">
                    
                    <p class="product_name">{{$my_like->product->name}}</p>
                    <p class="product_price">{{ number_format($my_like->product->price)}}円</p>
                    <a class="product_img" href="{{route('detail',['id' => $my_like->product_id])}}"><img id="itemimg" src="{{asset('storage/images/'.$my_like->product->imgpath)}}" alt=""></a>
                    

                    @if (!$my_like->product->isLikedBy(Auth::user()))
                        <span class="likes">
                            <i class="fas fa-heart like-toggle" data-product-id="{{ $my_like->product->id }}"></i>
                        <span class="like-counter">{{$my_like->product->likes_count}}</span>
                        </span><!-- /.likes -->
                    @else
                        <span class="likes">
                            <i class="fas fa-heart like-toggle liked" data-product-id="{{ $my_like->product->id }}"></i>
                        <span class="like-counter">{{$my_like->product->likes_count}}</span>
                        </span><!-- /.likes -->
                    @endif

                    <form action="{{route('addmycart')}}" method="post" class="form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$my_like->product_id}}">
                        <button type="submit" class="addcart"><i class="fas fa-shopping-cart"></i></button>
                    </form>

                </div>
                @endforeach

                @else
                <p class="empty">お気に入りされたアイテムはありません。</p>
                @endif


            </div>


            
        <a href="{{route('products')}}" class="index">商品一覧へ</a>

        <script src="{{ asset('js/common.js') }}"></script> 
    </div>
</div>

@endsection