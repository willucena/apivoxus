<?php


namespace App\Http\Services;

use App\Models\Location;
use App\Models\User;
USE Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ShowUserLocationService
{
    protected $entity;


    public function __construct(Location $entity)
    {
        $this->entity = $entity;
    }

    public function execute($userId)
    {
        try{
           $user =  User::find($userId);

           $response =[
               'statusCode' => Response::HTTP_OK,
               'location' => $user->location()->get()
           ];
        }catch (\Exception $e){
            $response =  [
                'code' => Response::HTTP_NOT_FOUND,
                'message' => $e->getMessage()
            ];
        }

        return $response;
    }

}
