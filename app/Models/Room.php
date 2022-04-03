<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Employee;
use Symfony\Component\VarDumper\VarDumper;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'no', 'phone'];

    protected $table = 'room';

    protected $primaryKey = 'room_id';
    public $timestamps = false;





    public function employees()
    {
        // VarDumper::dump($this->hasMany(Employee::class, 'room'));

        return $this->hasMany(Employee::class, 'room');

    }

    public function keys()
    {
        // return $this->hasMany(Employee::class);
        return $this->belongsToMany(Employee::class, 'key', 'room', 'employee');

    }


       public function getWageAvgAttribute()
   {
       return $this->employees->count() === 0 ? 0 : number_format(($this->employees->sum('wage')) / $this->employees->count()) . ',-';
   }
}
