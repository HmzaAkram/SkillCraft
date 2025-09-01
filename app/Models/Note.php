<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
      // In Note.php model
protected $fillable = [
    'title',
    'content', 
    'file_path'
];
}
