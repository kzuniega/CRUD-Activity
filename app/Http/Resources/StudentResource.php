<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
          'student_id' => $this->student_id,
          'first_name' => $this->first_name,
          'middle_name' => $this->middle_name,
          'last_name' => $this->last_name,
          'email' => $this->email,
          'address' => $this->address,
          'gender' => $this->gender,
          'birthdate' => $this->birthdate,
          'created_at' => $this->created_at,
        ];
    }
}
