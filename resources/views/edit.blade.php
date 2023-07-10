<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/index.css') }}" rel="stylesheet" type="text/css">
        <title>商品編集</title>
    </head>
    <body>
        <div class="productCreate-container">
            @if(session('message'))
            <div class="flash">
                {{session('message')}}
            </div>
            @endif
            @if($errors->any())
            <ul class="error">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
            <a class="back" href="{{route('admin')}}">管理画面に戻る</a>
            <h1>商品編集ページ</h1>
            <form action="{{route('update',['product' => $productEdit])}}" method="post" enctype="multipart/form-data"> 
                @csrf
                @method('put')
                
                <div class="title-wrap">商品タイトル : <input type="text" name="name" placeholder="商品タイトル" value="{{old('name',$productEdit->name)}}"></div>
                <div class="category-wrap">カテゴリー : <input type="text" name="category" value="{{old('category',$productEdit->category)}}"></div>
                <div class="img-wrap">商品画像 : <input type="file" name="imgpath" accept="image/jpg,image/png"></div>
                <div class="description-wrap">商品説明 : <textarea type="text" name="description" cols="30" rows="10" placeholder="商品説明">{{old('description',$productEdit->description)}}</textarea></div>
                <div class="price-wrap">値段 : <input type="text" name="price" placeholder="10000" value="{{old('price',$productEdit->price)}}">円</div>
                <div class="stock-wrap">在庫 : <input type="text" name="stock" value="{{old('stock',$productEdit->stock)}}">個</div>
                <div class="submit-wrap"><input type="submit" value="登録する"></div>
            </form>
        </div>
    </body>
</html>