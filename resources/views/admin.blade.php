<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>管理画面</title>
</head>
<body>


<div class="toolbar">
    <a href="{{route('products')}}">商品画面へ</a>
    <a href="{{route('mycart')}}">マイカートへ</a>
    <a href="{{route('productCreate')}}">商品登録画面へ</a>
    <form action="/csv-download">
        <button type="submit" onclick="return confirm('CSVをダウンロードしますか？')">CSVダウンロード</button>
    </form>
</div>



<div class="admin-container">
    <h1>商品管理ページ</h1>
    @foreach($products as $product)
    <div class="item">
        <img id="itemimg" src="{{asset('storage/images/'.$product->imgpath)}}" alt="">
        <div>
            <h2>商品名 : {{$product->name}}</h1>
            <p>商品の説明 :{{ Str::limit($product->description, 300, '...') }} {{-- {{$product->description}} --}}</p>
            <a href="{{route('edit',['id' => $product->id])}}" class="edit">編集</a>
            <form class="delete" method="post" action="{{route('delete',['id' => $product->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit" onClick="return confirm('本当に削除しますか？');">削除</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

