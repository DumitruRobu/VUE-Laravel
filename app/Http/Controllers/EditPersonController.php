<?php

namespace App\Http\Controllers;

use App\Http\Resources\Person\PersonResource;
use App\Models\Person;
use Illuminate\Http\Request;

class EditPersonController extends Controller
{
    public function __invoke($id)
    {
        $person = Person::findOrFail($id);
        return new PersonResource($person);
    }
}
