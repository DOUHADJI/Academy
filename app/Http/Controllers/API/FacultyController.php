<?php

namespace App\Http\Controllers\API;

use App\Models\Faculty;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Helpers\ApiResponsesHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\FacultyRequest;
use App\Http\Resources\FacultyResource;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::all();

        return new JsonResponse([
            "faculties" => FacultyResource::collection($faculties)
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FacultyRequest $request)
    {

        $isNameAlreadyTaken = Faculty::where("name", $request->name)->orWhere("tag", $request->tag)->exists();

        if ($isNameAlreadyTaken) {
            return new JsonResponse([
                "message" => ApiResponsesHelper::conflictMessage("Faculté/Ecole " . $request->name)
            ], Response::HTTP_ACCEPTED);
        }

        $data = $request->validated();

        $model = new Faculty();
        $model->name = Str::upper($data["name"]);
        $model->tag = $data["tag"];
        $model->slug = Str::slug($data["name"]);
        $model->director_id = $data["director_id"];
        $model->save();

        return new JsonResponse([
            "message" => ApiResponsesHelper::successCreationMessage("Faculté/Ecole " . $model->name)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $name)
    {
        $queryTerms = "%" . $name . "%";
        $models = Faculty::where("name", "like", $queryTerms)->get();

        if (count($models) > 0) {
            return new JsonResponse([
                "faculties" => FacultyResource::collection($models),
                "message" => ApiResponsesHelper::successRetrieveMessage("Faculté/Ecole")
            ], Response::HTTP_OK);
        }

        return new JsonResponse([
            "message" => ApiResponsesHelper::notFoundMessage("Faculté/Ecole")
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FacultyRequest $request, string $id)
    {
        $isNameAlreadyTaken = Faculty::where("name", $request->name)->where("id", "!=", $id)->exists();

        if ($isNameAlreadyTaken) {
            return new JsonResponse([
                "message" => ApiResponsesHelper::conflictMessage("Faculté/Ecole " . $request->name)
            ], Response::HTTP_ACCEPTED);
        }

        $model = Faculty::find($id);

        if ($model) {
            $data = $request->validated();

            $model->name = Str::upper($data["name"]);
            $model->tag = $data["tag"];
            $model->slug = Str::slug($data["name"]);
            $model->director_id = $data["director_id"];
            $model->save();

            return new JsonResponse([
                "message" => ApiResponsesHelper::successUpdateMessage("Faculté/Ecole " . $model->name)
            ], Response::HTTP_OK);
        }

        return new JsonResponse([
            "message" => ApiResponsesHelper::notFoundMessage("Faculté/Ecole")
        ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Faculty::find($id);

        if ($model) {
            $modelName = $model->name;
            $model->delete();

            return new JsonResponse([
                "message" => ApiResponsesHelper::successDeleteMessage("Faculté/Ecole " . $modelName)
            ], Response::HTTP_OK);
        }

        return new JsonResponse([
            "message" => ApiResponsesHelper::notFoundMessage("Faculté/Ecole")
        ], Response::HTTP_NOT_FOUND);
    }
}
