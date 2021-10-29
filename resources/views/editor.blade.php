@extends('layouts.dashboard')
@section('title','admin dashboard')
@section('content')
    <div class="row">
        <div class="container-fluid col-lg-6">
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
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                            <input id="title" type="text" name="title" class="form-control"
                                   aria-label="Sizing example input"
                                   aria-describedby="inputGroup-sizing-default">
                        </div>
                        <textarea class="form-control" id="ckeditor" name="ckeditor"></textarea>
                        <br>
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
        <div class="container-fluid col-lg-5 border border-danger " >
            <p id="formRequestErrors"></p>
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
                var txt = CKEDITOR.instances['ckeditor'].getData()
                jQuery.ajax({

                    url: "{{ url('/post/store') }}",
                    method: 'post',
                    data: {
                        title: jQuery('#title').val(),
                        ckeditor: txt,
                    },


                    success: function (result) {
                        jQuery('.alert').show();
                        jQuery('.alert').html(result.success);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        document.getElementById('formRequestErrors').innerHTML = XMLHttpRequest.responseText;
                    },

                });

            });
        });

    </script>
@endsection
