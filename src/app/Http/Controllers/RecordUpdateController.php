<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordUpdateRequest;
use App\Http\Resources\RecordResource;
use App\Models\Record;
use App\Repositories\RecordRepository;
use Illuminate\Http\Request;

class RecordUpdateController extends Controller
{
    public RecordRepository $recordRepository;

    public function __construct(RecordRepository $recordRepository)
    {
        $this->recordRepository = $recordRepository;
    }

    public function __invoke(Record $record, RecordUpdateRequest $request)
    {
        $record = $this->recordRepository->update($record, $request->validated());

        return new RecordResource($record);
    }
}
