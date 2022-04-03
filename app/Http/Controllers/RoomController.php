<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveRoomRequest;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(Request $request){

        $table = (object)[
            "name" => "Název",
            "no" => "Číslo",
            "phone" => "Telefon",
        ];

        $data = Room::orderBy( ((property_exists($table, $request->order)) ? $request->order : 'name'), (($request->direction === 'up')? 'asc' : 'desc')  )->get();

        return view('rooms.index', ['data' => $data, 'table' => $table]);
    }




    public function create(Request $request){
        $rooms = Room::all();


        return view('rooms.create', ["title" => "Create new", "rooms" => $rooms]);
    }



    public function destroy(Request $request, $id)
    {
        Employee::destroy($id);


        return redirect()->route('employee.index');
    }





    public function edit($id){

        $room = Room::findOrFail($id);

        return view('rooms.edit', [
            'title' => 'Edit room',
            'room' => $room,
        ]);
    }



    public function update(SaveRoomRequest $request, Room $room){

//        $request->validate([
//                        'name' => 'required',
//                        'no' => 'sometimes|required|unique:room,no,' . $room->room_id,
//                        'phone' => 'nullable|unique:room,phone,'
//        ]);
//        return $request->all();

        $room = Room::findOrFail($room->room_id);
        $room->update($request->all());


        return redirect()->route('room.show', $room->room_id);
    }



    public function store(SaveRoomRequest $request){

        $room = Room::create($request->all());

        return redirect()->route('room.show', $room->room_id);
    }



    public function show($id)
    {

        $table = (object)[
            "no" => "Číslo",
            "name" => "Název",
            "phone" => "Telefon",
            "employees" => "Lidé",
            "wage_avg" => "Průměrná mzda",
            "keys" => "Klíče",
        ];

       $data = Room::findOrFail($id);


        return view('rooms.show', [
            'room' => $data,
            'table' => $table

        ]);
    }

}
