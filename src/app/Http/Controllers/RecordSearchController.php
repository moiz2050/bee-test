<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordSearchRequest;
use App\Http\Resources\RecordsResource;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class RecordSearchController extends Controller
{
    /**
     * @OA\GET(
     *      path="/records/search",
     *      operationId="searchRecord",
     *      tags={"Records"},
     *      summary="Search Record",
     *      description="Search record for given keyword/s",
     *     @OA\Parameter(
     *          name="keyword",
     *          description="Keyword to search",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(type="object",
     *                  @OA\Property(type="string", property="status", example="success"),
     *                  @OA\Property(type="object", property="data",
     *                      @OA\Property(type="array", property="records", @OA\Items(ref="#/components/schemas/Record"))
     *                  )
     *          )
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Failed Validation",
     *          @OA\JsonContent(type="object",
     *              @OA\Property(type="string", property="status", example="fail"),
     *              @OA\Property(type="object", property="data",
     *                  @OA\Property(type="array", property="keyword",
     *                      @OA\Items(example="The keyword field is required")
     *                  )
     *              )
     *          )
     *      )
     *   )
     *
     *
     * @param RecordSearchRequest $request
     *
     * @return RecordsResource
     */
    public function __invoke(RecordSearchRequest $request)
    {
        $records = $this->recordRepository->search($request->keyword);

        return new RecordsResource($records);
    }
}
