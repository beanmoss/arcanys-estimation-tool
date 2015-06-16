<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name',
        'project_id'
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}