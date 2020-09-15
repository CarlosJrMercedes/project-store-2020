<?php

namespace App\Http\Controllers;

use App\models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['categories']= Category::paginate(10);
        return view('category.index', $data);
    }

    public function restore()
    {
        
        $data['categories'] = Category::onlyTrashed()->get();
        return view('category.restore', $data);
    }

    // metodo para desabilitar categoria
    public function enable(Request $request, $id)
    {
        $category = Category::withTrashed()->where('id', $id)->restore();
        
        if($category){
            $request->session()->flash('exito', true);
            return redirect()->route('categories.index');
        }else{
            $request->session()->flash('failed', true);
            return redirect()->route('categories.index');
        }
    
    }

    // metodo para destruir categoria
    




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name'=>['required', 'string','max:50']
        ]); 
        
        $newCat = new Category();

        $newCat->name = $request->name;

        if($newCat->save()){
            $request->session()->flash('exito', true);
            return redirect()->route('categories.index');
        }else{
            $request->session()->flash('failed', true);
            return redirect()->route('categories.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category']=Category::find($id);
        return view('category.edit',$data);
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
        $validation = $request->validate([
            'name'=>['required', 'string','max:50']
        ]); 
        
        $newCat = Category::find($id);

        $newCat->name = $request->name;

        if($newCat->save()){
            $request->session()->flash('exito', true);
            return redirect()->route('categories.index');
        }else{
            $request->session()->flash('failed', true);
            return redirect()->route('categories.index');
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
        $category = Category::find($id);
        

        if($category->delete()){
            $request->session()->flash('exito', true);
            return redirect()->route('categories.index');
        }else{
            $request->session()->flash('failed', true);
            return redirect()->route('categories.index');
        }
    }
}
