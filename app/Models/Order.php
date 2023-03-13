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
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
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
        'created_at',
        'updated_at'];
}
