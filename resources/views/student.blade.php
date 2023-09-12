@extends('layouts.mainlayout')

@section('title', 'Student')

@section('content')
  <h1>Ini Halaman Student</h1>
  
  <div class="my-5 d-flex justify-content-between">
    <a href="student-add"class="btn btn-primary">Tambah Data</a>
    <a href="student-deleted"class="btn btn-info">Show Deleted Data</a>

  </div>

  @if (Session::has('status'))
  <div class="alert alert-success" role="alert">
      {{ Session::get('message') }}
  </div>
  @endif

  <h3>Student List</h3>

  <table class="table">
    <thead>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Gender</th>
        <th>NIS</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($studentlist as $data)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->gender}}</td>
        <td>{{$data->nis}}</td>
        <td>
          <a href="students/{{$data->id}}" class="btn btn-primary">DETAIL</a>
          <a href="student-edit/{{$data->id}}" class="btn btn-warning">EDIT</a>
          <a href="student-delete/{{$data->id}}" class="btn btn-danger">DELETE</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection