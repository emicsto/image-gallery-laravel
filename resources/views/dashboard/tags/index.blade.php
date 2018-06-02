@extends('dashboard.app')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h4 class="card-title">Tags</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>No. of images with tag</th>
                                    <th>Actions</th>
                                    </thead>
                                    <tbody>
                                    @foreach($tags as $tag)
                                        <tr>
                                        <td>{{$tag->id}}</td>
                                        <td>
                                                {{$tag->name}}
                                        </td>
                                        <td>{{$tag->images->count()}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="/tags/{{$tag->id}}/edit" class="btn btn-info btn-block" role="button">Edit</a>
                                                </div>
                                                <div class="col-md-6">
                                                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">

                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger btn-block" type="submit">Delete</button>
                                                        </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="mx-auto pagination" style="width: 150px;">
                {{ $tags->links() }}
            </div>
        </div>







@endsection
