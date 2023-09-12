@extends('layouts.mainlayout')

@section('title', 'Teacher')

@section('content')

<h2>Anda sedang melihat data detail dari Teacher yang bernama {{$teacher->name}} </h2>

<div class="mt-5">
    <h3>
        Class:
        @if ($teacher->class)
            {{$teacher->class->name}}
        @else
            Bukan Wali Kelas
        @endif 
    </h3>
</div>

<div class="mt-5">
    <table class="table">
    <h4>Student List : </h4>
    <h6>
    @if ($teacher->class)
    <ol>
        @foreach ($teacher->class->students as $item)
            <li>{{$item->name}}</li>
        @endforeach
    </ol>
    @else
        Tidak ada murid
    @endif
    </h6>
</div>
@endsection