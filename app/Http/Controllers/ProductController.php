<?php

namespace App\Http\Controllers;

use App\models\Product;
use App\models\SubCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::with('subCategory')->get();
        return view('product.index',$data);
    }
    public function restore()
    {
        
        $data['products'] = Product::with('subCategory')->onlyTrashed()->get();
        return view('product.restore', $data);
    }

    // metodo para desabilitar Productos
    public function enable(Request $request, $id)
    {
        $product = Product::withTrashed()->where('id', $id)->restore();
        
        if($product){
            $request->session()->flash('exito', true);
            return redirect()->route('product.index');
        }else{
            $request->session()->flash('failed', true);
            return redirect()->route('product.index');
        }
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['subCategory'] = SubCategory::get();
        return view('product.create',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=$request->validate([
            'name' => ['required','string','max:60'],
            'subCategory' => ['required'],
            'price' => ['required','numeric','min:0','max:1000',Rule::notIn(['0'])],
            'inventario' =>['required','numeric','min:0',Rule::notIn(['0'])],
            'stop' => ['required','numeric','min:5','max:15'],
            'descripcion' => ['required','string','max:250'],
            'foto' => ['required','image','max:2048']
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->descripcion;
        $product->id_sub_category = $request->subCategory;
        $product->price = $request->price;
        $product->quantity = $request->inventario;
        $product->stop = $request->stop;
        $product->photo1 = basename(Storage::put('src/img/product-images/',$request->foto));

        if ($product->save()) {
            $request->session()->flash('exito',true);
            return redirect()->route('product.index');
        }else{
            $request->session()->flash('failed',true);
            return redirect()->route('product.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['product'] = Product::with('subCategory')->find($id);
        return view('product.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = Product::find($id);
        $data['subCategory'] = SubCategory::get();
            return view('product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->foto) {
            $validation=$request->validate([
                'name' => ['required','string','max:60'],
                'subCategory' => ['required'],
                'price' => ['required','numeric','min:0','max:1000',Rule::notIn(['0'])],
                'inventario' =>['required','numeric','min:0',Rule::notIn(['0'])],
                'stop' => ['required','numeric','min:5','max:15'],
                'descripcion' => ['required','string','max:250'],
                'foto' => ['required','image','max:2048']
            ]);
    
            $product = Product::find($id);
            $product->name = $request->name;
            $product->description = $request->descripcion;
            $product->id_sub_category = $request->subCategory;
            $product->price = $request->price;
            $product->quantity = $request->inventario;
            $product->stop = $request->stop;
            $product->photo1 = basename(Storage::put('src/img/product-images/',$request->foto));
        }else{
            $validation=$request->validate([
                'name' => ['required','string','max:60'],
                'subCategory' => ['required'],
                'price' => ['required','numeric','min:0','max:1000',Rule::notIn(['0'])],
                'inventario' =>['required','numeric','min:0',Rule::notIn(['0'])],
                'stop' => ['required','numeric','min:5','max:15'],
                'descripcion' => ['required','string','max:250']
            ]);
    
            $product = Product::find($id);
            $product->name = $request->name;
            $product->description = $request->descripcion;
            $product->id_sub_category = $request->subCategory;
            $product->price = $request->price;
            $product->quantity = $request->inventario;
            $product->stop = $request->stop;
        }


        if ($product->save()) {
            $request->session()->flash('exito',true);
            return redirect()->route('product.index');
        }else{
            $request->session()->flash('failed',true);
            return redirect()->route('product.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        

        if($product->delete()){
            $request->session()->flash('exito', true);
            return redirect()->route('product.index');
        }else{
            $request->session()->flash('failed', true);
            return redirect()->route('product.index');
        }
    }
}
