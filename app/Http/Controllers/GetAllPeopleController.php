<?php

namespace App\Http\Controllers;

use App\Http\Resources\Person\PersonResource;
use App\Models\Person;
use Illuminate\Http\Request;

class GetAllPeopleController extends Controller
{
    public function __invoke()
    {
        $people = Person::all();
        //return $people;
        return PersonResource::collection($people);
    }
}
