@extends('layout')
@section('title','商品登録ページ')

@section('contents')

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
    <h1>商品登録ページ</h1>
    <form action="{{route('productStore')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="title-wrap">商品タイトル : <input type="text" name="name" placeholder="商品タイトル" value="{{old('name')}}"></div>
        <div class="category-wrap">カテゴリー : <input type="text" name="category" value="{{old('fee')}}"></div>
                <div class="img-wrap">商品画像 : <input type="file" name="imgpath" accept="image/jpg,image/png"></div>
                <div class="description-wrap">商品説明 : <textarea type="text" name="description" cols="30" rows="10" placeholder="商品説明">{{old('description')}}</textarea></div>
                <div class="price-wrap">値段 : <input type="text" name="price" placeholder="10000" value="{{old('price')}}">円</div>
                <div class="stock-wrap">在庫 : <input type="text" name="stock" placeholder="" value="{{old('stock')}}">個</div>
        <div></div>
        <div class="submit-wrap"><input type="submit" value="登録する"></div>
    </form>

@endsection

