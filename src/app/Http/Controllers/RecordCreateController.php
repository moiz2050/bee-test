<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordCreateRequest;
use App\Http\Resources\RecordResource;
use OpenApi\Annotations as OA;

class RecordCreateController extends Controller
{
    /**
     * @OA\POST(
     *      path="/records/create",
     *      operationId="createRecord",
     *      tags={"Records"},
     *      summary="Create Record",
     *      description="Create and Return newly created record",
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
     * @param RecordCreateRequest $request
     *
     * @return RecordResource
     */

    public function __invoke(RecordCreateRequest $request)
    {
         $record = $this->recordRepository->create($request->validated());

         return new RecordResource($record);
    }
}
