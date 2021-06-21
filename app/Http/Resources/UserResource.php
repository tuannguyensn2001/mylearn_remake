<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed courses
 * @property mixed username
 * @property mixed email
 * @method courses()
 */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email ' => $this->email,
            'courses' => CourseResource::collection($this->courses),
            'profile' => $this->profile->load('media')
        ];
    }
}
