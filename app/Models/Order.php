<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'name',
        'postal_code',
        'prefecture',
        'address1',
        'address2',
        'postage',
        'billing_amount',
        'status',
        'imgpath',
    ];

    public function check($request)
    {
        $inputs = $request->validate([
            'id' =>'',
            'name' => 'required',
            'postal_code' => 'required',
            'prefecture' => 'required',
            'address1' => 'required',
            'address2' => 'nullable',
            'postage' => 'required',
            'billing_amount' =>'',
            'status' =>'',
            'imgpath' =>'',
        ]);
        return $inputs;
        
    }

    public function complete($inputs)
    {
        $this->customer_id = $inputs['id'];
        $this->name = $inputs['name'];
        $this->postal_code = $inputs['postal_code'];
        $this->prefecture = $inputs['prefecture'];
        $this->address1 = $inputs['address1'];
        $this->address2 = $inputs['address2'];
        $this->postage = $inputs['postage'];
        $this->billing_amount = $inputs['billing_amount'];
        $this->status = $inputs['status'];
        $this->save();
    }

    public function getHistory($id)
    {
        $history = $this::where('customer_id',$id)->orderBy('created_at','desc')->simplePaginate(10);
        //dd($history);
        return $history;
    }
}
