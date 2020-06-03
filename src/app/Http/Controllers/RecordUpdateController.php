<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordUpdateRequest;
use App\Http\Resources\RecordResource;
use App\Models\Record;

class RecordUpdateController extends Controller
{

    public function __invoke(Record $record, RecordUpdateRequest $request)
    {
        $record = $this->recordRepository->update($record, $request->validated());

        return new RecordResource($record);
    }
}
