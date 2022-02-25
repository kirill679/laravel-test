<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MenuCollection extends ResourceCollection
{
    public static $wrap = null;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function toArray($request)
    {
        return MenuResource::collection($this->collection);
    }
}
