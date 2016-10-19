<?php

namespace dbf\Http\Controllers;

use Illuminate\Http\Request;

use dbf\Http\Requests;

class IndexController extends Controller
{
    public function __invoke() {
    	return view('index');
    }
}
