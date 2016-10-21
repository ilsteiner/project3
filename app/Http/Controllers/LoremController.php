<?php

namespace dbf\Http\Controllers;

use Illuminate\Http\Request;

use dbf\Http\Requests;

use Badcow\LoremIpsum;

class LoremController extends Controller
{
    public function create() {
    	return view('lorem.create');
    }

    public function store(Request $request) {
    	# Validation
    	$this->validate($request,
    		['count' => "required|numeric|min:1|max:50",
    		'loremType' => "required|in:sentences,paragraphs",]
    		);

    	$loremType = $request->input('loremType');
    	$count = $request->input('count');

    	$loremGen = new \Badcow\LoremIpsum\Generator();
    	$lorem = "";

    	if($loremType == "sentences") {
    		$lorem = $loremGen->getSentences($count);
    	}
    	if($loremType == "paragraphs") {
    		$lorem = $loremGen->getParagraphs($count);
    	}

    	return view('lorem.create')->with('lorem', $lorem);
    }
}
