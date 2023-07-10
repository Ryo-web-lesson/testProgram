@extends('layout')
@section('title','商品詳細')
@section('contents')
@auth
@if(session('message'))
            <div class="flash">
                {{session('message')}}
            </div>
            @endif
    <div class="detail-container">
            <div class="imgwrap">
                <img class="itemimg" src="{{asset('storage/images/'.$productDetail->imgpath)}}" alt="">
            </div>
        <div class="detail-wrap">
            <p>商品名</p>
                <h1 class="detail">{{$productDetail->name}}</h1>
                    <br>
                        <p>値段</p>
                            <h2>{{$productDetail->price}}円</h2>
                                <br>
                                    <div class="itemContainer">
                                        @if (!$productDetail->isLikedBy(Auth::user()))
                                            <span class="likes">
                                                <i class="fas fa-heart like-toggle" data-product-id="{{ $productDetail->id }}"></i>
                                                <span class="like-counter">{{$productDetail->likes_count}}</span>
                                            </span><!-- /.likes -->
                                        @else
                                            <span class="likes">
                                                <i class="fas fa-heart like-toggle liked" data-product-id="{{ $productDetail->id }}"></i>
                                                <span class="like-counter">{{$productDetail->likes_count}}</span>
                                            </span><!-- /.likes -->
                                        @endif
                                        <form action="{{route('addmycart')}}" method="post" class="form addcart">
                                            @csrf
                                                <input type="hidden" name="product_id" value="{{$productDetail->id}}">
                                                <input type="hidden" name="imgpath" value="{{$productDetail->imgpath}}">
                                                    <button type="submit" class="addcart"><i class="fas fa-shopping-cart"></i></button>
                                        </form>
                                    </div>
            </div>
    </div>
    <div class="descriptionwrap">
        <p>商品紹介</p>
            <br>
                <div class="description">
                    <h2>{{$productDetail->description}}</h2>
                </div>
    </div>

    <div class="card-body line-height">
        <table class="Comments">
            <th>名前</th>
            <th>コメント</th>
            <th>送信日時</th>
        @foreach ($productComment as $comment)
            <div id="comment-product-{{ $comment->comment_id }}">
                <tr>
                    <div class="Comments">
                        <td class="comment-img">
                        <strong>
                            <div class="no-text-decoration black-color">{{ $comment->name }}</div>
                        </strong>
                        </td>
                    <td class="comment-img">{{ $comment->comment }}</td>
                    <td class="comment-img">{{ $comment->created_at }}</td>
                @if ($comment->id == Auth::id())
                <td class="comment-img">
                    <form class="delete-comment" method="get" name="delete_form{{ $comment->comment_id }}" data-remote="true" rel="nofollow" data-method="delete" action="/product/{{ $comment->comment_id }}">
                        <a href="javascript:delete_form{{ $comment->comment_id }}.submit()">×</a>
                    </form>
                </td>
                @endif
                </div>
            </div>
        @endforeach
        </table>
        </div>
        <hr>
        <div class="row actions" id="comment-form-product-{{ $productDetail->id }}">
            <form class="w-100" id="new_comment" action="/product/{{ $productDetail->id }}/comments" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" />
                {{csrf_field()}}
                <input value="{{ $productDetail->id }}" type="hidden" name="product_id" />
                <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="comment" />
            </form>
        </div>
    </div>
@endauth
@guest
<div class="detail-container">
    <div class="imgwrap">
        <img src="{{asset('storage/images/'.$productDetail->imgpath)}}" alt="">
    </div>
<div class="detail-wrap">
    <p>商品名</p>
        <h1 class="detail">{{$productDetail->name}}</h1>
            <br>
                <p>値段</p>
                    <h2>{{$productDetail->price}}円</h2>
                        <br>
                            
</div>
</div>
<div class="descriptionwrap">
<p>商品紹介</p>
<br>
    <div class="description">
        <h2>{{$productDetail->description}}</h2>
    </div>
</div>
@endguest
@endsection