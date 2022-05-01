<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\JobSwagger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SwaggerAPIController extends Controller
{
    public function getConsumeAPI()
    {
        $data = [];

        $job_id  = JobSwagger::pluck('id')[0];
        $next_id = JobSwagger::pluck('next_id')[0];

        $response = Http::get('https://api.spaceflightnewsapi.net/v3/articles?_limit=1000&_sort=id&_start='.$next_id);

        if (count($response->json()) > 0)
        {
            foreach ($response->json() as $articles)
            {
                $articles['publishedAt'] = \Carbon\Carbon::parse($articles['publishedAt'])->format('Y-m-d H:i:s');  
                $articles['updatedAt']   = \Carbon\Carbon::parse($articles['updatedAt'])->format('Y-m-d H:i:s');
                $articles['id_api']  = $articles['id'];

                Article::create($articles);

                $next_id = $articles['id'];
            }

            $next_id++;

            if(JobSwagger::find($job_id)->where('active','1')->update(['next_id' => $next_id])) {
                $return = 'Importação Realizada com sucesso!';
            }
            else{
                $return = 'Importação Não Realizada!';
            }

            return response()->json(['return' => $return], 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
        }
    }
}