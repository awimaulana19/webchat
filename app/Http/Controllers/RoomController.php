<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    /**
     * create and check room
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request){
        $me = auth()->user()->id;
        // $me = $request->id;
        $friend = $request->friend_id;

        $room = Room::where("users", $me.":".$friend)
                    ->orWhere("users", $friend.":".$me)
                    ->first();

        if($room){
            $dataRoom = $room;
        } else{
            $dataRoom = Room::create([
                "users" => $me.":".$friend
            ]);
        }

        return response()->json([
            "success" => true,
            "data" => $dataRoom
        ]);
    }
}
