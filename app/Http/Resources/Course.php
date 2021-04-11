<?php

namespace App\Http\Resources;

use App\Defines\Level;
use App\Defines\Status;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed slug
 * @property mixed description
 * @property mixed level
 * @property mixed status
 * @property mixed price
 * @property mixed created_at
 * @property mixed updated_at
 * @property mixed tag
 * @property mixed media
 */
class Course extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'level' => Level::getLists()[$this->level],
            'status' => Status::getLists()[$this->status],
            'price' => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'tag' => [
                'name' => $this->tag->name,
                'category' => [
                    'name' => $this->tag->category->name,
                ]
            ],
            'media' => [
                'source' => convertStorage($this->media->source),
            ],

        ];
    }
}
