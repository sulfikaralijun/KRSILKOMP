<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUniqueStringIds;

class Pengajuan extends Model
{
    use HasFactory, HasUniqueStringIds;


    public function newUniqueId()
    {
        return 'KRS-' . Str::uuid();
    }

    protected function isValidUniqueId($value): bool
    {
        return true;
    }
}
