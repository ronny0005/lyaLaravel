@extends('base')

@section('main')
    <h3 class="title">Categories</h3>
    <div class="card p-4">
        <div class="col-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div class="mb-4">
            <a href="{{ route('categories.create')}}" class="btn btn-primary">Nouvelle categorie</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" id="listeElement">
            <thead>
            <tr>
                <td>Titre</td>
                <td>Description</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->title}}</td>
                    <td>{{$category->description}}</td>
                    <td>

                        <a href="{{ route('categories.edit',$category->categoriesId)}}" class="float-left mr-3">
                            <span class="fa fa-edit"></span>
                        </a>
                        <form action="{{ route('categories.destroy', $category->categoriesId)}}" method="post">
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
