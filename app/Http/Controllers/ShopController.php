<?php

namespace App\Http\Controllers;

use App\Http\Requests\newAttrProductSeller;
use App\Http\Requests\updateProductSeller;
use App\Models\attr_filter;
use App\Models\attr_product;
use App\Models\down_all_menu;
use App\Models\factor;
use App\Models\product;
use App\Models\property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    public function index()
    {
        if (auth()->check()){
            if (auth()->user()->action == 2){
                $data = product::whereSeller(auth()->user()->id)->get();
                $user = User::find(auth()->user()->id);
                return view('front.section.shop_panel' , compact('data','user'));
            }
        }
        return 'OK';
    }

    public function view_product_shop($name)
    {
        $data = product::whereSeller($name)->get();
        $user = User::find($name);
        return view('front.section.shop_view' , compact('data' , 'user'));
    }

    public function buy()
    {
        if (auth()->check()){
            if (auth()->user()->action == 2){
                $user = User::find(auth()->user()->id);
                return view('front.section.shop_panel_buy' , compact('user'));
            }
        }
    }

    public function profile()
    {
        if (auth()->check()){
            if (auth()->user()->action == 2){
                $user = User::find(auth()->user()->id);
                return view('front.section.shop_panel_profile' , compact('user'));
            }
        }
        return 'OK';
    }

    public function delete_product_seller(Request $request)
    {
        $count = product::whereId($request->id)->count();
        if ($count){
             product::whereId($request->id)->delete();
            return 'OK';
        }else{
            return 'NO';
        }

    }
    public function edit_product_seller(product $name){
        $edit = true;
        $down_all_menu = down_all_menu::all();
        if($name->seller == auth()->user()->id)
            return view('front.section.shop_panel' , compact('edit' , 'down_all_menu'))->with('data' , $name);
        else
            return abort(404);
    }
    public function edit_product_seller_send(updateProductSeller $request , product $name){
        $edit = true;
        if($name->seller == auth()->user()->id){
            $name->name = $request->name;
            $name->price = $request->price;
            $name->description = $request->description;
            $name->off = $request->off;
            // $name->menu_id = $request->menu_id;
            // $name->sub_menu_id = $request->sub_menu_id;
            $name->brand_id = $request->brand_id;
            $name->slug =Str::slug($request->name);
            $name->save();
            return back()->with('msg' , 'با موفقیت اعمال شد');
        }else{
            throw abort(404);
        }
    }
    public function edit_product_menu_seller_send(Request $request , product $name){
        if($name->seller == auth()->user()->id){
             $name->menu_id = $request->menu_id;
             $name->sub_menu_id = $request->sub_menu_id;
            $name->save();
            return back()->with('msg' , 'با موفقیت اعمال شد');
        }else{
            throw abort(404);
        }
    }
    public function new_attr_product_seller(newAttrProductSeller $request , product $name , property $property){
        if($name->seller == auth()->user()->id){
            $property->title = $request->title_attr;
            $property->name = $request->name_attr;
            $property->product_id = $name->id;
            $property->save();
           return back()->with('msg' , 'با موفقیت اضافه شد');
       }else{
           throw abort(404);
       }
    }
    public function delete_attr_product_seller(Request $request){
        $count = property::whereId($request->id)->get();
        if($count->count() == 1){
            property::whereId($request->id)->delete();
            return 'OK';
        }else{
            return 'NO';
        }
    }
    public function send_attr_product_seller(Request $request){
        $data = attr_product::whereId($request->id)->first();
        if($data->count() > 0){
            $data->update(['attr_filter_id' => $request->attr]);
            return 'OK';
        }else{
            return 'NO';
        }
    }
}
