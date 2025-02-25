<?php

namespace App\Services\PacFace\ControlId;

use Illuminate\Support\Facades\Http;

class Login
{
    /**
     * Login to Control iD and obtain the session token.
     */
    public function login($ip)
    {
        $response = Http::post("http://{$ip}/login.fcgi", [
            'login' => 'admin',
            'password' => 'admin'
        ]);

        if ($response->successful()) {
            return $response->json('session');
        } else {
            throw new \Exception('Login failed: ' . $response->body());
        }
    }
}
