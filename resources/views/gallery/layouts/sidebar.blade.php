@if (Route::is('images.show'))
    <div class="card text-white bg-secondary mb-3 text-center">
        <div class="h5 card-header ">
            <div class="row">
                <div class="col"><i class="fas fa-image"></i> Image details</div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    Author: {{$image->user->name}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Title: {{$image->title}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Created at: {{$image->created_at}}
                </div>
            </div>
            @can('manage', $image)
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="/images/{{$image->id}}/edit" class="btn btn-info btn-block" role="button">Edit</a>

                    </div>
                    <div class="col-sm-6">
                        <form action="{{ route('images.destroy', $image->id) }}" method="POST">

                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-block" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @endcan
        </div>
    </div>
@endif


<div class="card text-white bg-secondary mb-3 text-center">
    <div class="h5 card-header ">
        <div class="row">
            <div class="col"><i class="fas fa-lightbulb"></i> In brief</div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                {{$images->count()}} images
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{$comments->count()}} comments
            </div>
        </div>
    </div>
</div>

<div class="card text-white bg-secondary mb-3 text-center">
    <div class="h5 card-header ">
        <div class="row">
            <div class="col"><i class="fas fa-history"></i> Archives</div>
        </div>
    </div>
    <div class="card-body ">
        @foreach ($archives as $data)
            <div class="row">
                <div class="col">
                    <a href="/?year={{$data['year']}}&month={{$data['month']}}"
                       class="text-light sidebar-link">{{ $data['month'].' '.$data['year'] }}</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="card text-white bg-secondary mb-3 text-center" style="max-width: 18rem;">
    <div class="h5 card-header ">
        <div class="row">
            <div class="col"><i class="fas fa-tags"></i> Tags</div>
        </div>
    </div>
    <div class="card-body ">

        @foreach ($tags as $tag)

            <div class="row">
                <div class="col">
                    <a href="/images/tags/{{$tag->name}}" class="sidebar-link text-light">{{ $tag->name }}</a>
                    <span class="badge badge-light badge-pill">{{ $tag->images->count() }}</span>
                </div>
            </div>
        @endforeach

    </div>
</div>



