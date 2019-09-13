<?php

namespace App;

use Carbon\Carbon;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use Searchable;
    protected $guarded =[];
    protected $dates = ['birthday'];
    public function setBirthdayAttribute($birthday){
        $this->attributes['birthday']=Carbon::parse($birthday);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function path(){
        return '/contacts/'.$this->id;
    }
    public function scopeBirthday($query){
        return $query->whereRaw('birthday like "%-'.now()->format('m').'-%"');
    }
}
