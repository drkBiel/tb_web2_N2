<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['id_User','name','description','value','temp','imagem_1','imagem_2','supporter','finalizado'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'project';
}
