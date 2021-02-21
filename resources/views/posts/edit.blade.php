@extends('base')
@section('main')
    <div class="card p-4">
        <div class="text-center">
            <h3 class="title">Article</h3>
        </div>
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" enctype="multipart/form-data" accept-charset="utf-8" action="{{ route('posts.update', $post->postsId) }}">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-12 text-center">
                        <div id="file-upload-form" class="uploader" >
                            <input id="file-upload" type="file" name="fileUpload" accept="image/*" onchange="readURL(this);">
                            <label for="file-upload" id="file-drag">
                                <img class="mb-3" width="100" height="100" src='{{ asset('public/image/'.$post->image) }}'>
                                <div id="start" >
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    <div>Modifier le logo</div>
                                    <br>
                                    <span class="text-danger">{{ $errors->first('fileUpload') }}</span>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="nameTitle">Titre :</label>
                        <input type="text" class="form-control" name="title" value="{{ $post->title }}" />
                    </div>
                    <div class="col-6">
                        <label for="nameDescription">Categorie :</label>
                        <select class="form-control" name="categoriesId">
                            @foreach($categories as $category)
                                <option value="{{$category->categoriesId}}"
                                    @if ($post->categoriesId == $category->categoriesId)
                                        selected="selected"
                                    @endif
                                >{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="nameDescription">Auteur :</label>
                        <select class="form-control" name="authorId">
                            @foreach($users as $user)
                                <option value="{{$user->id}}"
                                    @if ($post->authorId == $user->id)
                                        selected="selected"
                                    @endif
                                >{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 mt-3">
                        <textarea class="ckeditor form-control" name="description">{{ $post->description  }}</textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="w-100 btn btn-primary mt-2">Valider</button>
                    </div>
                </div>
            </form>
        </div>
@endsection
