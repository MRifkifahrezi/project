<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;




class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::all();
        return view('teacher', ['teacherlist' => $teacher]);
    }

    public function show($id)
    {
        $teacher = Teacher::with('class.students')->findOrFail($id);
        return view('teacher-detail', ['teacher' => $teacher]);
    }

    public function create()
    {
        return view('teacher-add');
    }

    public function store(Request $request)
    {
        $teacher = Teacher::create($request->all());

        if($teacher){
            Session::flash('status', 'success');
            Session::flash('message', 'add new Class success!');
        }


        return redirect('/teacher');
    }

    public function edit(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher-edit', ['teacher'=>$teacher]);
    }

    public function update(Request $request, $id){
        $teacher = Teacher::findOrFail($id);

        $teacher->update($request->all());
        return redirect('/teacher');
    }
    
    public function delete($id){
        $teacher = Teacher::findOrFail($id);
        return view('teacher-delete', ['teacher' => $teacher]);
    }

    public function destroy($id){
        $deletedTeacher = Teacher::findOrFail($id);
        $deletedTeacher->delete();

        if($deletedTeacher){
            Session::flash('status', 'success');
            Session::flash('message', 'delete teacher success!');
        }

        return redirect('/teacher');
    }
}
