<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string $title
 * @property string $premium
 * @property string $insurance_detail
 * @property string $created_at
 * @property string $updated_at
 */
class Package extends Model
{
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    protected $fillable = [
        'title',
        'premium',
        'insurance_detail',
        'created_at',
        'updated_at'];
}
