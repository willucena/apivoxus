<?php

namespace App\Http\Controllers;

use App\Http\Services\CreateUserLocation;
use App\Http\Services\ShowUserLocationService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    private $getUserLocationService;
    private $createUserLocation;

    public function __construct(
        ShowUserLocationService $getUserLocationService,
        CreateUserLocation $createUserLocation)
    {
        $this->getUserLocationService = $getUserLocationService;
        $this->createUserLocation = $createUserLocation;
    }

    public function show($userId)
    {
        $user = $this->getUserLocationService->execute($userId);
        return response()->json($user)->setStatusCode($user['statusCode']);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $response = $this->createUserLocation->execute($data);

        return response()->json([
            'data'=> $response['message']
            ])->setStatusCode($response['statusCode']);
    }
}
