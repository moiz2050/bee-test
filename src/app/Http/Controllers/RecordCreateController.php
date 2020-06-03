<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordCreateRequest;
use App\Http\Resources\RecordResource;

class RecordCreateController extends Controller
{
    public function __invoke(RecordCreateRequest $request)
    {
         $record = $this->recordRepository->create($request->validated());

         return new RecordResource($record);
    }
}
