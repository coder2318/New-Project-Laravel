@extends('layout')

@section('content')
    <div class="card" style="width: 18rem;">
        @if(session()->has('message'))
            <div class="alert alert-success">
                <strong>SUccess</strong>{{session()->get('message')}}
            </div>
        @endif
        <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text"><b>Narxi</b> : {{$product->price}} </p>
            <p class="card-text"><b>Category</b> : {{$product->category->name}} </p>
            <a href="{{route('product.edit', ['product' => $product->id])}}" class="btn btn-primary">Update</a>
            <img src="{{asset('storage/'.$product->image)}}" alt="bu yerda rasm bulishi kerak edi ">
            {{storage_path('app/public/'.$product->image)}}
        </div>
    </div>
@endsection
