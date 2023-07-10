<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update()
    {
        $id = Auth::id();
        $Userdata = User::find($id);
        return view('updateUser',compact('Userdata'));
    }

    public function complete(Request $request){

        $user = Auth::user();
        // 現在のパスワードを確認
        if (Hash::check($request->password1, $user->password)) {
            
            $inputs = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => '',
            ]);
    
            $user->name = $inputs['name'];
            $user->email = $inputs['email'];
            $user->save();
    
            return back()->with('message','情報を更新しました！');
        
        }
        return back()->with('message', '登録情報に誤りがあります。');
    }

    public function passChange()
    {

        $id = Auth::id();
        $Userdata = User::find($id);
        return view('updatePass',compact('Userdata'));
    }

    public function passComplete (Request $request)
    {
        $user = Auth::user();
        $new_password = $request->password;
        $old_password = $request->currentpassword;

      if(!(Hash::check($old_password, $user->password))) {
            return back()->with('message', '現在のパスワードが間違っています。');
        } else {
          if(Hash::check($new_password, $user->password)) {
                return back()->with('message', '新しいパスワードが、現在のパスワードと同じです。違うパスワードを設定してください。');
            } else {
                $user->password = Hash::make($request['password']);
                $user->save();
                return back()->with('message','パスワードが正しく変更されました');
            }
        }
    }

    public function withdrawal()
    {
        $user = Auth::user();
        $user->delete();

        return redirect('index');
    }
}
