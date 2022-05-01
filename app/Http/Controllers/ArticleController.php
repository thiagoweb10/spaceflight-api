<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\Article\RequestCreate;
use App\Http\Requests\Article\RequestUpdate;

class ArticleController extends Controller
{
    public $aHead = [
        'Content-Type' => 'application/json; charset=UTF-8',
        'charset' => 'utf-8'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Articles = Article::paginate(1000);

        return response()->json($Articles, 200, $this->aHead, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreate $request)
    {
        $data = $request->validated();
        
        if(Article::create($data)){
            return response()->json(["message" => "Registration successfully completed!"], 201);
        }
        else{
            return response()->json(["message" => "Error while registering!"], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Article::where('id', $id)->exists()){
            
            $article = Article::where('id', $id)->get()->toArray();
            
            return response()->json($article, 200, $this->aHead, JSON_UNESCAPED_UNICODE);
        }
        else {
            return response()->json(["message" => "Register not found!"], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  app\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(RequestUpdate $request, Article  $article)
    {
        $data = $request->validated();
        
        if ($article->update($data)) {
            return response()->json(["message" => "Change made successfully!"], 201);
        }
        else {
            return response()->json(["message" => "Change not made!"], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($articleID)
    {
        if (Article::destroy($articleID)) {
            return response()->json(["message" =>"Record deleted successfully!"], 200);
        }
        else {
            return response()->json(["message" =>"Record not deleted!"], 404);
        }
    }
}
