<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="">
<link rel="icon" href="http://d2f0ora2gkri0g.cloudfront.net/bkasia204479_favicon_1.ico"> {{-- Select2 --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<meta name="_token" content="{{ csrf_token() }}"/>

<!-- Custom styles for this template -->
{{--<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">--}}

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
{{--<link href="/css/blog.css" rel="stylesheet">--}}
{{--<link rel="stylesheet" href="{{asset('css/material-kit.css?v=2.0.3')}}">--}}

{{--<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">--}}
<link rel="stylesheet" href="{{ asset('css/image-gallery.css') }}">
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}

<!--     Fonts and icons     -->
{{--<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />--}}
<!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

{{--<link rel="stylesheet" href="{{asset('css/nucleo-icons.css')}}">--}}


<!--     Fonts and icons     -->
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>

<script language="JavaScript" type="text/javascript">
    $(document).ready(function(){
        $(".delete").click(function(e){
            if(!confirm('Are you sure?')){
                e.preventDefault();
                return false;
            }
            return true;
        });
    });
</script>


