<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPersonRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class DeletePersonController extends Controller
{
    public function __invoke($id)
    {
        $person = Person::findOrFail($id);
        $person->delete();
        return response([]);
    }
}
