<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\MenuItem;

class MenuItemOption extends Model
{
    use HasFactory;

    protected $table = 'menu_item_options';

    protected $fillable = [
        'menu_item_id',
        'name',
        'max_qty',
        'price',
    ];
    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class,'menu_item_id');
    }
 
}

