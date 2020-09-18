<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Product;
use App\models\SubCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['categories'] = Category::get(['id','name']);
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewAllCategoriesd(Request $request)
    {
        $subCategories = SubCategory::where('id_category','=',$request->id)->get();

        $id[] =[];
            $lon=0;
        foreach ($subCategories as $values):
            $id[$lon] = $values->id;
            $lon++;
        endforeach;
        $data['productsHome'] = Product::whereIn('id_sub_category',$id)->paginate(10);
        
        // dd($data['productsHome']);
        return view('client.search',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $data['productsHome'] = Product::where('name','like','%'.$request->search.'%')->paginate(10);
        
        return view('client.search',$data);
        // dd($search['search']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
