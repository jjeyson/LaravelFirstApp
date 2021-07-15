<?php

namespace App\Models;

use App\Models\Product;

class PanelProduct extends Product
{
    protected static function booted()
    {
        //static::addGlobalScope();
    }
}
