<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionalTimeRequirement extends Model
{
    protected $fillable = [
        'description',
        'project_id',
        'category',
        'hours',
        'timing'
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}