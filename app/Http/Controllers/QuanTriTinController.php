<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
class QuanTriTinController extends Controller implements HasMiddleware
{
    public static function middleware():  array{
        return ['auth'];

    }
    function index(){
        echo "<h1>Danh sách tin</h1>";
    }
}
