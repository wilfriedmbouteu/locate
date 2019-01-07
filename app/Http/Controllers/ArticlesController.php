<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Resources\Articles as ArticlesResources;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $articles= Articles::paginate(5);

       return ArticlesResources::collection($articles);
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
        $article = $request->isMethod('put') ? Articles::findOrFail($request->article_id) : new Articles([
        'id' => $request('article_id'),
        'title' => $request('title'),
        'body' => $request('body')
        ]);
        if($article->save()) {
            return new ArticlesResources($article);
        }
    }

    
    public function show($id)
    {
        //

        $article = Articles::findOrFail($id);

        return new ArticlesResources($article);
    }

   
    public function destroy($id)
    {
        //
         $article = Articles::findOrFail($id);
        if($article->delete()) {
        

        return new ArticlesResources($article);
      }
    }

}
