<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class GraphQLController extends Controller
{
    public function getUsers(string $username): View
    {
        $query = <<<GQL
                query {
                    user(login: "muminur"){
                        name
                        url
                        websiteUrl
                        repository(name: "css-effects"){
                                name
                                url
                                stargazerCount

                        }

                    }
                }



GQL;

        $resp= Http::withHeaders([
                    "Content-type"  => "application/json",
                    "Authorization"  => "Bearer " .env("GITHUB_TOKEN")
        ])->post('https://api.github.com/graphql',
            [
            "query"=>$query
            ]);




        $user= $resp->json()["data"]["user"];
        $repo= $user["repository"];
        return view('gql', compact('user','repo'));

    }
}
