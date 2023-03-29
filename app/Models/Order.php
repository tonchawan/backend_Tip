<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property integer $id
 * @property string $user_id
 * @property string $name
 * @property string $lastname
 * @property string $prefix
 * @property string $goverment_id
 * @property string $address
 * @property string $email
 * @property string $dob
 * @property string $start_date
 * @property string $end_date
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
        'user_id',
        'package_id',
        'name',
        'lastname',
        'prefix',
        'goverment_id',
        'sub_district',
        'district',
        'provience',
        'email',
        'dob',
        'start_date',
        'end_date',
        'beneficial',
        'order_status',
        'created_at',
        'updated_at',
        'address',
        'postcode'
    ];
}
