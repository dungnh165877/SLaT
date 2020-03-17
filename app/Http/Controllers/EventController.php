<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Event;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class EventController extends Controller
{
    public function index(){
        $events = DB::table('events')->paginate(5);
        return view('listEvent', compact('events'));
    }

    public function fetchEvent(Request $request){
        if ($request->ajax()){
            $events = DB::table('events')->paginate(5);
            return view('fetchEvent', compact('events'))->render();
        }
    }

    public function updateEvent(Request $request) {
        if (!$request->content || !$request->name) {
            return response()->json([
                'message'   => 'Name Or Content required!!!',
                'status' => false
            ]);
        }
        $event = Event::find($request->id_event);
        $event->name = $request->name;
        $event->content = $request->content;
        $res = $event->save();
        if ($res) {
            return response()->json([
                'message'   => 'Update Event Successfully !!!',
                'status' => true
            ]);
        } else {
            return response()->json([
                'message'   => 'Update Event Error !!!',
                'status' => false
            ]);
        }
    }

    public function deleteManyEvent(Request $request){
        if (!$request->arr_event_id) {
            return response()->json([
                'message'   => 'Wrong!!! Sorry',
                'status' => false
            ]);
        }
        $number = 0;
        foreach ($request->arr_event_id as $id) {
            $event = Event::find($id);
            if($event->delete()){
                $number ++;
            }
        }
        if ($number == count($request->arr_event_id)) {
            return response()->json([
                'message'   => 'Delete Event Successfully !!!',
                'status' => true
            ]);
        } else {
            return response()->json([
                'message'   => 'Delete Event Error !!!',
                'status' => false
            ]);
        }
    }

    public function deleteEvent(Request $request){
        if (!$request->id_event) {
            return response()->json([
                'message'   => 'Wrong!!! Sorry',
                'status' => false
            ]);
        }
        $event = Event::find($request->id_event);
        if ($event->delete()){
            return response()->json([
                'message'   => 'Delete Event Successfully !!!',
                'status' => true
            ]);
        } else {
            return response()->json([
                'message'   => 'Delete Event Error !!!',
                'status' => false
            ]);
        }
    }
}
