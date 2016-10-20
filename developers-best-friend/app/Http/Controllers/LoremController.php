<?php

namespace dbf\Http\Controllers;

use Illuminate\Http\Request;

use dbf\Http\Requests;

class LoremController extends Controller
{
    public function create() {
    	return view('lorem.create');
    }

    public function store(Request $request) {
    	# Validation
    	$this->validate($request,
    		['count' => "required|numeric|min:1|max:50",
    		'loremType' => "required|in:list,paragraphs",]
    		);

    	$loremType = $request->input('loremType');
    	$count = $request->input('count');

    	$lorem = "";

    	if($loremType == "paragraphs") {
    		Lipsum::medium($count);
    	}
    	if($loremType == "list") {
    		Lipsum::ul()->medium($count);
    	}

    	return view('lorem.store');
    }
}
