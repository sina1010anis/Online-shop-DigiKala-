<?php


namespace App\DB\Create;


use App\Models\address;
use App\Models\basket;
use App\Models\factor;
use App\Models\User;
use App\Payment\zarinPal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class create_user
{
    public function address(Request $request){
        $v = $request->validate([
            'city_id'=>'required',
            'street_id'=>'required',
            'address'=>'required|min:10|max:50',
        ]);
        $address = new address();
        $address->city_id = $request->city_id;
        $address->street_id = $request->street_id;
        $address->address = $request->address;
        $address->user_id = auth()->user()->id;
        $address->save();
    }
    public function update_address($id){
        User::whereId(auth()->user()->id)->update(['address_id' =>$id]);
        return 'ok';
    }

    public function edit_name(Request $request)
    {
        $v = $request->validate([
            'name'=>'required'
        ]);
        User::whereId(auth()->user()->id)->update(['name'=>$request->name]);
        return back()->with('msg' , 'نام کاربری شما تغییر کرد');
    }
    public function edit_email(Request $request)
    {
        $v = $request->validate([
            'email'=>'required|email'
        ]);
        User::whereId(auth()->user()->id)->update(['email'=>$request->email]);
        auth()->logout();
        return redirect()->route('login');
    }
    public function edit_mobile(Request $request){
        $v = $request->validate([
            'mobile'=>'required|min:11|max:11|'
        ]);
        User::whereId(auth()->user()->id)->update(['mobile'=>$request->mobile]);
        return back()->with('msg' , 'شماره موبایل شما تغییر کرد');
    }
    public function edit_code(Request $request){
        $v = $request->validate([
            'code'=>'required|min:10|max:10'
        ]);
        User::whereId(auth()->user()->id)->update(['code_m'=>$request->code]);
        return back()->with('msg' , 'کد ملی شما تغییر کرد');
    }
    public function edit_password(Request $request){
        $v = $request->validate([
            'password'=>'required|min:8|max:20'
        ]);
        User::whereId(auth()->user()->id)->update(['password'=>Hash::make($request->password)]);
        auth()->logout();
        return redirect()->route('login');
    }
    public function buy_product(){
        $user = auth()->user();
        $factor = new factor();
        $total_price = 0;
        if (auth()->check()) {
            $all_item_card=basket::orderBy('id', 'desc')->whereUser_id(auth()->user()->id)->whereStatus(0)->get(['product_id' , 'number']);
            $price=basket::orderBy('id', 'desc')->whereUser_id(auth()->user()->id)->whereStatus(0)->get();
        }
        foreach ($price as $item){
            $total_price+=$item->total_price*$item->number;
        }
        $factor->user_id = $user->id;
        $factor->address_id = $user->address_id;
        $factor->product = $all_item_card;
        $factor->total_price =$total_price;
        $factor->save();
        return redirect()->route('user.bank');
    }
    public function bank(){
        $factor = factor::where('user_id' , auth()->user()->id)->orderBy('id' , 'desc')->first();
        $zarinPal = new zarinPal();
        $zarinPal->request($factor->total_price);
    }
    public function bank_verify(){
        $zarinPal = new zarinPal();
        return $zarinPal->verify();
    }
}
