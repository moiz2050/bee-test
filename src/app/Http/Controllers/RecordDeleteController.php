<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecordResource;
use App\Models\Record;
use OpenApi\Annotations as OA;

class RecordDeleteController extends Controller
{
    /**
     * @OA\DELETE(
     *      path="/records/{id}",
     *      operationId="deleteRecord",
     *      tags={"Records"},
     *      summary="Delete Record",
     *      description="Delete and Return newly deleted record",
     *     @OA\Parameter(
     *          name="Id",
     *          description="ID of Record",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Model Not found",
     *          @OA\JsonContent(type="object",
     *                  @OA\Property(type="string", property="status", example="error"),
     *                  @OA\Property(type="string", property="message", example="No Record found"),
     *                  @OA\Property(type="integer", property="code", example="404")
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(type="object",
     *                  @OA\Property(type="string", property="status", example="success"),
     *                  @OA\Property(type="string", property="data", example="null")
     *          )
     *       )
     *  )
     *
     * @param Record $record
     *
     * @return RecordResource
     */
    public function __invoke(Record $record)
    {
        $record = $this->recordRepository->delete($record);

        return new RecordResource($record);
    }
}
