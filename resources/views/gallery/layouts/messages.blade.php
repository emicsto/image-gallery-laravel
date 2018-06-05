<div class="container">

@if ($message = session('message'))
<div id="flash-message" class="alert alert-warning" role="alert">
{{$message}}
</div>
@endif

</div>
