@extends('layouts.mainlayout')
@section('title', 'add New Class')

@section('content')
<h1>Ini Halaman Add Class</h1>

<div class="mt-5 col-8 m-auto">
    <form action="class" method="post">
        @csrf
        <div class="mb-3">
            <label for="name"> Name Class : </label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Silahkan Masukkan Kelas" required>
        </div>

        <div class="mb-3"> 
            <label for="Teacher">Teacher : </label>
            <select name="teacher_id" id="teacher_id" class="form-control" required>
                <option value="">Select Teacher</option>
                @foreach ($teachers as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            </div>   

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
    </form>
</div>

@endsection