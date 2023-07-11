<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'imgpath',
    ];

    

    public function addCart($product_id,$imgpath)
    {
        
        $user_id = Auth::id();
        $cart_add_info = Cart::firstOrCreate(['product_id' => $product_id,'customer_id' => $user_id]);

        if($cart_add_info->wasRecentlyCreated){
            $message = 'カートに追加しました';
        }else{
            $message = 'カートに登録済みです';
        }

        return $message;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function showCart()
    {
        $user_id = Auth::id();
        $data['my_carts'] = $this->where('customer_id',$user_id)->get();
        

        $data['count']=0;
        $data['sum']=0;
        
        foreach($data['my_carts'] as $my_cart){
            $data['count'] += $my_cart->quantity;
            $data['sum'] += $my_cart->product->price * $my_cart->quantity;
            
        }

        return $data;
    }

    public function deleteCart($product_id)
    {
        $user_id = Auth::id();
        $delete = $this->where('customer_id',$user_id)->where('product_id',$product_id)->delete();

        if($delete > 0){
            $message = 'カートから1つの商品を削除しました';
        }else{
            $message = '削除に失敗しました';
        }
        return $message;
    }

    public function purchaseCart()
    {
        $user_id = Auth::id();
        $data['purchase'] = $this->where('customer_id',$user_id)->get();
        $data['sum'] = 0;
        

        foreach($data['purchase'] as $purchase){
            $quantity = $purchase->quantity;
            $data['sum'] += $purchase->product->price * $quantity;
            
        }

        return $data;
    }

    public function cartComplete()
    {
        $user_id = Auth::id();
        $purchase_items = $this->where('customer_id',$user_id)->delete();
    }
}
