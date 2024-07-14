<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    
    
    public function getByLimit(int $limit_count=10){
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
     protected $attributes = [
        
        'user_id'=>1,
       'image'=>0,
       
    ];
    
    protected $fillable = [
     'user_id',
    'cotent',
    'image'
];
    
    public function user()
{
    return $this->belongsTo(User::class);
}

public function likes()   
{
    return $this->hasMany(Like::class);  
}

public function replies()   
{
    return $this->hasMany(Reply::class);  
}
}
