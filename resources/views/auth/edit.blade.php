@extends('gallery.app')

@section('title', ' - profile')

@section('content')


  <div class="row">
    <div class="col-md-4 offset-md-4">
      <img src="{{asset('imgs/'.$user->avatar)}}" class="rounded-circle" height="250" width="250" onerror="this.src='{{ asset('images/1521928850.jpg') }}'">
    </div>
  </div>
<div class="row">
  <div class="col-md-6 offset-md-3">
    <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
      {{ method_field('PATCH') }}

      {{ csrf_field() }}

    <div class="form-group">
      <label for="image"></label>
      <div class="input-group mb-3">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="inputGroupFile02" name="avatar">
          <label class="custom-file-label" for="image">Choose file</label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
    </form>
  </div>
</div>

<script>
/* show file value after file select */
$('.custom-file-input').on('change',function(){
  $(this).next('.custom-file-label').addClass("selected").html($(this).val());
})
</script>


@endsection
