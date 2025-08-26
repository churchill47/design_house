<?php

   namespace App\Http\Controllers;

   use App\Models\Project;
   use App\Models\Comment;
   use Illuminate\Http\Request;
   use Illuminate\Support\Facades\Auth;

   class CommentController extends Controller
   {
       public function store(Request $request, Project $project)
       {
           $request->validate([
               'content' => 'required',
           ]);

           Comment::create([
               'user_id' => Auth::id(),
               'project_id' => $project->id,
               'content' => $request->content,
           ]);

           return redirect()->route('projects.show', $project)->with('success', 'Comment added.');
       }
   }