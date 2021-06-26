<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 */
class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'commentable_id' => $this->commentable_id,
            'user' => [
                'id' => $this->user->id,
                'fullname' => $this->user->profile->fullname,
                'avatar' => $this->user->profile->media->source
            ]
        ];
    }
}
