<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'phone', 'email', 'address'])]
class Client extends Model
{
    public function quotations(): HasMany
    {
        return $this->hasMany(Quotation::class);
    }
}
