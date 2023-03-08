<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use DB;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentCLasses = DB::table('student_classes')->get();
        return response()->json($studentCLasses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|unique:student_classes|max:25'
        ]);

        $data = array(
            'class_name' => $request->class_name
        );
        DB::table('student_classes')->insert($data);
        return response('Inserted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = StudentClass::findorfail($id);
        return response()->json($class);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array(
            'class_name' => $request->class_name
        );
        DB::table('student_classes')->where('id',$id)->update($data);
        return response('Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('student_classes')->where('id',$id)->delete();
        return response("Deleted!");
    }
}
