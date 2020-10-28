<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleCategory;
class ArticleCategoryController extends Controller
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
        $ArticleCategories=ArticleCategory::orderBy('id','asc')->simplePaginate(2);
        return view('ArticleCategories.index')->with('ArticleCategories',$ArticleCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ArticleCategories.create');
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
            $ArticleCategory=new ArticleCategory;
            $ArticleCategory->naziv = $request->input('naziv');
            $ArticleCategory->save();
            return redirect('/articlecategories')->with('success','Article category created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ArticleCategory=ArticleCategory::find($id);
        return view('articlecategories.show')->with('ArticleCategory',$ArticleCategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ArticleCategory=ArticleCategory::find($id);
        return view('articlecategories.edit')->with('ArticleCategory',$ArticleCategory);
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
            $ArticleCategory=ArticleCategory::find($id);
            $ArticleCategory->naziv = $request->input('naziv');
            $ArticleCategory->save();
            return redirect('/articlecategories')->with('success','Article category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ArticleCategory=ArticleCategory::find($id);
        $ArticleCategory->delete();
        return redirect('/articlecategories')->with('success','Article category deleted');
    }
}
