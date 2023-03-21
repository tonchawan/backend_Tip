<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property integer $id
 * @property string $userId
 * @property string $name
 * @property string $lastname
 * @property string $prefix
 * @property string $govermentId
 * @property string $address
 * @property string $email
 * @property string $dob
 * @property string $startDate
 * @property string $endDate
 * @property string $beneficial
 * @property string $created_at
 * @property string $updated_at
 */
class Order extends Model
{
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    protected $fillable = [
        'userId',
        'packageId',
        'name',
        'lastname',
        'prefix',
        'govermentId',
        'sub_district',
        'district',
        'provience',
        'email',
        'dob',
        'startDate',
        'endDate',
        'beneficial',
        'OrderStatus',
        'created_at',
        'updated_at',
        'address',
        'postcode'
    ];
}
