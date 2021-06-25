@csrf

<div class="mb-3">
    <div class="form-group">
        <input class="form-control" name="name" id="exampleFormControlInput1" placeholder="name" value="{{isset($product) ? $product->name : old('name')}}">
        <span class="text-danger">{{$errors->first('name')}}</span>
    </div>
</div>
<div class="mb-3">
    <div class="form-group">
        <select class="form-control" name="category_id" id="">
            @foreach($category as $item)
                <option @if(isset($product) and $product->category_id == $item->id ) selected=""  @endif value="{{ $item->id}}">{{ $item->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="mb-3">
    <div class="form-group">
        <input class="form-control" name="price" id="exampleFormControlInput1" placeholder="price" value="{{isset($product) ? $product->price : old('price')}}">
        <span class="text-danger">{{$errors->first('price')}}</span>
    </div>
</div>
<div class="mb-3">
    <div class="form-group">
        <input class="form-control" name="quantity" id="exampleFormControlInput1" placeholder="quantity" value="{{isset($product) ? $product->quantity : old('quantity')}}">
        <span class="text-danger">{{$errors->first('quantity')}}</span>

    </div>
</div>
<div class="mb-3">
    <input class="form-control" type="file" name="image">
    <span class="text-danger">{{$errors->first('image')}}</span>

</div>
<div class="mb-3">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
