<?php
  
namespace App\Models;
use App\Models\Student;
  
use Illuminate\Database\Eloquent\Model;
   
class Mark extends Model
{
    protected $fillable = [
        'name', 'maths', 'history', 'science','term',
    ];
    public function student()
    {
        return $this->belongsTo('App\Models\Student','name' ,'id');
    }
}