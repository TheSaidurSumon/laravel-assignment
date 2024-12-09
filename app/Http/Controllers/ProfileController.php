<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProfileController extends Controller
{
    public function index($id)
    {
        // Declare variables
        $name = "Donald Trump";
        $age = "75";

        // Create associative array with the given data
        $data = [
            'id' => $id,
            'name' => $name,
            'age' => $age,
        ];

        // Create a cookie
        $cookieName = 'access_token';
        $cookieValue = '123-XYZ';
        $cookieMinutes = 1;
        $cookiePath = '/';
        $cookieDomain = ($_SERVER['SERVER_NAME'] === 'localhost') ? null : $_SERVER['SERVER_NAME'];

        $cookieSecure = false;
        $cookieHttpOnly = true;

        $cookie = cookie(
            $cookieName,
            $cookieValue,
            $cookieMinutes,
            $cookiePath,
            $cookieDomain,
            $cookieSecure,
            $cookieHttpOnly
        );

        // Return response with data, status code, and cookie
        return response($data, 200)->cookie($cookie);
    }
}
