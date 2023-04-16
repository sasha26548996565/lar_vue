<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Response;
use App\Http\Requests\PersonRequest;
use App\Http\Resources\PersonResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonController extends Controller
{
    public function index(): JsonResource
    {
        return PersonResource::collection(Person::all());
    }

    public function show(Person $person): PersonResource
    {
        return new PersonResource($person);
    }

    public function store(PersonRequest $request): Response
    {
        Person::create($request->validated());
        return response([]);
    }

    public function update(PersonRequest $request, Person $person): Response
    {
        $person->update($request->validated());
        return response([]);
    }

    public function destroy(Person $person): Response
    {
        $person->delete();
        return response([]);
    }
}
