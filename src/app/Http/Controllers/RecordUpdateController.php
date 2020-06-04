<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordUpdateRequest;
use App\Http\Resources\RecordResource;
use App\Models\Record;
use OpenApi\Annotations as OA;

class RecordUpdateController extends Controller
{
    /**
     * @OA\PUT(
     *      path="/records/{id}",
     *      operationId="updateRecord",
     *      tags={"Records"},
     *      summary="Update Record",
     *      description="Update and Return updated record",
     *     @OA\Parameter(
     *          name="title",
     *          description="Title of Record",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="artist",
     *          description="Artist name of Record",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="genre",
     *          description="Genre of Record",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\RequestBody(
     *         description="Input data format",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="title",
     *                     description="title of the record",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="artist",
     *                     description="Artist of the record",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="genre",
     *                     description="Genre of the record",
     *                     type="string"
     *                 )
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(type="object",
     *                  @OA\Property(type="string", property="status", example="success"),
     *                  @OA\Property(type="object", property="data",
     *                      @OA\Property(type="object", property="record", ref="#/components/schemas/Record")
     *                  )
     *          )
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Failed Validation",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(type="string", property="status", example="fail"),
     *              @OA\Property(type="object", property="data",
     *                  @OA\Property(type="array", property="title",
     *                      @OA\Items(example="The title field is required")
     *                  )
     *              )
     *          )
     *      )
     *   )
     *
     * @param Record              $record
     * @param RecordUpdateRequest $request
     *
     * @return RecordResource
     */
    public function __invoke(Record $record, RecordUpdateRequest $request)
    {
        $record = $this->recordRepository->update($record, $request->validated());

        return new RecordResource($record);
    }
}
