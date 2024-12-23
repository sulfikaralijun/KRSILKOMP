<?php

namespace App\Http\Controllers\Apps\Mahasiswa;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PengajuanRequest;
use App\Http\Resources\DosenResource;
use App\Http\Resources\KrsResource;
use App\Models\Krs;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Notifications\CreateKrsNotification;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $krsQuery = Krs::with(['mahasiswa', 'kajur', 'dosen', 'pengajuan' => function ($query) {
            $query->orderBy('created_at', 'asc');
        }]);

        $search = $request->input('searchfilter');
        $dosen = User::role('dosen');

        if ($search) {
            $dosen->where('name', 'like', '%' . $search . '%');
        }

        $dosen = $dosen->get();

        if ($request->wantsJson()) {
            return DosenResource::collection($dosen);
        }

        if (Auth::user()->hasRole('mahasiswa')) {
            $krs = $krsQuery->where('mahasiswa_id', Auth::id())->first();
            $data = $krs ? new KrsResource($krs) : collect();
        } else {
            $krs = $krsQuery->whereHas('pengajuan', function ($query) {
                $query->where('dosen_id', Auth::id());
            })->get();
            $data = KrsResource::collection($krs);
        }

        return Inertia::render('Mahasiswa/Pengajuan/Index', [
            'krs' => $data,
            'dosen' => $dosen,
        ]);
    }

    public function getCompletion(Request $request)
    {
        $prompt = $request->input('prompt');
        $response = Http::withToken(env('OPENAI_API_KEY'))->post('https://api.x.ai/v1/chat/completions', [
            'model' => 'grok-beta',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        $res = $response->json();

        return response()->json([
            'message' => $res['choices'][0]['message']['content'],
            'status' => 'success',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $krs = Krs::firstOrCreate(
                ['mahasiswa_id' => Auth::id()],
                [
                    'kajur_id' => $request->dosen_id,
                    'dosen_id' => $request->dosen_pa_id,
                ]
            );

            $isFirstPengajuan = !$krs->pengajuan()->exists();

            $pengajuan = $krs->pengajuan()->create([
                'topik'     => $isFirstPengajuan ? 'Pengisian Penawaran KRS.' : $request->topik,
                'semester'  => $isFirstPengajuan ? 1 : $request->smt,
            ]);

            // Send notification
            $kajur = $krs->kajur ?? User::find($request->dosen_id);
            $dosen = $krs->dosen ?? User::find($request->dosen_pa_id);

            if ($kajur) {
                $kajur->notify(new CreateKrsNotification($kajur->id, $dosen->id, $pengajuan->id));
            }

            if ($dosen) {
                $dosen->notify(new CreateKrsNotification($kajur->id, $dosen->id, $pengajuan->id));
            }

            return redirect()->back()->with('success', 'Pengajuan berhasil dibuat');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PengajuanRequest $request, string $id)
    {
        try {
            $request->validated();

            $pengajuan = Pengajuan::findOrFail($id);

            if (Auth::user()->hasRole('mahasiswa')) {
                $pengajuan->update([
                    'topik' => $request->topik,
                    'semester' => $request->smt,
                ]);
            }

            if (Auth::user()->hasRole('dosen')) {
                $pengajuan->update([
                    'dosen_id' => Auth::id(),
                    'status' => $request->status,
                    'keterangan' => $request->keterangan,
                ]);
            }

            return back()->with('success', 'Pengajuan berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
