<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AniversarioResource extends JsonResource
{
    private function setUser($request)
    {
        $this->user = $request->user();
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->setUser($request);

        return [
            'user' => $this->user,
        ];
    }
}
