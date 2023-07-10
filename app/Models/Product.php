<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category',
        'description',
        'stock',
    ];


    public function store($request)
    {
        $inputs = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'imgpath' => 'required',
            'stock' => 'required',
            'category' => 'nullable',
        ]);

        $this->name = $inputs['name'];
        $this->description = $inputs['description'];
        $this->price = $inputs['price'];
        $this->category = $inputs['category'];
        $this->stock = $inputs['stock'];
        $originalName = $request->file('imgpath')->getClientOriginalName();
        $name = date('Yms_His').'_'.$originalName;
        $request->file('imgpath')->move('storage/images',$name);
        $this->imgpath = $name;
        $this->save();
    }

    public function stockDisplay()
    {
        $items = Product::orderBy('id','desc')->simplePaginate(12);

        return $items;
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
    //後でViewで使う、いいねされているかを判定するメソッド。
    public function isLikedBy($user): bool {
        return Like::where('customer_id', $user->id)->where('product_id', $this->id)->first() !==null;
    }

    public function newItems()
    {
        $sevendays = Carbon::today()->subday(7);
        $newitems = Product::whereDate('created_at','>',$sevendays)->orderBy('id','desc')->get();
        return $newitems;
    }

    public function comments()
{
    return $this->hasMany(Comment::class);
}
    
}
