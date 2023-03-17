<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string $title
 * @property string $premium
 * @property string $insuranceDetail
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
        'insuranceDetail',
        'created_at',
        'updated_at'];
}
