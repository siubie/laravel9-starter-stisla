<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'route', 'menu_group_id', 'permission_name'];

    public function menuGroup()
    {
        return $this->belongsTo(MenuGroup::class);
    }
}
