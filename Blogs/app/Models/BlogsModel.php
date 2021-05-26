<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogsModel extends Model
{
    protected $table = 'blogs';

    protected $fillable = ['title','tag','time','text','user_id'];
}
