<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPersonRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class AddPersonController extends Controller
{
    public function __invoke(AddPersonRequest $request)
    {
        $data = $request->validated();
        Person::create($data);
        return response([]);
    }
}
