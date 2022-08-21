<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;

use App\Models\Tag;

class Post extends Model
{
    use HasFactory;

    use softDeletes;

     protected $fillable = [

        'title' , 'user_id' ,  'content' ,  'photo' , 'slug'


     ];



     public function user()
     {
         return $this->belongsTo(User::class, 'user_id');
     }


     /**
      * The roles that belong to the Post
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */
     public function tag()
     {
         return $this->belongsToMany(Tag::class,);
     }
}

