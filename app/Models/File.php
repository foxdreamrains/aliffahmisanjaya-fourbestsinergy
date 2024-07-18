<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = "file";
    public $timestamps = true;
    protected $guarded = ['id_file'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
