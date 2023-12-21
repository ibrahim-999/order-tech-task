<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponseTrait;
use Laravel\Lumen\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    use ApiResponseTrait;
}
