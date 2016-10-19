<?php

namespace dbf\Http\Controllers;

use Illuminate\Http\Request;

use dbf\Http\Requests;

class LoremController extends Controller
{
    public function create() {
    	return view('lorem.create');
    }
}
