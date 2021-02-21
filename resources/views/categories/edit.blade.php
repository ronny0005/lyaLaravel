@extends('base')
@section('main')
    <div class="card p-4">
        <div class="text-center">
            <h3 class="title">Categorie</h3>
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
        <form method="post" enctype="multipart/form-data" accept-charset="utf-8" action="{{ route('categories.update', $categories->categoriesId) }}">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="text-center col-12">
                    <div id="file-upload-form" class="uploader" >
                        <input id="file-upload" type="file" name="fileUpload" accept="image/*" onchange="readURL(this);">
                        <label for="file-upload" id="file-drag">
                            <img class="mb-3" width="100" height="100" src='{{ asset('public/image/'.$categories->image) }}'>
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
                    <input type="text" class="form-control" name="title" value="{{ $categories->title }}" />
                </div>
                <div class="col-12">
                    <label for="nameDescription">Description :</label>
                    <input type="text" class="form-control" name="description" value="{{ $categories->description }}" />
                </div>
                <div class="col-12">
                    <button type="submit" class="w-100 btn btn-primary mt-2">Valider</button>
                </div>
            </div>
        </form>
    </div>
@endsection
