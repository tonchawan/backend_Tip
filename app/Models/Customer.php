<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $lastname
 * @property string $prefix
 * @property string $address
 * @property string $subDistrict
 * @property string $district
 * @property string $province
 * @property string $zip
 * @property string $phone
 * @property string $email
 * @property string $registerId
 * @property string $govermentId
 * @property string $dateRegister
 * @property integer $packageId
 * @property string $created_at
 * @property string $updated_at
 */
class Customer extends Model
{
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    protected $fillable = [
        'username',
        'password',
        'name',
        'lastname',
        'prefix',
        'sub_district',
        'district',
        'provience',
        'phone',
        'email',
        'govermentId',
        'created_at',
        'updated_at'];
}
