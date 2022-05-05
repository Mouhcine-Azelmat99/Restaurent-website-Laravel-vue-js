<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\User;
use App\Models\Card;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index(){
        $user_id=Auth::user()->id;
        $orders=Order::where('user_id','=',$user_id)->get();
        if(count($orders)){
            $total=0;
            foreach($orders as $order){
                $total+=$order->food->price * $order->qty;
                $date= $order->created_at->diffForHumans();
            }
            return view('orders',compact('orders','total','date'));
        }
        return view('orders',compact('orders'));
    }


    public function store(Request $request){


        $req=array_values((array)$request->all());
        $user_id=$req[0]['user_id'];
        for ($i = 0; $i < count($req); $i++) {
        $saved = Order::create([

            'qty' => $req[$i]['qty'],
            'user_id' => $user_id,
            'food_id' => $req[$i]['food_id'],
        ]);
        }
        $cards=Card::where('user_id','=',$user_id);
        $cards->delete();
        if($saved){
        $data=[
            'status'=>"success",
            'message'=>"Order has been Saved successfully"
        ];
        }
        else{
            $data=[
                'status'=>"danger",
                'message'=>"Error can't save this order try again"
            ];
        }
        return response()->json($data);
    }

    public function getAll(){
        $orders=Order::all();
        
        $user_ids=Order::all()->pluck('user_id')->unique();
        $i=0;
        foreach($user_ids as $user_id){
            $result[$i]=Order::where('user_id','=',$user_id)->get();
            $total=0;
            foreach($result[$i] as $item){
                $total=$total + $item->qty * $item->food->price;
            }
            $result[$i]->total=$total;
            $i++;
        }
        return view('admin.orders',compact('result'));
    }

    public function admin_delete($id)
    {
        $ids=Order::where('user_id','=',$id)->pluck('id');
        Order::destroy($ids);
        return redirect()->back()->with('msg','orders has been deleted successfully');
    }

}
