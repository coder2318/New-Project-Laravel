<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\EventOne;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function __construct()
    {
//        $this->middleware(['auth'])->only('create');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $user = Auth::guard()->user();
        Product::onlyTrashed()->restore();
        auth()->user();
        $products = Product::with('category');
//        session()->forget('message');
        if($request->name){
            $change_name=   Str::correctPhone($request->name);
            $products = $products->where('name', 'like', '%'.$change_name.'%');
        }
        $products = $products->orderBy('id', 'desc')->paginate(16);
        return view('product.index', compact('products', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category  = Category::get();
        return view('product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create', Product::class);
        $params = $request->validated();
        $product = Product::create($params);
//        $new_product = $product->replicate()->fill([
//            'name' => 'gilos',
//            'price' => 15000
//        ]);
//        $new_product->save();

        $this->storeImage($product);
//        session()->flash('message', 'Muvaffaqiyatli saqlandi');

//        event(new EventOne($product));
//        return  view('product.index', compact('products'));
        return redirect()->route('product.index');
    }

    public function storeImage($olma)
    {
        if(request()->has('image')){
            $olma->update([
                'image' => request()->image->store('images', 'public')
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->category;
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category  = Category::get();
        return view('product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $params = $request->validated();
        $product->update($params);

        return redirect()->route('product.show', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        $product->forceDelete();
        session(['message' => 'Muvaffaqiyatli ochirildi']);
        return back();
    }
}
