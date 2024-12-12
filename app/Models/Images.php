<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Images extends Model
{
    use HasFactory;

    protected $fillable=['path','producto_id'];

    public function producto(){
        return $this->BelongsTo(Product::class, 'producto_id');
    }

    public function url (): Attribute{
        return new Attribute(get: fn()=>route('images.image', $this));
    }

    protected $appends=['url'];
}
