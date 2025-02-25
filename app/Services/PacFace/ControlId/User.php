<?php

namespace App\Services;

use CURLFile;
use Illuminate\Support\Facades\Http;

class User
{

/**
     * Register a new user in Control iD.
     */
    public function registerUser($data)
    {

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("{$data->baseUrl}/create_objects.fcgi?session=".$data->token, [
            'object' => 'users',
            'values' => [
                [
                    'name' => $data->name,
                    'registration' => (string)$data->userId,
                ],
            ],
        ]);

        if (!$response->successful()) {
            throw new \Exception('User registration failed: ' . $response->body());
        }

        return $response->json();
    }
}