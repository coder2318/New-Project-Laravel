@extends('layout')

@section('content')
    <form action="{{route('product.update', ['product' => $product->id])}}" method="post">
        @method('put')
        @include('product.form')
    </form>
@endsection
