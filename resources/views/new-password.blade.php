@extends('layouts.app')

@section('content')
    <h1>Yangi parolni kiriting</h1>
    <form action="{{route('change-password')}}" method="post">
        @csrf
        {{$email}} <br>
        <input type="text" name="email"> <br>
        <input type="password" name="password">
        <button type="submit">Save</button>
    </form>
@endsection
