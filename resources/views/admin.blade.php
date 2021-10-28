@extends('layouts.dashboard')
@section('title','admin dashboard')


@if(Auth::user()->name == 'admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">

                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Posts Overview</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body" style="height: 450px">
                        <div class="chart-area">
                            <canvas id="canvas" height="280" width="600"></canvas>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
                            <script>
                                var year = <?php echo $week; ?>;
                                var user = <?php echo $postNo; ?>;
                                var barChartData = {
                                    labels: year,
                                    datasets: [{
                                        label: 'Number of posts each day',
                                        backgroundColor: '#f6c23e',
                                        data: user
                                    }]
                                };

                                window.onload = function() {
                                    var ctx = document.getElementById("canvas").getContext("2d");
                                    window.myBar = new Chart(ctx, {
                                        type: 'bar',
                                        data: barChartData,
                                        options: {
                                            elements: {
                                                rectangle: {
                                                    borderWidth: 2,
                                                    borderColor: '#c1c1c1',
                                                    borderSkipped: 'bottom'
                                                }
                                            },
                                            responsive: true,
                                            title: {
                                                display: true,
                                                text: 'Weekly posted'
                                            },
                                            scales: {
                                                yAxes: [{
                                                    display: true,
                                                    ticks: {
                                                        beginAtZero: true,
                                                        steps: 1,
                                                        stepValue: 5,
                                                        max: 10
                                                    }
                                                }]
                                            },
                                        }
                                    });
                                };
                            </script>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->

                    <!-- Card Body -->
                    <div class="card-body">
                        @foreach($lastUserPosts as $key => $value)
                        <div class="card posts border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300" style="display: inline-block;float: right;"></i>
                                        </div>
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            {{$value}}</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">{{$key}}</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
@endif
