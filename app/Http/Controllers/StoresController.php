<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
class StoresController extends Controller
{
    /**
 * Create a new controller instance.
 *
 * @return void
 */
public function __construct()
{
    $this->middleware('auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores=Store::orderBy('id','asc')->simplePaginate(2);
        return view('stores.index')->with('stores',$stores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'naziv'=>'required'
        ]);
        //
        $store=new Store;
        $store->naziv = $request->input('naziv');
        $store->save();
        return redirect('/stores')->with('success','Store created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store=Store::find($id);
        return view('stores.show')->with('store',$store);
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
        //
        $store=Store::find($id);
        return view('stores.edit')->with('store',$store);
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
        $this->validate($request,[
            'naziv'=>'required'
            ]);
            //
            $store=Store::find($id);
            $store->naziv = $request->input('naziv');
            $store->save();
            return redirect('/stores')->with('success','Store updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $store=Store::find($id);
       $store->delete();
       return redirect('/stores')->with('success','Store deleted');
    }
}
