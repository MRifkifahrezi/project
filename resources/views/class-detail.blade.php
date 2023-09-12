@extends('layouts.mainlayout')

@section('title', 'class')

@section('content')

<h2>Anda sedang melihat data detail dari class {{$class->name}}</h2>

<div class= "mt-5">
    <h4>Homeroom Teacher : {{$class->homeroomTeacher->name}}</h4>
</div>

<div class="mt-5">
    <h5>Student List</h5>
    <ol>
        @foreach ($class->students as $item)
            <li>{{$item->name}}</li>
        @endforeach
    </ol>
</div>
@endsection