<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Order_Detaill extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'customer_id',
        'product_id',
        'price',
        'quantity',
        'imgpath',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getOrder($order_detai,$inputs)
    {
        $productCnt = count($order_detai['purchase']);
        //dd($order_detai,$inputs);

        for($i = 0; $i < $productCnt;$i++){
        $order_Detail = new Order_Detaill;
        $order_id = Order::latest('id')->first();
        $order_Detail->customer_id = $order_detai['purchase'][$i]->customer_id;
        $order_Detail->order_id = $order_id['id'];
        $order_Detail->product_id = $order_detai['purchase'][$i]->product_id;
        $price_check = Product::where('id','=',$order_detai['purchase'][$i]->product_id)->get();
        $imgpath = Product::where('id','=',$order_detai['purchase'][$i]->product_id)->get();
        $order_Detail->price = $price_check['0']['price'];
        $order_Detail->imgpath = $imgpath['0']['imgpath'];
        $order_Detail->quantity = $order_detai['purchase'][$i]->quantity;
        $order_Detail->save();
        $price_check = '';
        }
    }

}
