<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectImageController extends Controller
{
    /**
     * Store uploaded image for a project.
     */
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $file = $request->file('image');
        $dir = public_path('img/projects');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $name = uniqid('proj_') . '.' . $file->getClientOriginalExtension();
        $file->move($dir, $name);

        // save relative path for asset()
        $project->image = 'img/projects/' . $name;
        $project->save();

        return back()->with('success', 'Image uploaded');
    }
}
