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
                    </div><br />
                @endif
                <form method="post" enctype="multipart/form-data" accept-charset="utf-8" action="{{ route('posts.store') }}">
                    @csrf

                    <div class="row">
                        <div class="text-center col-12">
                            <div id="file-upload-form" class="uploader" >
                                <input id="file-upload" type="file" name="fileUpload" accept="image/*" onchange="readURL(this);">
                                <label for="file-upload" id="file-drag">
                                    <img id="file-image" src="#" alt="Preview" class="hidden">
                                    <div id="start" >
                                        <i class="fa fa-download" aria-hidden="true"></i>
                                        <div>Choississez ou déposez votre logo</div>
                                        <div id="notimage" class="hidden">Please select an image</div>
                                        <span id="file-upload-btn" class="btn btn-primary">Chossissez un fichier</span>
                                        <br>
                                        <span class="text-danger">{{ $errors->first('fileUpload') }}</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="nameTilte">Titre :</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}"/>
                        </div>
                        <div class="col-6">
                            <label for="nameCategoriesId">Categorie :</label>
                            <select class="form-control" name="categoriesId">
                                @foreach($categories as $category)
                                    <option value="{{$category->categoriesId}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="nameAuthorId">Auteur :</label>
                            <select class="form-control" name="authorId">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <textarea class="ckeditor form-control" name="description">{{ old('description') }}</textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="w-100 btn btn-primary mt-2">Ajouter</button>
                        </div>
                    </div>
                </form>
            </div>
@endsection
