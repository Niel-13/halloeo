<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioGallery extends Model
{
    protected $fillable = ['portfolio_id', 'type', 'file_path'];
}
