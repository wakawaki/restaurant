<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class TablesController extends Controller
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
      //  $store_id= auth()->user()->store_id;
       
        //$tables=Table::orderBy('id','asc')->simplePaginate(2);
        $tables= DB::table('tables')->simplePaginate(2);
        return view('tables.index')->with('tables',$tables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::pluck('naziv', 'id');
        
        return view('tables.create')->with('stores',$stores);

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
            'naziv'=>'required',
            'store_id'=>'required'
            ]);
            //
            $table=new Table;
            $table->naziv = $request->input('naziv');
            $table->store_id = $request->input('store_id');
            $table->save();
            return redirect('/tables')->with('success','Table created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table=Table::find($id);
        return view('tables.show')->with('table',$table);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table=Table::find($id);
        $stores = Store::pluck('naziv', 'id');
        return view('tables.edit')->with('table',$table)->with('stores',$stores);
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
        $table=Table::find($id);
        $table->naziv = $request->input('naziv');
        $table->save();
        return redirect('/tables')->with('success','Table updated');
    }
    public function list()
    {
        $store_id= auth()->user()->store_id;
      
        //$tables=Table::orderBy('id','asc')->simplePaginate(2);
        $tables= DB::table('tables')->where('store_id', $store_id)->simplePaginate(2);
        return view('tables.list')->with('tables',$tables);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table=Table::find($id);
        $table->delete();
        return redirect('/tables')->with('success','Table deleted');
    }

}
