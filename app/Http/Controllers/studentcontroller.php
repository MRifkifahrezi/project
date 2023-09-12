<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\student;
use Illuminate\Support\Facades\Session;
// use Symfony\Component\HttpFoundation\Request;
use Illuminate\Http\Request;
use App\Http\Requests\StudentCreateRequest;


class studentcontroller extends Controller
{
    public function index()
    {
        $student = student::get();
        return view('student', ['studentlist' => $student]);
    }

    public function show($id)
    {
        $student = student::with(['class.homeroomTeacher', 'extracurriculars'])->findOrFail($id);
        return view('student-detail', ['student' => $student]);

    }

    public function create()
    {
        $class = ClassRoom::select('id', 'name')->get();
        return view('student-add', ['class' => $class]);
    }

    public function store(StudentCreateRequest $request)
    {

        $student = student::create($request->all());

        if ($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'add new student success!');
        }
        return redirect('/student');
    }

    public function edit(Request $request, $id)
    {
        $student = student::with('class')->findOrFail($id);
        $class = ClassRoom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        return view('student-edit', ['student' => $student, 'class' => $class]);
    }

    public function update(Request $request, $id)
    {
        $student = student::findOrfail($id);
        $student->update($request->all());
        return redirect('/student');
    }

    public function delete($id){
        $student = student::findOrFail($id);
        return view('student-delete', ['student' => $student]);
    }

    public function destroy($id){
        $deletedStudent = student::findOrFail($id);
        $deletedStudent->delete();

        if($deletedStudent){
            Session::flash('status', 'success');
            Session::flash('message', 'delete student success!');
        }

        return redirect('/student');
    }
    public function deletedStudent(){
        $deletedStudent = student::onlyTrashed()->get();

        return view('student-deleted-list', ['student' => $deletedStudent]);
    }
    public function restore($id){
        $deletedStudent = student::withTrashed()->where('id', $id)->restore();

        if($deletedStudent){
            Session::flash('status', 'success');
            Session::flash('message', 'restore student success!');
        }

        return redirect('/student');
    }
}
