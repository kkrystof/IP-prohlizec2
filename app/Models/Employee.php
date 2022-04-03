<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable

{
    use HasFactory, Notifiable;


    protected $fillable = ['name', 'surname', 'room', 'wage', 'job', 'password', 'login'];
    protected $hidden = [
        'password', 'admin'
    ];

    protected $table = 'employee';

    protected $primaryKey = 'employee_id';
    public $timestamps = false;



//     public function rooms()
//     {
//         return $this->hasMany(Room::class);
//     }

    public function rooms()
    {
                return $this->belongsToMany(Room::class, 'key', 'employee', 'room');
//                return $this->belongsToMany(Room::class, 'key', 'room', 'employee');

    }

    public function getEmailAttribute() {
        return $this->login;
    }

    
    public function getRoomIdAttribute()
    {
      return $this->attributes['room'];
    }

    public function getRoomAttribute($id) {
               return Room::find($id)->name ?: '-';
    }

    public function getIsAdminAttribute() {
//        if(isset($this->admin)){}
        return ($this->admin === 1)? true : false;
    }

    public function setEmailAttribute($value)
    {
      $this->attributes['login'] = strtolower($value);
    }

    public function getWageAttribute(){
        return (($this->attributes['wage'] > 0)? number_format(($this->attributes['wage'])) : 0) . ',-';

    }


//     public function setPasswordAttribute($value)
// {
//    $this->attributes['password'] = bcrypt($value);
// }

//    public function romm()
//    {
//        return $this->belongsToMany(Room::class, 'key', 'room', 'employee');
//    }

//    public function getRoomAttribute($id)
//    {
//        return Room::find($id)->name ?: '-';
//
////        $this->attributes['room'] = Room::find($id)->name ?: '-';
////        $this->attributes['room_id'] = $id;
//    }
//
//
//    public function getRoomNewAttribute($id)
//    {
//        return $this->room;
////        return 222;
////        $this->attributes['room'] = Room::find($id)->name ?: '-';
////        $this->attributes['room_id'] = $id;
//    }




//    protected function firstName(): Attribute
//    {
//        return Attribute::make(
//            get: fn ($value) => ucfirst($value),
//            set: fn ($value) => strtolower($value),
//        );
//    }

    // public function room()
    // {
    //     return $this->belongsToMany('App\Models\Room', 'key', 'employee', 'room');
    // }


}
