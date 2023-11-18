<?php

namespace App\Http\Controllers;

use App\Http\Resources\Person\PersonResource;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetPersonController extends Controller
{
    public function __invoke($id)
    {
        return new PersonResource(Person::findOrFail($id));
    }
}
