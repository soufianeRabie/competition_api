<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
           'email'=>$this->email,
            'created_at' => date_format(date_create($this->created_at),'d-m-Y H:i'),
            'updated_at' => date_format(date_create($this->updated_at),'d-m-Y H:i')
        ];
    }

    public static function collection($resource)
    {
        $values = parent::collection($resource)->additional([
            'total' => $resource->count()
        ]);
        return $values;
    }
}
