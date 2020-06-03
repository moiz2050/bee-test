<?php

namespace App\Http\Controllers;

use App\Repositories\Repository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Record Store Documentation",
     *      description="Record Store api Documentation",
     *      @OA\Contact(
     *          email="moizsattar@gmail.com"
     *      )
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Demo API Server"
     * )

     *
     * @OA\Tag(
     *     name="Records",
     *     description="API Endpoints of Records"
     * )
     */

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public Repository $recordRepository;

    public function __construct(Repository $recordRepository)
    {
        $this->recordRepository = $recordRepository;
    }
}
