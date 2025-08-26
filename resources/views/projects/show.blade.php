@extends('layouts.app')

     @section('content')
         <div class="container">
             <h1>{{ $project->title }}</h1>
             @if ($project->image)
                 
                 <img src="{{ Storage::url($project->image_path) }}" class="img-fluid mb-3" alt="{{ $project->title }}">
             @endif
             <p>{{ $project->description }}</p>
             <p><small>By {{ $project->user->name }}</small></p>

             <!-- Likes -->
             <div class="mb-3">
                 @auth
                     <form action="{{ $project->likes()->where('user_id', auth()->id())->exists() ? route('likes.destroy', $project) : route('likes.store', $project) }}" method="POST">
                         @csrf
                         @if ($project->likes()->where('user_id', auth()->id())->exists())
                             @method('DELETE')
                             <button type="submit" class="btn btn-outline-danger">Unlike ({{ $project->likes->count() }})</button>
                         @else
                             <button type="submit" class="btn btn-outline-primary">Like ({{ $project->likes->count() }})</button>
                         @endif
                     </form>
                 @else
                     <p>Likes: {{ $project->likes->count() }}</p>
                 @endauth
             </div>

             <!-- Comments -->
             <h3>Comments</h3>
             @auth
                 <form action="{{ route('comments.store', $project) }}" method="POST" class="mb-3">
                     @csrf
                     <div class="mb-3">
                         <textarea name="content" class="form-control" required></textarea>
                         @error('content')
                             <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     <button type="submit" class="btn btn-primary">Add Comment</button>
                 </form>
             @endauth
             @foreach ($project->comments as $comment)
                 <div class="card mb-2">
                     <div class="card-body">
                         <p>{{ $comment->content }}</p>
                         <p><small>By {{ $comment->user->name }} on {{ $comment->created_at->format('M d, Y') }}</small></p>
                     </div>
                 </div>
             @endforeach
         </div>
     @endsection