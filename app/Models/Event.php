<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'status'
    ];

    public function add_data($data){
        $status = $this->create($data);
        if($status->id){
            return ['status'=> true, 'id' => $status->id];
        }
        return ['status'=> false, 'id' => null];
    }

    public function update_data($id,$data){
        $event = $this->where('id',$id)->first();
        if(!$event){
            return false;
        }
        $update = $event->update($data);
        return $update;
    }

    public function delete_data($id){
        $event = $this->where('id',$id)->first();
        if(!$event){
            return false;
        }
        $delete = $event->delete();
        return $delete;
    }
}
