<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KrsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'mahasiswa' => new MahasiswaResource($this->mahasiswa),
            'kajur' => new DosenResource($this->whenLoaded('kajur')),
            'dosen' => new DosenResource($this->whenLoaded('dosen')),
            'pengajuans' => PengajuanResource::collection($this->whenLoaded('pengajuan')),
        ];
    }
}
