@extends('layouts.mainlayout')

@section('title', 'Class')

@section('content')
  <h1>Ini Halaman Class</h1>

  <div class="my-5">
    <a href="class-add"class="btn btn-primary">Tambah Data</a>
  </div>

  @if (Session::has('status'))
  <div class="alert alert-success" role="alert">
      {{ Session::get('message') }}
  </div>
  @endif

  <h3>Class List</h3>

  <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classlist as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->name}}</td>
                <td>
                    <a href="class-detail/{{$data->id}}" class="btn btn-primary">DETAIL</a>
                    <a href="class-edit/{{$data->id}}" class="btn btn-warning">EDIT</a>
                    <a href="class-delete/{{ $data->id }}" class="btn btn-danger">DELETE</a>

                </td>
            </tr>
            @endforeach
        </tbody>
  </table>
  @endsection