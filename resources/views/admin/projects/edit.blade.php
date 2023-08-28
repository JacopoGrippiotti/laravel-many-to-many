@extends('layouts.app')

@section('content')
<div class="container" id="projects-container">
    <div class="row justify-content-center">
        <div class="col-12">
            <form action="{{ route('admin.projects.update', $project) }}" method="POST"
             enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="exampleFormControlInput1" class="form-label">
                        Title
                    </label>
                    <input type="text" class="form-control" id="title" placeholder="Insert your project's title" name="title" value="{{ old( 'title' , $project->title) }}">
                </div>

                <select class="form-select mb-5" aria-label="Default select example" name='type_id' id='type_id' value="{{ old( 'type_id' , $project->type_id) }}" >
                  @foreach ($typeIds as $typeId )
                    <option value="{{$typeId->id}}" {{$project->type->id == $typeId->id ? 'selected': ''}}>{{$typeId->name}}</option>
                  @endforeach                  
                </select>                
                
                @error('url')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="url" class="form-label">
                        Project Url
                    </label>
                    <input type="text" class="form-control" id="url" placeholder="https://ginetto-va-in-campagna-col-cappello.jpg" name="url" value="{{  old( 'url' , $project->url) }}">
                </div>

                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="image" class="form-label">
                        Image
                    </label>
                    <input type="file" name="image" id="image" class="form-control" placeholder="Upload your image" value="{{ old('image', '') }}">
                </div>
                
                <div class="mb-5">
                   <label for="technologies" class="form-label">
                      Tags
                   </label>

                    <div>
                     @foreach ($technologies as $technology)
                        <input type="checkbox" name="technologies[]" class="form-check-input" id="tags" value="{{ $technology->id }}" @if ($project->technologies->contains($technology->id) ) checked @endif>
                        <label for="technologies" class="form-check-label me-3">
                            {{ $technology->name }}
                        </label>
                     @endforeach
                    </div>
                </div>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-5">
                    <label for="content" class="form-label">
                        Content
                    </label>
                    <textarea class="form-control" id="content" rows="7" name="content">
                        {{ old( 'content' , $project->content) }}
                    </textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" class="me-3">
                        Update project
                    </button>
                    <button type="reset">
                        Reset
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection