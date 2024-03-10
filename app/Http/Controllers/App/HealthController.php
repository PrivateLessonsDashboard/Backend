<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    /**
     *  @OA\Get (
     *      path="/api/v1/health",
     *      tags={"Health"},
     *      summary="Health check",
     *      description="Check if API works",
     *     @OA\Response(
     *      response=200,
     *      description="{status: 'ok'}"
     *     )
     *  )
     */
    public function __invoke(Request $request): array
    {
        return ['status' => 'ok'];
    }
}
