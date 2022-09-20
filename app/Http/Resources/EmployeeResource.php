<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'first_name'=>$this->firstname,
            'last_name'=>$this->last_name,
            'company'=>$this->company,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'age'=>$this->age,
            'salary'=>$this->salary,
        ];
    }
}
