<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecordResource;
use App\Models\Record;

class RecordDeleteController extends Controller
{
    public function __invoke(Record $record)
    {
        $record = $this->recordRepository->delete($record);

        return new RecordResource($record);
    }
}
