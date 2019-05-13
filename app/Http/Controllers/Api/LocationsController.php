<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Location;
use App\Models\LocationRecord;
use Illuminate\Http\Request;
use App\Http\Requests\Api\LocationRequest;
use App\Transformers\LocationTransformer;

class LocationsController extends Controller
{
    /** [更新用户最后位置] */
    public function update(LocationRequest $request)
    {
        $location = $this->user->location;
        if($location){
            $location->coordinate = $request->coordinate;
            $location->updated_at = date('Y-m-d H:i:s',time());
            $location->save();
        }else{
            $location = Location::firstOrCreate ([
                'user_id' => $this->user->id,
                'coordinate' => $request->coordinate,
            ]);

        }
    
        LocationRecord::create([
            'user_id' => $this->user->id,
            'coordinate' => $request->coordinate,
        ]);

        return $this->response->item($location, new LocationTransformer());

    }
}
