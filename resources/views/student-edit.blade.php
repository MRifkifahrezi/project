@extends('layouts.mainlayout')
@section('title', 'Edit Student')

@section('content')
    <h1>Ini Halaman Edit Student</h1>

    <div class="mt-5 col-8 m-auto">
        <form action="/student/{{$student->id}}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name">Name Student :</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$student->name}}" required>
            </div>

            <div class="mb-3">
                <label for="gender">Gender :</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="{{$student->gender}}">{{$student->gender}}</option>
                    @if ($student->gender == 'L')
                    <option value="P">P </option>
                    @else
                    <option value="L">L </option>
                    @endif
                </select>
            </div>

            <div class="mb-3">
                <label for="nis">NIS :</label>
                <input type="number" class="form-control" name="nis" id="nis" value="{{$student->nis}}">
            </div>

            <div class="mb-3">
                <label for="class">Class :</label>
                <select name="class_id" id="class" class="form-control" required>
                    <option value="{{$student->class->id}}">{{$student->class->name}}</option>
                    @foreach ($class as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">UPDATE</button>
            </div>
        </form>
    </div>
@endsection
