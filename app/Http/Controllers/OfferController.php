<?php

namespace App\Http\Controllers;

use App\models\Offer;
use App\models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['offers'] = Offer::with('product')->paginate(10);
        return view('offer.index',$data);

    }
    public function restore()
    {
        
        $data['offers'] = Offer::with('product')->onlyTrashed()->get();
        return view('offer.restore', $data);
    }

    // metodo para desabilitar usuario
    public function enable(Request $request, $id)
    {
        $offer = Offer::withTrashed()->where('id', $id)->restore();
        
        if($offer){
            $request->session()->flash('exito', true);
            return redirect()->route('offer.index');
        }else{
            $request->session()->flash('failed', true);
            return redirect()->route('offer.index');
        }
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['product']= Product::get(['id','name']);
        return view('offer.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valdacion = $request->validate([
            'descripcion' => ['required','string','max:200'],
            'producto' => ['required'],
            'start' =>['required','date'],
            'end' =>['required','date'],
            'offerPrice' => ['required', 'numeric', 'min:0',Rule::notIn(['0']),'max:1000'],
        ]);

        $newoffer = new Offer();

        $newoffer->description = $request->descripcion;
        $newoffer->product_id = $request->producto;
        $newoffer->start = $request->start;
        $newoffer->end = $request->end;
        $newoffer->offer_price = $request->offerPrice;

        if($newoffer->save()){
            $request->session()->flash('exito',true);
            return redirect()->route('offer.index');
        }else{
            $request->session()->flash('failed',true);
            return redirect()->route('offer.index');
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
        $data['offer'] = Offer::with('product')->find($id);
        return view('offer.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product']= Product::get(['id','name']);
        $data['offer'] = Offer::find($id);
        return view('offer.edit', $data);
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
        $valdacion = $request->validate([
            'descripcion' => ['required','string','max:200'],
            'producto' => ['required'],
            'start' =>['required','date'],
            'end' =>['required','date'],
            'offerPrice' => ['required', 'numeric', 'min:0',Rule::notIn(['0']),'max:1000'],
        ]);

        $newoffer = Offer::find($id);

        $newoffer->description = $request->descripcion;
        $newoffer->product_id = $request->producto;
        $newoffer->start = $request->start;
        $newoffer->end = $request->end;
        $newoffer->offer_price = $request->offerPrice;

        if($newoffer->save()){
            $request->session()->flash('exito',true);
            return redirect()->route('offer.index');
        }else{
            $request->session()->flash('failed',true);
            return redirect()->route('offer.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $offer = Offer::find($id);
        

        if($offer->delete()){
            $request->session()->flash('exito', true);
            return redirect()->route('offer.index');
        }else{
            $request->session()->flash('failed', true);
            return redirect()->route('offer.index');
        }
    }
}
