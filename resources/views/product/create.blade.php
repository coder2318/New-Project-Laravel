@extends('layout')
@section('content')
<h4>Product Create Form</h4>
<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
{{--    {{csrf_token()}}--}}
    @include('product.form')
</form>
@endsection
