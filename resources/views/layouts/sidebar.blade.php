@if (Route::is('images.show'))
    <div class="card text-white bg-secondary mb-3 text-center">
        <div class="h5 card-header ">
            <div class="row">
                <div class="col"><i class="fas fa-image"></i> Image details</div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">

            </div>
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



