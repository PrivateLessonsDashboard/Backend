<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA/OpenApi(
 * @OA\Info (
 *     version="1.0",
 *     title="Private Lessons Dashboard",
 *     description="Private Lessons Dashboard Api"
 * )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
