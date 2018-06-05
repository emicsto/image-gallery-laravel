@extends('dashboard.app')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">Users</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                <th>#</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>No. of images</th>
                                <th>No. of comments</th>
                                <th>Role</th>
                                <th>Actions</th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->images->count()}}</td>
                                        <td>{{$user->comments->count()}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="/users/{{$user->id}}/edit" class="btn btn-info btn-block"
                                                       role="button">Edit</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <form action="{{ route('users.destroy', $user->id) }}"
                                                          method="POST">

                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-block delete" type="submit">Delete
                                                        </button>
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
            {{ $users->links() }}
        </div>
    </div>



    <script type="text/javascript">
        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>



@endsection
