<?php

namespace App\Services\PacFace\ControlId;

use CURLFile;
use Illuminate\Support\Facades\Http;

class RegisterUser
{
    /**
     * Register a new group in Control iD.
     */
    public function registerUser($ip, $data, $token){

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("{$ip}/create_objects.fcgi?session=".$token, [
            'object' => 'users',
            'values' => [
                [
                    'name' => $data->name,
                    'registration' => '',
                ],
            ],
        ]);

        if (!$response->successful()) {
            throw new \Exception('User registration failed: ' . $response->body());
        }

        return $response->json();
    }

    public function store($base_url, $token, $name){
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("http://{$base_url}/create_objects.fcgi?session=".$token, [
            'object' => 'groups',
            'fields' => ['name'],
            'values' => [
                [
                    'name' => $name
                ]
            ],
        ]);

        if (!$response->successful()) {
            throw new \Exception('Group registration failed: ' . $response->body());
        }

        return $response->json();
    }
}