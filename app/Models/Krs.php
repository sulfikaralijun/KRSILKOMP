<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUniqueStringIds;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Krs extends Model
{
    use HasUniqueStringIds;
    protected $guarded = [];

    protected function isValidUniqueId($value): bool
    {
        return true;
    }

    public function newUniqueId()
    {
        return 'KRS-' . Str::uuid();
    }

    public function pengajuan(): HasMany
    {
        return $this->hasMany(Pengajuan::class);
    }

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function kajur(): BelongsTo
    {
        return $this->belongsTo(User::class, 'kajur_id');
    }

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }
}
