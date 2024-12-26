<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUniqueStringIds;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengajuan extends Model
{
    use HasFactory, HasUniqueStringIds;

    protected $table = 'pengajuan';
    protected $guarded = ['id'];

    public function newUniqueId()
    {
        return 'PENG-' . Str::uuid();
    }

    protected function isValidUniqueId($value): bool
    {
        return true;
    }

    public function dosen(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'dosen_id');
    }

    public function krs(): BelongsTo
    {
        return $this->belongsTo(Krs::class, 'krs_id');
    }
}
