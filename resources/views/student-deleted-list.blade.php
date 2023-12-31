@extends('layouts.mainlayout')
@section('title', 'Student Deleted List')

@section('content')
    <h1>Ini Halaman Students yang Sudah di Delete</h1>

    <div class="my-5">
        <a href="/student" class="btn btn-primary">
            << Back</a>
    </div>

    <div class="mt-5">
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
                @foreach ($student as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->gender }}</td>
                        <td>{{ $data->nis }}</td>
                        <td>
                            <a href="student/{{ $data->id }}/restore">
                                <button type="button" class="btn btn-warning">Restore</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
