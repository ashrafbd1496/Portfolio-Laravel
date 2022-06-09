<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'image_status',
        'team_image',
        'name',
        'job',
        'link_2',
        'link_3',
        'link_4',
        'link_5',
        'order',
    ];
}
