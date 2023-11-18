<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePersonRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class UpdatePersonController extends Controller
{
    public function __invoke(UpdatePersonRequest $request, $id)
    {
        $data = $request->validated();
        $person = Person::findOrFail($id);
        $person->update($data);
        return response([]);
    }
}
