@extends('base')

@section('main')
    <h3 class="title">Articles</h3>
    <div class="card p-4">
        <div class="col-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div class="mb-4">
            <a href="{{ route('posts.create')}}" class="btn btn-primary">Nouvel article</a>
        </div>
        <div class="table-responsive">
        <table class="table table-striped" id="listeElement">
            <thead>
            <tr>
                <td>Titre</td>
                <td>Description</td>
                <td>Categorie</td>
                <td>Auteur</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{(\App\Models\Categories::find($post->categoriesId))->title}}</td>
                    <td>{{(\App\Models\User::find($post->authorId))->name}}</td>
                    <td>
                        <a href="{{ route('posts.edit',$post->postsId)}}" class="float-left mr-3">
                            <span class="fa fa-edit"></span>
                        </a>
                        <form action="{{ route('posts.destroy', $post->postsId)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary float-left" type="submit">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
