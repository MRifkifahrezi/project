@extends('layouts.mainlayout')
@section('title', 'Delete Student')

@section('content')
    <div class="mt-5">
        <h2>Are you sure to Delete Data : {{ $student->name }} ( NIS : {{ $student->nis }} )</h2>

        <form style="display: inline-block;" action="/student-destroy/{{ $student->id }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger">DELETE</button>
        </form>

        <a href="/student" class="btn btn-primary">CANCEL</a>
    </div>
@endsection
