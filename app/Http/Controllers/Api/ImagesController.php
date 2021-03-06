<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;
use App\Transformers\ImageTransformer;
use App\Http\Requests\Api\ImageRequest;

class ImagesController extends Controller
{
    public function store(ImageRequest $request, ImageUploadHandler $uploader, Image $image)
   	{
   		$user = $this->user();
   		$size = $request->type == 'avatar' ? 362 : 1024;
         // 上传图片
         if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $request->image, $res)) {
            $result = $uploader->saveBase64($request->image, str_plural($request->type), $user->id, $size);
         } else {
            $result = $uploader->save($request->image, str_plural($request->type), $user->id, $size);
         }

   		$image->path = $result['path'];
         $image->type = $request->type;
         $image->user_id = $user->id;
         $image->save();

         if ($request->platform == 1) {
            return $this->response->array([
               'errno' => 0,
               'data'=>[
                  $image->path
               ]
            ])->setStatusCode(201);
         } else {
            return $this->response->array([
               'errno' => 0,
               'data'=>[
                  'id' => $image->id,
                  'path' => $image->path
               ]
            ])->setStatusCode(201);
         }
   	}
}
