<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordSearchRequest;
use App\Http\Resources\RecordsResource;
use Illuminate\Http\Request;

class RecordSearchController extends Controller
{
    public function __invoke(RecordSearchRequest $request)
    {
        $records = $this->recordRepository->search($request->keyword);

        return new RecordsResource($records);
    }
}
