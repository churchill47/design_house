@extends('layouts.app')

     @section('content')
         <div class="container">
             <h1 style="font-size: 3em; color: white;">Projects</h1>
             @auth
                 @if (auth()->user()->role === 'designer')
                     <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Upload Project</a>
                 @endif
             @endauth
             <div class="row">
                 @foreach ($projects as $project)
                     <div class="col-md-4 mb-4">
                         <div class="card" 
                         style="max-width: 100%; border-color: #ffcc00;border-radius:15px; border-width: 5.5px; 
                         height: auto; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                             @if ($project->image)
                                 <img src="{{ Storage::url($project->   image_path) }}" class="card-img-top" alt="{{ $project->title }}">
                             @endif
                             <div class="card-body ">
                                 <h5 class="card-title">{{ $project->title }}</h5>
                                 <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                                 <p class="card-text"><small>By {{ $project->user->name }}</small></p>
                                 <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">View</a>
                             </div>
                         </div>
                     </div>
                 @endforeach
             </div>
         </div>
     @endsection