<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $data["friends"] = User::whereNot("id", auth()->user()->id)->get();

        return view("chat", $data);
    }

    /**
     * save message
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function saveMessage(Request $request){
        $roomId = $request->roomId;
        $message = $request->message;
        // $userId = $request->id;
        $userId = auth()->user()->id;

        broadcast(new SendMessage($roomId, $userId, $message));

        Message::create([
            "room_id" => $roomId,
            "user_id" => $userId,
            "message" => $message,
        ]);

        return response()->json([
            "success" => true,
            "message" => "Message Success stored"
        ]);
    }

    /**
     * load message
     * @param $roomId
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadMessage($roomId){
        $message = Message::where("room_id", $roomId)->orderBy("updated_at", "asc")->get();

        return response()->json([
            "success" => true,
            "data" => $message,
        ]);
    }
}
