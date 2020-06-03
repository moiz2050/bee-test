<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordCreateRequest;
use App\Http\Resources\RecordResource;
use App\Repositories\RecordRepository;
use Illuminate\Http\Request;

class RecordCreateController extends Controller
{
    public RecordRepository $recordRepository;

    public function __construct(RecordRepository $recordRepository)
    {
        $this->recordRepository = $recordRepository;
    }

    public function __invoke(RecordCreateRequest $request)
    {
         $record = $this->recordRepository->create($request->validated());

         return new RecordResource($record);
    }
}
