<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Event extends Model
{
    public const TYPE_COMPETITION = 'competition';
    public const TYPE_WORKSHOP = 'workshop';
    public const TYPE_EVENT = 'event';
    public const TYPE_COURSE = 'course';

    public const STATUS_PENDING = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';

    protected $fillable = [
        'organization_id',
        'title',
        'description',
        'type',
        'cover_image',
        'location',
        'start_date',
        'end_date',
        'requirements',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function competition()
    {
        return $this->hasOne(Competition::class, 'id');
    }

    public function isCompetition(): bool
    {
        return $this->type === self::TYPE_COMPETITION;
    }

    public function isApproved(): bool
    {
        return $this->status === self::STATUS_APPROVED;
    }

    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_APPROVED);
    }

    public function scopeOfType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }
}