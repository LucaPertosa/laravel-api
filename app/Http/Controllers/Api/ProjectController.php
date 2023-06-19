<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        // $projects = Project::all();
        $projects = Project::with(['technologies', 'type'])->paginate(8);
        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }

    public function show($slug) {
        $projects = Project::with(['technologies', 'type'])->where('slug', $slug)->first();
        if ($projects) {
            return response()->json([
                'success' => true,
                'results' => $projects,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Progetto non trovato',
            ])->setStatusCode(404);
        }

    }
}
