<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function auditTableInsert()
    {
        return [
            "created_by"    => Auth::user()->username,
            "updated_by"    => Auth::user()->username,
            "created_at"    => now(),
            "updated_at"    => now()
        ];
    }

    public function auditTableUpdate()
    {
        return [
            "updated_by"    => Auth::user()->username,
            "updated_at"    => now()
        ];
    }
}
