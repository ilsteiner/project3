<?php

namespace dbf\Http\Controllers;

use Illuminate\Http\Request;

use dbf\Http\Requests;

use VJoao\LetterAvatar\LetterAvatar;

class UserController extends Controller
{
	public function create() {
    	return view('user.create');
    }

    public function store(Request $request) {
    	# Validation
    	$this->validate($request,
    		['count' => "required|numeric|min:1|max:500",
    		'userType' => "required|in:human,animal,video",
    		'sex' => "required|in:male,female,both",]
    		);

    	$count = $request->input('count');
    	$userType = $request->input('userType');
    	$sex = $request->input('sex');
    	$options[] = $request->input('options[]');

    	$users = [];

    	for($i = 0; $i < $count; $i++) {
    		$name = getName($userType,$sex);
    		$birthday = (isset($options["birthday"]) ? getBirthday() : NULL);
    		$age = ($birthday ? getAge($birthday) : NULL);
    		$users = 
    		[
    		"name" => $name,
    		"sex" => $sex,
    		"agent" => (isset($options["agent"]) ? getAgent() : NULL),
    		"avatar" => (isset($options["avatar"]) ? getAvatar($name) : NULL),
    		"birthday" => $birthday,
    		"age" => $age,
    		"username" => (isset($options["username"]) ? getUsername($name) : NULL),
    		"password" => (isset($options["password"]) ? getPassword() : NULL)
    		];
    	}

    	return view('user.store')->with('users', $count);
    }

    private function getName($userType,$sex='both') {
    	switch ($userType) {
    		case 'human':
    			return humanName($sex);
    		case 'animal':
    			return animalName();
    		case 'video':
    			return videoGameName();
    		default:
    			return humanName($sex);
    	}
    }

    private function humanName($sex) {
    	$fileDir = "/resources/names/";
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

    	return $firstName . " " . $lastName;
    }

    private function animalName() {
    	$generator = \nubs\RandomNameGenerator\Alliteration();
    	return $generator->getName();
    }

    private function videoGameName() {
    	$generator = \nubs\RandomNameGenerator\Vgng();
    	return $generator->getName();
    }

    private function getAgent() {
    	return \Campo\UserAgent::random();
    }

    private function getAvatar($name) {
    	return new LetterAvatar($name);
    }

    private function getBirthday() {
    	$randGen = new Rych\Random\Random();
    	//Random UNIX timestamp between 1916 and 2003
    	$unixStamp = $randGen->getRandomInteger(-1704153600,1072828800);
    	return date("m/d/Y",$unixStamp);
    }

    private function getAge($birthday) {
    	$birthdayDate = strtotime($birthday);
    	$ageStamp = time() - $birthdayDate;
    	return date("m/d/Y",$ageStamp);
    }

    private function getUsername($name) {

    }

    private function getPassword() {

    }
}
