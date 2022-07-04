<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeEmployeeRequest;
use Illuminate\Http\Request;
use App\models\employee;

class employeeController extends Controller
{
    public function index()
    {
        $employees = employee::all();
        return response()->json(['employees'=>$employees], 200);
    }



public function store(Request $request)
{
 $request->validate([
        'name' => "required",
        'bday' =>  "required",
        'gender' => "required",
        'salary' => "required"
        

 ]);


    $employee = new employee;
   $employee->name = $request->name;
   $employee->bday = $request->bday;
   $employee->gender = $request->gender;
   $employee->salary = $request->salary;
   $employee->save();
   return response()->json(['message'=>'employee added successfully'], 200);


}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => "required",
        'bday' =>  "required",
        'gender' => "required",
        'salary' => "required"
        

 ]);


    $employee = employee::find($id);
 if($employee)
 {

    $employee->name = $request->name;
   $employee->bday = $request->bday;
   $employee->gender = $request->gender;
   $employee->salary = $request->salary;
   $employee->update();
   return response()->json(['message'=>'employee information updated successfully'], 200);
}
else
{
    return response()->json(['message'=>'No Employee Found'], 404);
  
}

}
public function destroy($id)
    {
        $employee = employee::find($id);
   if($employee)
   {
$employee->delete();
return response()->json(['message'=>'employee information deleted successfully'], 200);

   }
   else
   {
    return response()->json(['message'=>'No Employee Found'], 404); 
   }
}


}