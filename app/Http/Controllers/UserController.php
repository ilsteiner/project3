<?php

namespace dbf\Http\Controllers;

use Illuminate\Http\Request;

use dbf\Http\Requests;

use VJoao\LetterAvatar\LetterAvatar;

use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

use Rych\Random;

class UserController extends Controller
{
	public function create() {
    	return view('user.create');
    }

    public function store(Request $request) {
    	# Validation
    	$this->validate($request,
    		['count' => "required|numeric|min:1|max:500",
    		'sex' => "required|in:male,female,both",]
    		);

    	$count = $request->input('count');
    	$sex = $request->input('sex');
    	$optionsField = $request->input('options');
    	$options = [];
    	foreach ($optionsField as $option => $optionValue) {
    		$options[$optionValue] = true;
    	}
    	// $options[] = $request->get('options');

    	$users = [];

    	for($i = 0; $i < $count; $i++) {
    		$name = $this->getName($sex);
    		$birthday = (isset($options["birthday"]) ? $this->getBirthday() : NULL);
    		$age = (isset($options["age"]) ? $this->getAge($birthday) : NULL);

    		$users[$name] =
    		[
    		"name" => $name,
    		"agent" => (isset($options["agent"]) ? $this->getAgent() : NULL),
    		"avatar" => (isset($options["avatar"]) ? $this->getAvatar($name) : NULL),
    		"birthday" => $birthday,
    		"age" => $age,
    		"username" => (isset($options["username"]) ? $this->getUsername($name) : NULL),
    		"password" => (isset($options["password"]) ? $this->getPassword() : NULL)
    		];
    	}

    	return view('user.store')->with('users', $users);
    }

    private function getName($sex='both') {
    	$fileDir = "../resources/names/";
    	$firstNames;
    	switch ($sex) {
    		case 'male':
    			$firstNames = file($fileDir . "maleNames.txt");
    			break;
    		case 'female':
    			$firstNames = file($fileDir . "femaleNames.txt");
    			break;
    		case 'both':
    			$firstNames = array_merge(
    				file($fileDir . "maleNames.txt"),
    				file($fileDir . "femaleNames.txt")
    				);
    			break;
    		default:
    			$firstNames = array_merge(
    				file($fileDir . "maleNames.txt"),
    				file($fileDir . "femaleNames.txt")
    				);
    			break;
    	}

    	//Get random name from the selected array
    	$firstName = $firstNames[array_rand($firstNames)];

    	//Get a random last name
    	$lastNames = file($fileDir . "lastNames.txt");
    	$lastName = $lastNames[array_rand($lastNames)];

    	return str_replace(array("\n\r", "\n", "\r"), "", $firstName . " " . $lastName);   	
    }

    private function getAgent() {
    	return \Campo\UserAgent::random();
    }

    private function getAvatar($name) {
    	return new LetterAvatar($name);
    }

    private function getBirthday() {
    	//Random UNIX timestamp between 1916 and 2003
    	$unixStamp = rand(-1704153600,1072828800);
    	return date("m/d/Y",$unixStamp);
    }

    private function getAge($birthday) {
    	$birthdayDate = date_create((is_null($birthday) ? $this->getBirthday() : $birthday));
    	return date_diff($birthdayDate, date_create('today'))->y;
    }

    private function getUsername($name) {
    	return strtolower(substr($name,0,3) . substr($name,-1,4));
    }

    private function getPassword() {
    	$passGen = new ComputerPasswordGenerator();

		$passGen
		  ->setOptionValue(ComputerPasswordGenerator::OPTION_UPPER_CASE, true)
		  ->setOptionValue(ComputerPasswordGenerator::OPTION_LOWER_CASE, true)
		  ->setOptionValue(ComputerPasswordGenerator::OPTION_NUMBERS, true)
		  ->setOptionValue(ComputerPasswordGenerator::OPTION_SYMBOLS, true)
		;

		return $passGen->generatePassword();
    }
}
