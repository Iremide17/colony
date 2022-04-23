<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\HasUser;

class Booking extends Model
{
    use HasFactory;
    use HasUser;

    const TABLE = 'bookings';
    protected $table = self::TABLE;

    protected $fillable = [
        'checkin',
        'checkout',
        'adults',
        'children',
        'property_id',
        'user_id',
        'days',
        'logistics',
        'cleaning',
        'total',
        'isAccepted',
        'paymentStatus',
        'booking_id'
    ];

    protected $with = [
        'userRelation', 'property'
    ];

    protected $casts = [
        'checkin' => 'datetime',
        'checkout' => 'datetime',
        'isAccepted' => 'boolean',
        'paymentStatus' => 'boolean',
        'logistics' => 'boolean',
        'cleaning' => 'boolean',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function code(): string
    {
        return $this->booking_id;
    }

    public function days(): int
    {
        return $this->days;
    }

    public function total(): int
    {
        return $this->total;
    }

    public function logistic(): bool
    {
        return $this->logistic;
    }

    public function cleaning(): bool
    {
        return $this->cleaning;
    }

    public function checkinDate(): ?string
    {
        return $this->checkin->format('d F Y');
    }

    public function checkoutDate(): ?string
    {
        return $this->checkout->format('d F Y');
    }

    public function getStatusBadgeAttribute()
    {

        $status = [
            '0' => 'Pending',
            '1' => 'Accepted',
        ];

        return $status[$this->isAccepted];
    }

    public function getPaymentBadgeAttribute()
    {

        $status = [
            '0' => 'Not paid',
            '1' => 'Paid',
        ];

        return $status[$this->paymentStatus];
    }

    public function getRouteKeyName()
    {
        return 'booking_id';
    }

}