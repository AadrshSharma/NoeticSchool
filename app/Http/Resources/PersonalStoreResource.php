<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonalStoreResource extends JsonResource
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
            'id' => $this->id,
            'name'=> $this->name,
            'email'=> $this->email,
            'phone'=> $this->phone,
            'country_id'=>$this->country->country,
            'state_id'=>$this->state->state,
            'city_id'=>$this->city->city,
            'skill'=>collect($this->skills0)->pluck('name')->implode(', '),
            /*
            'skill'=>$this->skills0
            This method use data collection form
            	[ { "id": 1, "name": "Javascript", "created_at": null, "updated_at": null, "pivot": { "user_id": 1, "skill_id": 1 } } ]
            */
            // 'phone'=> $this->phone,
            // 'course' => $this->course->course_name,
            // 'subject'=>$this->subject->subject_name,
            // 'faculty' =>$this->faculty->faculty_name
        ];
    }
}
