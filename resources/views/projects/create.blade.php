@extends('layouts.app')

     @section('content')
         <div class="container">
             <h1>Upload New Project</h1>
             <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="mb-3">
                     <label for="title" class="form-label">Title</label>
                     <input type="text" name="title" id="title" class="form-control" required>
                     @error('title')
                         <div class="text-danger">{{ $message }}</div>
                     @enderror
                 </div>
                 <div class="mb-3">
                     <label for="description" class="form-label">Description</label>
                     <textarea name="description" id="description" class="form-control" required></textarea>
                     @error('description')
                         <div class="text-danger">{{ $message }}</div>
                     @enderror
                 </div>
                 <div class="mb-3">
                     <label for="image" class="form-label">Image</label>
                     <input type="file" name="image" id="image" class="form-control">
                     @error('image')
                         <div class="text-danger">{{ $message }}</div>
                     @enderror
                 </div>
                 <button type="submit" class="btn btn-primary">Submit</button>
             </form>
         </div>
     @endsection