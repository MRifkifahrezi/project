  @extends('layouts.mainlayout')

  @section('title', 'Home')

  @section('content')
    <center><h1>Ini Halaman Home</h1></center>
    <center><h2>Selamat datang {{$name}}. Anda adalah {{$role}} </h2></center>

    @endsection
