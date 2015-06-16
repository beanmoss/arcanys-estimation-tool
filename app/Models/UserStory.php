<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStory extends Model
{
    protected $fillable = [
        'name',
        'project_id',
        'category',
        'note'
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}