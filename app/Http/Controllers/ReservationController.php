<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index(){
        $user_id=Auth::id();
        $reservation=Reservation::where('user_id','=',$user_id)->first();
        return view('reservation',compact('user_id','reservation'));
    }
    public function store(Request $request)
    {
        $res=Reservation::create([
            'user_id' => $request->user_id,
            'places' => $request->places,
            'notes' => $request->notes,
            'date' => $request->date,
        ]);
        if($res){
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

    public function destroy($id)
    {
        $item=Reservation::find($id);
        $item->delete();
        return redirect('/home');
    }
    public function admin_delete($id)
    {
        $item=Reservation::find($id);
        $item->delete();
        return redirect()->back()->with('msg','Reservation has been deleted successfully');
    }
    public function getAll(){
        $reservations=Reservation::all();
        return view('admin.reservations',compact('reservations'));
    }
}
