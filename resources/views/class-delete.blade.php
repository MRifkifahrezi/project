@extends('layouts.mainlayout')
@section('title', 'Delete Class')

@section('content')
    <div class="mt-5">
        <h2>Are you sure to Delete Class : {{ $class->name }}</h2>

        <form style="display: inline-block;" action="/class-destroy/{{ $class->id }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger">DELETE</button>
        </form>

        <a href="/class" class="btn btn-primary">CANCEL</a>
    </div>
@endsection
