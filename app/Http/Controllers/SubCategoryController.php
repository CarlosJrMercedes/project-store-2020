<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subCategories']= SubCategory::with('category')->paginate(10);
        // dd($data);
        return view('sub-category.index', $data);
    }

    public function restore()
    {
        
        $data['subCategories'] = SubCategory::onlyTrashed()->get();
        return view('sub-category.restore', $data);
    }

    public function enable(Request $request, $id)
    {
        $subCategory = SubCategory::withTrashed()->where('id', $id)->restore();
        
        if($subCategory){
            $request->session()->flash('exito', true);
            return redirect()->route('sub-categories.index');
        }else{
            $request->session()->flash('failed', true);
            return redirect()->route('sub-categories.index');
        }
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories']= Category::get();
        return view('sub-category.create', $data);
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
            'name' => ['required','string','max:60'],
            'category' => ['required']
        ]);
        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->id_category = $request->category;

        if($subCategory->save()){
            $request->session()->flash('exito', true);
            return redirect()->route('sub-categories.index');
        }else{
            $request->session()->flash('failed', true);
            return redirect()->route('sub-categories.index');
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
        $data['subCategory'] = SubCategory::find($id);
        $data['categories'] = Category::get();
        return view('sub-category.edit',$data);

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
            'name' => ['required','string','max:60'],
            'category' => ['required']
        ]);
        $subCategory = SubCategory::find($id);
        $subCategory->name = $request->name;
        $subCategory->id_category = $request->category;

        if($subCategory->save()){
            $request->session()->flash('exito', true);
            return redirect()->route('sub-categories.index');
        }else{
            $request->session()->flash('failed', true);
            return redirect()->route('sub-categories.index');
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
        $subCat = SubCategory::find($id);
        

        if($subCat->delete()){
            $request->session()->flash('exito', true);
            return redirect()->route('sub-categories.index');
        }else{
            $request->session()->flash('failed', true);
            return redirect()->route('sub-categories.index');
        }
    }
}
