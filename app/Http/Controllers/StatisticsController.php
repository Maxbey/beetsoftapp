<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StatisticsController extends Controller
{
    public function index()
    {
        $user = \JWTAuth::parseToken()->authenticate();

        return ['data' => $user->files];
    }
}
