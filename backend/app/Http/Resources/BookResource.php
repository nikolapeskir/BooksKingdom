<?php

namespace App\Http\Resources;

use App\Models\BookAuthor;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'owner' => $this->user_id === auth()->user()->id,
            'author_name' => $this->author?->name
        ];
    }
}
