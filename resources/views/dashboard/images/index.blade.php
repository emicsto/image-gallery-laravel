@extends('dashboard.app')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h4 class="card-title">Images</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning">
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Tags</th>
                                    <th>No. of comments</th>
                                    <th>Actions</th>
                                    </thead>
                                    <tbody>
                                    @foreach($images as $image)
                                        <tr>
                                        <td>{{$image->id}}</td>
                                        <td>
                                            <a href="/images/{{$image->id}}">
                                                {{$image->title}}
                                            </a>
                                        </td>
                                        <td>{{$image->tags->count()}}</td>
                                        <td>{{$image->comments->count()}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="/images/{{$image->id}}/edit" class="btn btn-info btn-block" role="button">Edit</a>
                                                </div>
                                                <div class="col-md-6">
                                                        <form action="{{ route('images.destroy', $image->id) }}" method="POST">

                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger btn-block delete" type="submit">Delete</button>
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
                {{ $images->links() }}
            </div>
        </div>







@endsection
