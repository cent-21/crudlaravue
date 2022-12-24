<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function clients() {
        return CommonResource::collection(User::where("role", "CUSTOMER")->get());
    }

    public function installators() {
        return CommonResource::collection(User::where("role", "INSTALLATOR")->get());
    }
}
