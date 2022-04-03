<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveEmployeeRequest;
use App\Models\Employee;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('admin')->except(['show', 'index']);

    }


    public function index(Request $request){

        $table = (object)[
            "name" => "Jméno",
            "room" => "Místnost",
            "phone" => "Telefon",
            "job" => "Pozice"
        ];

        $order = (($request->order === "phone")?"room.":"e."). ($request->order?:"surname") . (($request->direction === "down") ? " DESC" : " ASC");
        $query = "SELECT e.employee_id, e.name, e.surname, room.name 'room', room.phone, e.job FROM employee e INNER JOIN room ON e.room = room.room_id ORDER BY " . $order;

        $data = DB::select($query);
        // $data = Employee::all();
        // foreach($data as $employee){
        //     $employee-> room = $employee->romm;
        //     var_dump($employee->romm);
        // };

        return view('employees.index', ['data' => $data, 'table' => $table]);
    }

    public function create(Request $request){
        $rooms = Room::all();


        $room_categories = Room::pluck('name', 'room_id');

        return view('employees.create', ["title" => "Create new", "rooms" => $rooms, "room_categories" => $room_categories]);
    }

//    public function destroy(Request $request, $id)
//    {
//        Employee::findOrFail($id)->destroy();
//
//
//        // return view('test');
//    }

    public function destroy(Request $request, $id)
    {
        Employee::destroy($id);


        return redirect()->route('employee.index');
    }





    public function edit($id){
        $room_categories = Room::pluck('name', 'room_id');

        $employee = Employee::findOrFail($id);
        $rooms = Room::all();

        $employee->rooms;

        return view('employees.edit', [
            'title' => 'Edit employee',
            'employee' => $employee,
            "rooms" => $rooms,
            "room_categories" => $room_categories
        ]);
    }

    public function update(SaveEmployeeRequest $request, $id){

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        $employee->rooms()->sync( $request->get('rooms') ?: []);

        return redirect()->route('employee.show', $employee->employee_id);
    }

    public function store(SaveEmployeeRequest $request){

        // return view('employees.create', ["title" => "Create new", "rooms" => $rooms]);
        $emp = Employee::create($request->all());

        $emp->rooms()->sync( $request->get('rooms') ?: []);
//        $emp->save();

        return redirect()->route('employee.show', $emp->employee_id);

    }

    public function show($id)
    {

        $table = (object)[
            "name" => "Jméno",
            "surname" => "Příjmení",
            "job" => "Pozice",
            "wage" => "Mzda",
            "room" => "Místost",
            "keys" => "Klíče"
        ];

       $data = Employee::findOrFail($id);

        return view('employees.show', [
            'employee' => $data,
            'table' => $table

        ]);
//        $emp = Employee::findOrFail($id);
//        return $emp->rooms;
    }



}
