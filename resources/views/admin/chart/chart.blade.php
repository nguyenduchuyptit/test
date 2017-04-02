@extends('admin.layouts.index')
@section('chart')
    {!! Charts::assets() !!}
@endsection
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thống kê</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           {{--  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Line Chart Example
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pie Chart Example
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-pie-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Multiple Axes Line Chart Example
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart-multi"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Moving Line Chart Example
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart-moving"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Bar Chart Example
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-bar-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div> --}}

            <div class="row">
                <center>
                    {!! $chartday->render() !!}
                </center>
            </div>
            <!-- /.row -->

            <div class="row" style="margin-top: 50px;">
                <center>
                    {!! $chartmonth->render() !!}
                </center>
            </div>
            <!-- /.row -->

            <div class="row"  style="margin-top: 50px;">
                <center>
                    {!! $chartyear->render() !!}
                </center>
            </div>
            <!-- /.row -->
        </div>
<!-- /#page-wrapper -->
@endsection

@section('script')
 <!-- Flot Charts JavaScript -->
    <script src="admin_asset/vendor/flot/excanvas.min.js"></script>
    <script src="admin_asset/vendor/flot/jquery.flot.js"></script>
    <script src="admin_asset/vendor/flot/jquery.flot.pie.js"></script>
    <script src="admin_asset/vendor/flot/jquery.flot.resize.js"></script>
    <script src="admin_asset/vendor/flot/jquery.flot.time.js"></script>
    <script src="admin_asset/vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="admin_asset/data/flot-data.js"></script>
@endsection