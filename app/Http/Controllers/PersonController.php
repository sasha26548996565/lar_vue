<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Response;
use App\Http\Requests\PersonRequest;
use Illuminate\Database\Eloquent\Collection;

class PersonController extends Controller
{
    public function index(): Collection
    {
        return Person::all();
    }

    public function show(Person $person): Person
    {
        return $person;
    }

    public function store(PersonRequest $request): Person
    {
        $person = Person::create($request->validated());
        return $person;
    }

    public function update(PersonRequest $request, Person $person): Person
    {
        $person->update($request->validated());
        return $person;
    }

    public function destroy(Person $person): Response
    {
        $person->delete();
        return response([]);
    }
}
