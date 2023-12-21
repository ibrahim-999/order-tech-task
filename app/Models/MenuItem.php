<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\MenuItemOption;

class MenuItem extends Model
{
    use HasFactory;

    protected $table = 'menu_items';

    protected $fillable = [
        'item_name',
        'item_description',
        'price',
    ];


    public function menuItemOptions()
    {
        return $this->hasMany(MenuItemOption::class,'menu_item_id');
    }
}
