<?php

namespace App\Http\Controllers\Apps\Mahasiswa;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Mahasiswa/Pengajuan/Index');
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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
