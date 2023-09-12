<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\Session;
use illuminate\Http\request;


class ClassController extends Controller
{
    public function index()
    {
        //Lazy load
        // $class = ClassRoom::all();//cara request data => ketika dibutuhkan ambil data
        //select * from table class
        //select * from student where class = 1 A
        //select * from student where class = 1 B
        //select * from student where class = 1 C
        //select * from student where class = 1 D

        //eager load
        $class = ClassRoom::get(); //cara request data
        //select * from table class
        //select * from student where class in (1a,1b,1c,1d)
        return view('classroom', ['classlist' => $class]);
    }

    public function show($id)
    {
        $class = ClassRoom::with(['students', 'homeroomTeacher'])->findOrFail($id);
        return view('class-detail', ['class' => $class]);
    }
    public function create()
    {
        $teachers = teacher::select('id', 'name')->get();
        return view('class-add', ['teachers' => $teachers]);
    }

    public function store( Request $request)
    {

        $class = ClassRoom::create($request->all());
        if($class){
            Session::flash('status', 'success');
            Session::flash('message', 'add new Class success!');
        }

        return redirect('/class');
    }

    public function edit(Request $request, $id)
    {
        $class = ClassRoom::with('homeroomTeacher')->findOrFail($id);
        $teacher = Teacher::where('id', '!=', $class->teacher_id)->get(['id', 'name']);
        return view('class-edit', ['class' => $class, 'teacher' => $teacher]);
    }

    public function update(Request $request, $id){
        $class = ClassRoom::findOrFail($id);

        $class->update($request->all());
        return redirect('/class');
    }

    public function delete($id){
        $class = ClassRoom::findOrFail($id);
        return view('class-delete', ['class' => $class]);
    }

    public function destroy($id){
        $deletedClass = ClassRoom::findOrFail($id);
        $deletedClass-> delete();
        if($deletedClass){
            Session::flash('status', 'success');
            Session::flash('message', 'delete student success!');
        }
        return redirect('/class');
    }
    
    
}
