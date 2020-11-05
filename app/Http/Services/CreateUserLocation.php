<?php


namespace App\Http\Services;


use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Response;

class CreateUserLocation
{
    protected $model;

    public function __construct(Location $model)
    {
        $this->model = $model;
    }

    public function execute($data)
    {

        try{
            $user = User::find($data['user_id']);

            if(!$user){
                throw new \InvalidArgumentException('User does not exist', 400);
            }

            $location = new Location();
            $location->latitude = $data['latitude'];
            $location->longitude = $data['longitude'];
            $location->save();

            $user->location_id = $location->id;
            $user->save();

            $response = ['message' => 'Successful registration', 'statusCode' => Response::HTTP_OK];
        }catch(\InvalidArgumentException $argumentInvalid){
            $response = [
                'statusCode' =>  $argumentInvalid->getCode(),
                'message' => $argumentInvalid->getMessage()
            ];
        }catch (\Exception $exception){
            $response = [
                'statusCode' =>  Response::HTTP_NOT_FOUND,
                'message' => $exception->getMessage()
            ];
        }

        return $response;
    }
}
