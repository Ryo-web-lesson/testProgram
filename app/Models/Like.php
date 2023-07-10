<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id'
    ];

    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }

    public function product()
    {   //reviewsテーブルとのリレーションを定義するreviewメソッド
        return $this->belongsTo(Product::class);
    }

    public function showLikes()
    {
        $user_id = Auth::id();
        $data['my_likes'] = $this->where('customer_id',$user_id)->get();

        return $data;
    }
}
