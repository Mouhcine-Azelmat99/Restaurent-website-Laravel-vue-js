<?php

namespace App\Http\Controllers;
use App\Models\card;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    public function index()
    {
        $user_id=Auth::user()->id;
        return view('card',compact('user_id'));
    }
    public function getCard($id)
    {
        $cards=Card::where('user_id','=',$id);
        $items = DB::table('menus')
                    ->joinSub($cards, 'cards', function ($join) {
                        $join->on('menus.id', '=', 'cards.food_id');
                    })->get();
        return response()->json($items);
    }

    public function store(Request $request)
    {
        $card=Card::create([
            'user_id' => $request->user_id,
            'food_id' => $request->food_id,
            'qty' => $request->qty,
        ]);
        if($card){
            $data=[
                'status'=>"success",
                'message'=>"Food item has been added in the card"
            ];
        }
        else{
            $data=[
                'status'=>"danger",
                'message'=>"Error can't add the record to the card"
            ];
        }
        return response()->json($data);
    }

    public function delete($id){
        $card=Card::find($id);
        $card->delete();
        if($card){
            $data=[
                'status'=>"success",
                'message'=>"Food item has been deleted in the card"
            ];
        }
        else{
            $data=[
                'status'=>"danger",
                'message'=>"Error can't delete this record to the card"
            ];
        }
        return response()->json($data);
    }
}
