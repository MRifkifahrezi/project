<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Support\Facades\Session;
// use Symfony\Component\HttpFoundation\Request;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $ekskul = Extracurricular::get();
        return view('extracurricular', ['ekskullist' => $ekskul]);
    }

    public function show($id)
    {
        $ekskul = Extracurricular::with('students')->findOrFail($id);
        return view('extracurricular-detail', ['ekskul' => $ekskul]);
    }

    public function create()
    {
        return view('extracurricular-add');
    }
    public function store(Request $request)
    {
        $ekskul = Extracurricular::create($request->all());

        if($ekskul){
            Session::flash('status', 'success');
            Session::flash('message', 'add new Extracurricular success!');
        }
        
        return redirect('/extracurricular');
    }

    public function edit(Request $request, $id)
    {
        $ekskul = Extracurricular::findOrFail($id);
        return view('extracurricular-edit',['ekskul'=>$ekskul]);
    }

    public function update(Request $request, $id){
        $ekskul = Extracurricular::findOrFail($id);

        $ekskul->update($request->all());
        return redirect('/extracurricular');
    }

    public function delete($id){
        $ekskul = Extracurricular::findOrFail($id);
        return view('extracurricular-delete', ['ekskul' => $ekskul]);
    }

    public function destroy($id){
        $deletedEkskul = Extracurricular::findOrFail($id);
        $deletedEkskul->delete();

        if($deletedEkskul){
            Session::flash('status', 'success');
            Session::flash('message', 'delete teacher success!');
        }

        return redirect('/extracurricular');
    }
}
