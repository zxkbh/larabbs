<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller as BaseController;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Controller extends BaseController
{
    use Helpers;

    //本地化 添加另外的响应code
 	public function errorResponse($statusCode, $message=null, $code=0)
    {
        throw new HttpException($statusCode, $message, null, [], $code);
    }
    
}
