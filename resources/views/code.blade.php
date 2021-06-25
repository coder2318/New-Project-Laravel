@extends('layouts.app')

@section('content')
    <form action="{{route('check-code')}}" method="post">
        @csrf
        {{$email}}
        <input type="email" name="email">
        <input type="number" name="code">
        <button type="submit">Check</button>
    </form>
@endsection
