<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $technologies = Technology::all();
        $types = Type::all();

        $projects = Project::query();

        if ($request->has('technology_id') && !is_null($data['technology_id'])) {
            $projects->whereHas('technologies', function ($query) use ($data) {
                $query->where('technology_id', $data['technology_id']);
            });
        };

        // gesione nome visualizzato del filtro non trovato
        if ($request->has('technology_id') && !is_null($data['technology_id'])) {
            $selected_tech = Technology::find($data['technology_id'])->name;
        } else {
            $selected_tech = [];
        }

        $projects = $projects->get();


        return view('admin.projects.index', compact('projects', 'types', 'technologies', 'selected_tech'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title'], '_');

        // salvataggio del file
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('project_images', $request->image);
            $data['image'] = $path;
        };
        
        $project = Project::create($data);
        if (array_key_exists('technology_id', $data)) {
            $project->technologies()->attach($data['technology_id']);
        }
        return redirect()->route('admin.projects.index')->with('message', "$project->title è stato creato con successo");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title'], '_');

        // Salvataggio del file
        if ($request->hasFile('image')) {
            // aggiungo la condizione, nel caso il file esiste, lo cancello e lo ricarico
            if ($project->image) {
                Storage::delete($project->image);
            }

            $path = Storage::disk('public')->put('project_images', $request->image);
            $data['image'] = $path;
        }

        $project->update($data);
        if (array_key_exists('technology_id', $data)) {
            $project->technologies()->sync($data['technology_id']);
        } else {
            $project->technologies()->detach();
        }
        return redirect()->route('admin.projects.index')->with('message', "$project->title è stato modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->technologies()->detach();

        if ($project->image) {
            Storage::delete($project->image);
        }
        
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->title è stato cancellato con successo");
    }
}
