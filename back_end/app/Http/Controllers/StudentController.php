<?php

namespace App\Http\Controllers;

use App\Models\tb_student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function addStudent(Request $request) {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'age' => 'required',
        ]);

        if(!$validated) {
            return response()->json([
                'message' => 'Record not found.'
            ], 404);
        } else {
            $student = new tb_student();
            $student->last_name= $request->last_name;
            $student->first_name= $request->first_name;
            $student->middle_name= $request->middle_name;
            $student->age= $request->age;
    
            $student->save();
        }
    }

    public function getStudentList() {
        $student = new tb_student();
        return  $student->get();
    }

    public function updateStudent(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'age' => 'required',
        ]);

        if(!$validated) {
            return response()->json([
                'message' => 'Record not found.'
            ], 404);
        } else {
            $student = new tb_student();

            $where = [
                "id" => $request->id
            ];

            $values = [
                "last_name" => $request->last_name,
                "first_name" => $request->first_name,
                "middle_name" => $request->middle_name,
                "age" => $request->age,
            ];
    
            $student->updateOrCreate($where, $values);
        }
    }

    public function deleteStudent($id) {
        $student = new tb_student();
        $student->where('id', $id)->delete();
        return "Student Successfully Deleted";
    }
}
