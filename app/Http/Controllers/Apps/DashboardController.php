<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('mahasiswa')) {
            $component  = 'Mahasiswa/Dashboard';
        } else {
            $component  = 'Dosen/Dashboard';
        }

        return Inertia::render($component);
    }
}
