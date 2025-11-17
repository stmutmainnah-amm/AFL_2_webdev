<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects with relations.
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = max(1, min((int) $request->query('per_page', 15), 100));

        $projects = Project::with(['user', 'comments.user'])
            ->withCount('comments')
            ->latest()
            ->paginate($perPage);

        return response()->json($projects);
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('projects', 'slug')],
            'description' => ['nullable', 'string'],
            'url' => ['nullable', 'url', 'max:255'],
            'tech_stack' => ['nullable'],
            'user_id' => ['nullable', 'integer', 'exists:users,id'],
        ]);

        $project = new Project();
    $project->title = $data['title'];
    $project->slug = Project::uniqueSlug($data['slug'] ?? $project->title);

        $project->description = $data['description'] ?? null;
        $project->url = $data['url'] ?? null;
        $project->tech_stack = $this->normalizeTechStack($data['tech_stack'] ?? null);

        if (!empty($data['user_id'])) {
            $project->user()->associate($data['user_id']);
        }

        $project->save();
    $project->load(['user', 'comments.user'])->loadCount('comments');

        return response()->json($project, 201);
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project): JsonResponse
    {
        $project->load(['user', 'comments'])->loadCount('comments');

        return response()->json($project);
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, Project $project): JsonResponse
    {
        $data = $request->validate([
            'title' => ['sometimes', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('projects', 'slug')->ignore($project->id)],
            'description' => ['nullable', 'string'],
            'url' => ['nullable', 'url', 'max:255'],
            'tech_stack' => ['nullable'],
            'user_id' => ['nullable', 'integer', 'exists:users,id'],
        ]);

        if (array_key_exists('title', $data)) {
            $project->title = $data['title'];
        }

        if (array_key_exists('slug', $data)) {
            $slugSource = $data['slug'] ?: $project->title;
            $project->slug = Project::uniqueSlug($slugSource, $project->id);
        } elseif (array_key_exists('title', $data) && empty($project->slug)) {
            $project->slug = Project::uniqueSlug($project->title, $project->id);
        }

        if (array_key_exists('description', $data)) {
            $project->description = $data['description'];
        }

        if (array_key_exists('url', $data)) {
            $project->url = $data['url'];
        }

        if (array_key_exists('tech_stack', $data)) {
            $project->tech_stack = $this->normalizeTechStack($data['tech_stack']);
        }

        if (array_key_exists('user_id', $data)) {
            if (!empty($data['user_id'])) {
                $project->user()->associate($data['user_id']);
            } else {
                $project->user()->dissociate();
            }
        }

        $project->save();
    $project->load(['user', 'comments.user'])->loadCount('comments');

        return response()->json($project);
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project): JsonResponse
    {
    $project->delete();

    return response()->json(['message' => 'Project deleted'], 200);
    }

    /**
     * Normalize tech stack input to an array of strings.
     */
    private function normalizeTechStack(mixed $value): ?array
    {
        if ($value === null) {
            return null;
        }

        if (is_array($value)) {
            $normalized = array_filter(array_map(fn ($item) => trim((string) $item), $value));
            return $normalized ? array_values($normalized) : null;
        }

        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $normalized = array_filter(array_map(fn ($item) => trim((string) $item), $decoded));
                return $normalized ? array_values($normalized) : null;
            }
        }

        $parts = preg_split('/[,;]+/', (string) $value) ?: [];
        $normalized = array_filter(array_map(fn ($item) => trim($item), $parts));

        return $normalized ? array_values($normalized) : null;
    }
}
