<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\UserModuleController;
use App\Models\Module;

class ApiUserModuleController extends UserModuleController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Module $module)
    {
        return response()->json([
            'code' => 200,
            'users' => $module->apiUsers()
        ]);
    }
}