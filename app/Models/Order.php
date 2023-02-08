<?php

namespace App\Models;

use App\Models\Product;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function owner()
    {
        return User::findOrFail($this->user_id);
    }

    public function pay()
    {
        return number_format($this->price_total / ($this->users->count() + 1), 2, '.', "");;
    }
}
