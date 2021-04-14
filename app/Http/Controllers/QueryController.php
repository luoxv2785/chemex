<?php

namespace App\Http\Controllers;

class QueryController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }


}
