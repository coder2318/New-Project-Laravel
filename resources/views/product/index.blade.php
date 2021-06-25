@extends('layout')

@section('content')
    <form action="{{route('product.index')}}" method="get"></form>
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col">Quantity</th>
        </tr>
        </thead>
        <tbody>
        @if(session()->has('message'))
            <div class="alert alert-danger">
                <strong>SUccess</strong>{{session()->get('message')}}
            </div>
        @endif
        @foreach($products as $item)
        <tr>
            <th>{{$item->id}}</th>
            <td>{{$item->upper_name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->category  ? $item->category->name : ''}}</td>
            <td>{{$item->quantity}}</td>
            <td>
                <a class="btn btn-warning" href="{{route('product.edit', ['product' => $item->id])}}">Update</a>
                <a class="btn btn-success" href="{{route('product.show', ['product' => $item->id])}}">Show</a>
                <form action="{{route('product.destroy', ['product' => $item->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
{{--        <div>--}}
{{--            {{$products->links()}}--}}
{{--        </div>--}}
    </table>
@endsection
