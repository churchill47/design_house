<?php

   namespace App\Http\Controllers;

   use App\Models\Project;
   use Illuminate\Http\Request;
   use Illuminate\Support\Facades\Auth;
   use Illuminate\Support\Facades\Storage;

   class ProjectController extends Controller
   {
       public function index()
       {
           $projects = Project::with('user')->latest()->get();
           return view('projects.index', compact('projects'));
       }

 



       public function create()
       {
           return view('projects.create');
       }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ]);

    $data = $request->all();
    $data['user_id'] = Auth::id();

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('projects', 'public');
    }

    // Now, the 'data' array contains the correct key for the database.
    Project::create($data);

    return redirect()->route('projects.index')->with('success', 'Project created successfully.');
}

       public function show(Project $project)
       {
           $project->load('user', 'comments.user', 'likes');
           return view('projects.show', compact('project'));
       }
   }