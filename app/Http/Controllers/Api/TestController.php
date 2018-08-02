<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return $this->response->array(['message'=>'测试']);
    }
    
}
