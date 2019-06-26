<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Type;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\EditProductRequest;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function index(Request $req)
    {
        $products = DB::table('view_product')
            ->orderBy('code')
            ->get();
        $categories = Category::orderBy('id')
            ->get();
        $types = Type::orderBy('id')
            ->get();
        return view('admin.product.list')
                ->with('products', $products)
                ->with('categories', $categories)
                ->with('types', $types);
    }
    public function create(Request $req)
    {
        $categories = Category::orderBy('id')
                            ->get();
        $types = Type::orderBy('id')
                            ->get();
        return view('admin.product.add')
                ->with('categories', $categories)
                ->with('types', $types);
    }
    public function store(ProductRequest $req)
    {
        $product = new Product();
        $product->code = $req->code;
        $product->name = $req->name;
        $product->buy_price = $req->buy_price;
        $product->price = $req->price;
        $product->discount = $req->discount;
        if ($req->discount > 0){
            $product->discount_price = $req->price - ($req->price * $req->discount / 100);
        }else{
            $product->discount_price = $req->price;
        }
        $product->quantity = $req->quantity;
        $product->sold = 0;
        $product->new = $req->new;
        $product->category = $req->category;
        $product->type = $req->type;
        $product->status = $req->status;
        $image1 = $req->file('image1');
        $image_resize = Image::make($image1->getRealPath());
        $image_resize->resize(350, 500);
        $imageName = $product->code."-1.".$image1->getClientOriginalExtension();
        $image_resize->save(public_path('images/products/'
            .$imageName));
        $product->image1 = 'products/'.$imageName;
        if ($req->file('image2')){
            $image2 = $req->file('image2');
            $image_resize = Image::make($image2->getRealPath());
            $image_resize->resize(350, 500);
            $imageName = $product->code."-2.".$image2->getClientOriginalExtension();
            $image_resize->save(public_path('images/products/'
                .$imageName));
            $product->image2 = 'products/'.$imageName;
//            $fileName = $product->code."-2.".$image2->getClientOriginalExtension();
//            $image2->move('images/products', $fileName);
        }
        if ($req->file('image3')){
            $image3 = $req->file('image3');
            $image_resize = Image::make($image3->getRealPath());
            $image_resize->resize(350, 500);
            $imageName = $product->code."-3.".$image3->getClientOriginalExtension();
            $image_resize->save(public_path('images/products/'
                .$imageName));
            $product->image3 = 'products/'.$imageName;
//            $fileName = $product->code."-3.".$image3->getClientOriginalExtension();
//            $image3->move('images/products', $fileName);
        }
        $product->specification = json_encode($req->specification);
        $product->save();
        return redirect()->route('product.index');
    }
    public function edit(Request $req, $code)
    {
        $product = Product::where('code', $code)
            ->first();
        $categories = Category::orderBy('id')
            ->get();
        $types = Type::orderBy('id')
            ->get();
        $specifications = json_decode($product->specification);
        return view('admin.product.edit')
            ->with('product', $product)
            ->with('specifications', $specifications)
            ->with('categories', $categories)
            ->with('types', $types);
    }
    public function update(EditProductRequest $req)
    {
        $product = Product::find($req->id);
        $product->name = $req->name;
        $product->code = $req->code;
        $product->buy_price = $req->buy_price;
        $product->price = $req->price;
        $product->discount = $req->discount;
        if ($req->discount > 0){
            $product->discount_price = $req->price - ($req->price * $req->discount / 100);
        }else{
            $product->discount_price = $req->price;
        }
        $product->quantity = $req->quantity;
        $product->new = $req->new;
        $product->category = $req->category;
        $product->type = $req->type;
        if ($req->file('image1')){
            $image1 = $req->file('image1');
            $image_resize = Image::make($image1->getRealPath());
            $image_resize->resize(350, 500);
            $imageName = $product->code."-1.".$image1->getClientOriginalExtension();
            $image_resize->save(public_path('images/products/'
                .$imageName));
        }
        if ($req->img2 == 1){
            if ($req->file('image2')) {
                $image2 = $req->file('image2');
                $image_resize = Image::make($image2->getRealPath());
                $image_resize->resize(350, 500);
                $imageName = $product->code."-2.".$image2->getClientOriginalExtension();
                $image_resize->save(public_path('images/products/'
                    .$imageName));
                $product->image2 = 'products/' . $imageName;
//                $fileName = $product->code . "-2." . $image2->getClientOriginalExtension();
//                $image2->move('images/products', $fileName);
            }
        }else{
            $product->image2 = null;
        }
        if ($req->img3 == 1){
            if ($req->file('image3')) {
                $image3 = $req->file('image3');
                $image_resize = Image::make($image3->getRealPath());
                $image_resize->resize(350, 500);
                $imageName = $product->code."-3.".$image3->getClientOriginalExtension();
                $image_resize->save(public_path('images/products/'
                    .$imageName));
                $product->image3 = 'products/' . $imageName;
//                $fileName = $product->code . "-3." . $image3->getClientOriginalExtension();
//                $product->image3 = 'products/' . $fileName;
//                $image3->move('images/products', $fileName);
            }
        }else{
            $product->image3 = null;
        }
        $product->specification = json_encode($req->specification);
        $product->save();
        return redirect()->route('product.edit', [$product->code]);
    }
    public function show(Request $req)
    {
        return view('admin.product.details');
    }
    public function newAdd(Request $req, $code)
    {
        $product = Product::where('code', $code)
            ->first();
        return view('admin.product.add-quantity')
            ->with('product', $product);
    }
    public function newStore(Request $req)
    {
        $this->validate($req, [
            'quantity' => 'bail | required | numeric | min:value',
        ]);
        $product = Product::find($req->id);
        $product->quantity = $product->quantity + $req->quantity;
        $product->save();
        return redirect()->route('product.index');
    }
    public function statusAction(Request $req, $code)
    {
        $product = Product::where('code', $code)
            ->first();
        if ($product->status == 2){
            $product->status = 1;
        }else{
            $product->status = 2;
        }
        $product->save();
        return redirect()->route('product.index');
    }
    public function searchByCategory(Request $req)
    {
        $categories = json_decode($req->categories);
        $types = json_decode($req->types);
        if (count($categories) == 0 && count($types) == 0) {
            // echo "Nothing selected\n";
            return;
        }else if(count($types) == 0){
            // echo "Types no selected\n";
            $products = DB::table('view_product')
                ->whereIn('category', $categories)
                ->get();
        }else if(count($categories) == 0){
            // echo "Categories no selected\n";
            $products = DB::table('view_product')
                ->whereIn('type', $types)
                ->get();
        }
        else{
            $products = DB::table('view_product')
                ->whereIn('type', $types)
                ->whereIn('category', $categories)
                ->get();
        }
        if (count($products) == 0){
            return;
        }
        return $this->ajaxResponse($products);
    }
    private function ajaxResponse($products){

        $host = $_SERVER['HTTP_HOST'];
        $response = "";
        foreach ($products as $product){
            $response = $response.'<tr>';
            $response = $response.'<td> <img  class="table-image" src="http://'.$host.'/images/'.$product->image1.'" alt="'.$product->name.'"></td>';
            $response = $response.'<td><a href="'.$host.'//admin/update-product/'.$product->code.'">'.$product->name.'</a></td>';
            $response = $response.'<td>'.$product->code.'</td>';
            $response = $response.'<td>'.$product->category_name.'</td>';
            $response = $response.'<td>'.$product->type_name.'</td>';
            $response = $response.'<td>'.$product->buy_price.'</td>';
            $response = $response.'<td>'.$product->price.'</td>';
            $response = $response.'<td>'.$product->discount.'%</td>';
            $response = $response.'<td>'.$product->quantity.'</td>';
            $response = $response.'<td>'.$product->sold.'</td>';
            $response = $response.'<td><a href="'.$host.'/admin/add-quantity/'.$product->code.'">Add</a> </td>';
            $response = $response.'<td><a href="'.$host.'/admin/product-status/'.$product->code.'">Add</a> </td>';
        }
        return $response;
    }
}
