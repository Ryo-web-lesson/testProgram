@extends('layout')
@section('title','購入確認')
@section('contents')

<div class ="purchase-container">
    <h2>購入ページ</h2>
    <form action="{{ route('confirm') }}" method="post" class ="validationForm">
        @csrf
        <h3>下記の項目をご記入の上送信ボタンを押してください</h3>
            <span class="required">*</span>
            は必須項目となります。
        </p>
        <dl>
            <dd>
                <input type="hidden" name="id" value={{$purchase['0']->customer_id}}>
            </dd>
            <dt>
                <label for="name">氏名</label>
                <span class="required">*</span>
                <div class = errormsg>@if($errors->has('name')){{$errors->first('name')}} @endif</div>
            </dt>
                <dd>
                    <input class ="maxlength"type="text" name="name" id ="name" placeholder="山田太郎" maxlength = "15" value="@if(session()->has('name')){{session('name')}}@else{{old('name')}}@endif" >
                    
                </dd>
            <dt>
                <label for="postal_code">郵便番号</label>
                <span class="required">*</span>
                <div class = errormsg>@if($errors->has('postal_code')){{$errors->first('postal_code')}} @endif</div>
            </dt>
                <dd>
                    <input class ="maxlength"type="text" name="postal_code" placeholder="0000000" maxlength = "7" value="@if(session()->has('postal_code')){{session('postal_code')}}@else{{old('postal_code')}}@endif">
                    
                </dd>
            <dt>
                <label for="prefecture">都道府県</label>
                <div class = errormsg>@if($errors->has('prefecture')){{$errors->first('prefecture')}} @endif</div>
            </dt>
                <dd>
                <input class ="prefecture" type="text" name="prefecture" placeholder="都道府県"value="@if(session()->has('prefecture')){{session('prefecture')}}@else{{old('prefecture')}}@endif">
                    
                </dd>
            <dt>
                <label for="address1">市町村番地</label>
                <span class="required">*</span>
                <div class = errormsg>@if($errors->has('address1')){{$errors->first('address1')}} @endif</div>
            </dt>
                <dd>
                <input class="address1" maxlength = "50" type="text" name="address1" placeholder="市町村番地"value="@if(session()->has('address1')){{session('address1')}}@else{{old('address1')}}@endif">
                    
                </dd>
                <dt>
                    <label for="address2">建物名・部屋番号等</label>
                    <span class="required">*</span>
                    <div class = errormsg>@if($errors->has('address2')){{$errors->first('address2')}} @endif</div>
                </dt>
                    <dd>
                    <input class="address2" maxlength = "50" type="text" name="address2" placeholder="建物名・部屋番号等"value="@if(session()->has('address2')){{session('address2')}}@else{{old('address2')}}@endif">
                        
                    </dd>
                <dt>
                    <label for="address2">送料</label>
                    <span class="required">*</span>
                    <div class = errormsg>@if($errors->has('postage')){{$errors->first('postage')}} @endif</div>
                </dt>
                    <dd>
                    <input class="postage" maxlength = "4" type="text" list="postage" name="postage" placeholder="送料"value="@if(session()->has('postage')){{session('postage')}}@else{{old('postage')}}@endif">
                        <datalist id="postage">
                            <option value="720" label="コンパクト"></option>
                            <option value="940" label="60"></option>
                            <option value="1230" label="80"></option>
                            <option value="1530" label="100"></option>
                            <option value="1850" label="120"></option>
                            <option value="2190" label="140"></option>
                            <option value="2510" label="160"></option>
                            <option value="3060" label="180"></option>
                            <option value="3720" label="200"></option>
                        </datalist>
                    </dd>

                    <dd><input type="hidden" name="billing_amount" value="{{$sum}}"></dd>
                    <dd><input type="hidden" name="status" value=0></dd>

                    @foreach($purchase as $purchases)
                    <dd><input type="hidden" name="imgpath" value="{{$purchases->imgpath}}"></dd>
                    <dd><input type="hidden" name="quantity" value="{{$purchases->quantity}}"></dd>
                    @endforeach
        </dl>
                <button type="submit" id="submit_btn">送 信</button>
            </dd>
        </dl>
    </form>
</div>

@endsection