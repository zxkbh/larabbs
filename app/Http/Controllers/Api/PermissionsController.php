<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Transformers\PermissionTransformer;

class PermissionsController extends Controller
{
    public function index()
    {
       $permissions = $this->user()->getAllPermissions();

       return $this->response->collection($permissions, new PermissionTransformer());
    }
}
