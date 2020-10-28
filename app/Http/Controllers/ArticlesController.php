<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\DB;
class ArticlesController extends Controller
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
        //$store_id= auth()->user()->store_id;
       
        //$tables=Table::orderBy('id','asc')->simplePaginate(2);
        $articles= DB::table('articles')->simplePaginate(2);
        return view('articles.index')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ArticleCategories = ArticleCategory::pluck('naziv', 'id');
        
        return view('articles.create')->with('ArticleCategories',$ArticleCategories);
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
            'category_id'=>'required'
            ]);

if ($request->hasFile('slika')){
    $filenameWithExt=$request->file('slika')->getClientOriginalName();  
    $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
    $extension=$request->file('slika')->getClientOriginalExtension();
    $fileNameToStore=$filename.'_'.time().'.'.$extension;
    $path=$request->file('slika')->storeAs('public/slike',$fileNameToStore);  
} else {

    $fileNameToStore='noimage.jpg';
}

            //
            $article=new Article;
            $article->naziv = $request->input('naziv');
            $article->category_id = $request->input('category_id');
            $article->cena = $request->input('cena');
            $article->slika=$fileNameToStore;
            $article->save();
            return redirect('/articles')->with('success','Article created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article=Article::find($id);
        return view('articles.show')->with('article',$article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::find($id);
        $ArticleCategory = ArticleCategory::pluck('naziv', 'id');
        return view('articles.edit')->with('article',$article)->with('ArticleCategory',$ArticleCategory);
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
            $article=Article::find($id);
            $article->naziv = $request->input('naziv');
            $article->category_id = $request->input('category_id');
            $article->cena = $request->input('cena');
            $article->slika = '';
            $article->save();
            return redirect('/articles')->with('success','Article updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=Article::find($id);
        $article->delete();
        return redirect('/articles')->with('success','Article deleted');
    }
}
