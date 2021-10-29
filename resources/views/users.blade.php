@extends('layouts.dashboard')
@section('title','users list')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="success_message"></div>
                <div class="card">
                    <div class="card-header">
                        <h4>Users data</h4>
                    </div>
                    <div class="card-body">
                        <table class="table-bordered table-striped table text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function () {
            fetchUsers();
            function fetchUsers() {
                $.ajax({
                    type: "GET",
                    url: "/fetch-users",
                    dataType: "json",
                    success: function (response) {
                        // console.log(response.users);
                        $.each(response.users, function (key, item) {
                            $('tbody').append('<tr>\
                        <td>' + item.id + '</td>\
                        <td>' + item.name + '</td>\
                        <td>' + item.email + '</td>\
                        <td><button type="button" value="'+ item.id +'" class="edit-user btn btn-primary btn-sm">Edit</button></td>\
                        <td><button type="button" value="'+ item.id +'" class="edit-user btn btn-danger btn-sm">Delete</button></td>\
                    </tr>');

                        })
                    }
                })

            }
        })
    </script>
@endsection
