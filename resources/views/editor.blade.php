@extends('layouts.dashboard')
@section('title','admin dashboard')
@section('content')

    <div class="container-fluid">
        <div class="alert alert-success" style="display:none"></div>
        <div class="row">
            <div class="col-lg-12">
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <p class="alert alert-danger">{{$error}}</p>
                    @endforeach
                @endif
            </div>
            <div class="col-xl-12 col-lg-12 ">
                <form action="{{route('content')}}" method="post">
                    @csrf
                    <textarea class="form-control" id="ckeditor" name="ckeditor"></textarea>
                    <br>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                        <input id="title" type="text" name="title" class="form-control" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-default">
                    </div>
                    <button type="submit" class="btn btn-primary" id="ajaxSubmit">Post</button>
{{--                    //move to public--}}
                    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
                    <script>
                        CKEDITOR.replace('ckeditor');
                    </script>
                </form>
            </div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    <script>
        jQuery(document).ready(function () {
            jQuery('#ajaxSubmit').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({

                    url: "{{ url('/post/store') }}",
                    method: 'post',
                    data: {
                        title: jQuery('#title').val(),
                        ckeditor: jQuery('textarea#ckeditor').val(),
                    },


                    success: function (result) {
                        jQuery('.alert').show();
                        jQuery('.alert').html(result.success);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log('AJAX error:', XMLHttpRequest)
                    }

                });
                var text = $('textarea#ckeditor').val();
                console.log(text);

            });
        });
    </script>
@endsection
