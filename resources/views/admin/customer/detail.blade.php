@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">

            <div class="row">
                <div class="col-lg-10 col-md-offset-1">
                    <h1 class="page-header">Order Detail</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10 col-md-offset-1">
                    @if (session('thongbao'))
                        <div class="alert-success" style="line-height: 50px;">
                            <p style="margin-left:30px;">{{ session('thongbao') }}</p>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert-danger" style="line-height: 50px;">
                            <p style="margin-left:30px;">{{ session('error') }}</p>
                        </div>
                    @endif
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List Blog
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr class="center">
                                        <th>STT</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody >
                                @php
                                    $stt=1;
                                @endphp
                                @foreach ($ord as $or)
                                
                                    <tr class="text-center">
                                        <td>{{ $stt++ }}</td>
                                        <td>
                                            <img width="150px" src="upload/product/{{ $or->product->hinh }}">
                                        </td>
                                        <td>{{ $or->product->ten }}</td>
                                        <td>{{ $or->qty }}</td>
                                        <td>{{ number_format($or->price) }}$</td>
                                        <td>{{ number_format($or->total) }}$</td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                        <div style="float:right;">
                        <form method="post">
                            <label>
                                <input type="checkbox" name="giaohang" value="1">Giao Hàng
                            </label><br>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" value="Giao Hàng" class="btn btn-success">
                        </form>
                        </div>

                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <div class="text-center">
           </div>
</div>
@endsection
