<?php

namespace App\Http\Controllers;
use App\Models\Order_Detaill;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Like;
use App\Models\Order;
use App\Models\User;
use App\Models\Comment;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Auth;
use Gate;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    function index(){
        $product = new Product();
        $items = $product->newItems();
        return view('index',compact('items'));
    }

    function products(Product $product, Request $request){
        $products = $product->stockDisplay();
        $likes = Product::withCount('likes')->orderBy('id', 'desc')->paginate(10);
            $param = [
                'product' => $products,
                'likes' => $likes,
            ];

            //dd($param);
            
        return view('products',compact('param'));
    }

    function productCreate(){
        return view('productCreate');
    }

    public function productStore(Product $product,Request $request)
    {
        $product->store($request);
        return back()->with('message','商品の投稿が完了しました');
    }

    public function myCart(Cart $cart)
    {
        $data = $cart->showCart();
        return view('mycart',$data);
    }

    public function addMycart(Request $request,Cart $cart)
    {
        $product_id = $request->product_id;
        $imgpath = $request->imgpath;
        $message = $cart->addCart($product_id,$imgpath);
        
        $data = $cart->showCart();
        
        return view('mycart',$data)->with('message',$message);
    }

    public function deleteCart(Request $request,Cart $cart)
    {
        $product_id=$request->product_id;
        $message = $cart->deleteCart($product_id);

        $data = $cart->showCart();

        return view('mycart',$data)->with('message',$message);
    }

    public function redirect_once()
    {
        return redirect('index');
    }

    public function admin(Product $product)
    {
        Gate::authorize('isAdmin');

        $products = $product->stockDisplay();
        return view('admin',compact('products'));
    }

    public function itemDelete($id)
    {
        Product::where('id',$id)->delete();
        return back();
    }

    public function edit($id)
    {
        $productEdit = Product::find($id);
        //dd($productEdit);
        return view('edit',compact('productEdit'));
    }

    public function update(Product $product,Request $request)
    {
        $product->store($request);

        return back()->with('message','商品の更新が完了しました');
    }

    public function like(Request $request)
{
    $user_id = Auth::user()->id; //1.ログインユーザーのid取得
    $product_id = $request->product_id; //2.商品idの取得
    $already_liked = Like::where('customer_id', $user_id)->where('product_id', $product_id)->first(); //3.

    if (!$already_liked) { //もしこのユーザーがこの商品にまだいいねしてなかったら
        $like = new Like; //4.Likeクラスのインスタンスを作成
        $like->product_id = $product_id; //Likeインスタンスにproduct_id,user_idをセット
        $like->customer_id = $user_id;
        $like->save();
    } else { //もしこのユーザーがこの商品に既にいいねしてたらdelete
        Like::where('product_id', $product_id)->where('customer_id', $user_id)->delete();
    }
    //5.この投稿の最新の総いいね数を取得
    $product_likes_count = Product::withCount('likes')->findOrFail($product_id)->likes_count;
    $param = [
        'product_likes_count' => $product_likes_count,
    ];
    return response()->json($param); //6.JSONデータをjQueryに返す
}

public function likeItems(Like $like)
    {
        $my_likes = $like->showLikes();
        return view('likes',$my_likes);
    }

    public function detail($id)
    {
        $productDetail = Product::find($id);
        $productComment = Comment::select([
            'c.id as comment_id',
            'c.comment',
            'c.product_id',
            'c.customer_id',
            'c.created_at',
            'u.id',
            'u.name',
          ])
          ->from('comments as c')
          ->join('users as u', function($join) {
              $join->on('c.customer_id', '=', 'u.id');
          })
          ->get();
          //dd($productComment);
        
        return view('detail',compact('productDetail','productComment'));
    }

    public function purchase(Request $request,Cart $cart)
    {
        $purchase = $cart->purchaseCart();
        //dd($purchase);
        return view('purchase',$purchase);
    }

    public function confirm(Request $request,Order $order)
    {
        $inputs = $order->check($request);
        //dd($inputs);
        
        return view('confirm',compact('inputs'));
    }

    public function complete(Request $request, Cart $cart, Order $order, Order_Detaill $order_Detaill)
    {

        if($request['back'] == 'back'){
            return redirect()->route('purchase')->withInput();
        }

        $inputs = $request->all();
        $order->complete($inputs);
        $order_detai = $cart->purchaseCart();
        $order_Detaill->getOrder($order_detai,$inputs);

        $cart->cartComplete();
        $request->session()->regenerateToken();
        
        return view('purchaseComplete');
    }

    public function mypage(User $user)
    {
        $id = Auth::user()->id;
        $getUser = $user->findUser($id);
        return view('mypage',compact('getUser'));

    }

    public function history(Order $order)
    {
        $id = Auth::user()->id;
        $getHistory = $order->getHistory($id);
        //dd($getHistory);
        return view('history',compact('getHistory'));
    }

    public function purchaseDetail($order_id)
    {
        
        $orderDetail = new Order_Detaill;
        $detail = $orderDetail->where('order_id','=',$order_id)->get();
        //dd($detail);
        $order = new Order;
        $orders = $order->where('id','=',$order_id)->get();
        //dd($orders);

        return view('purchaseDetail',compact('detail','orders'));
    }

    public function quantityChange(Request $request)
    {
    $user_id = Auth::user()->id; //1.ログインユーザーのid取得
    $product_id = $request->product_id; //2.投稿idの取得
    $quantity = $request->quantity; //3.数量の取得

        $cart = new Cart; //4.Cartクラスのインスタンスを作成
        $cart->where('customer_id',$user_id)->where('product_id',$product_id)->update(['quantity'=>$quantity]); //Likeインスタンスにreview_id,user_idをセット

    return response()->json(['quantity'=>$quantity]);
    }

    public function comments(Request $request)
   {
       $comment = new Comment();
       $comment->comment = $request->comment;
       $comment->product_id = $request->product_id;
       $comment->customer_id = Auth::user()->id;
       $comment->save();

       return back()->with('message','コメントを投稿しました。');
   }

    public function destroyComment($id)
    {
        Comment::where('id',$id)->delete();
        return back()->with('message','コメントを削除しました。');
    }

    public function downloadCsv()
    {
        $orders = Order::all();
        $csvHeader = [
            '購入ID',	
            '顧客ID',
            '宛名',
            '郵便番号',
            '都道府県',
            '住所1',
            '住所2',
            '送料',
            '請求金額',
            '注文ステータス',
            '注文日',
            'ステータス遷移日',
        ];
        $csvData = $orders->toArray();

        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $csvHeader);

            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="order.csv"',
        ]);

        return $response;
    }

    public function categoryShow ($id)
    {
        $product = new Product;
        $data = $product->where('category',$id)->get();

        return view('categoryPage',compact('data'));
    }
}