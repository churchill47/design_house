<?php

   namespace App\Http\Controllers;

   use App\Models\Project;
   use App\Models\Like;
   use Illuminate\Http\Request;
   use Illuminate\Support\Facades\Auth;

   class LikeController extends Controller
   {
       public function store(Request $request, Project $project)
       {
           $existingLike = Like::where('user_id', Auth::id())->where('project_id', $project->id)->first();

           if (!$existingLike) {
               Like::create([
                   'user_id' => Auth::id(),
                   'project_id' => $project->id,
               ]);
           }

           return redirect()->route('projects.show', $project);
       }

       public function destroy(Request $request, Project $project)
       {
           Like::where('user_id', Auth::id())->where('project_id', $project->id)->delete();
           return redirect()->route('projects.show', $project);
       }
   }