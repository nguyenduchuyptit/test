@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Blog</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
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
                                        <th>Tên KH</th>
                                        <th>Sđt</th>
                                        <th>Địa chỉ</th>
                                        <th>Message</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Giao</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody >
                                @php
                                    $stt=1;
                                @endphp
                                @foreach ($customer as $cus)
                                    <tr class="text-center">
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $cus->user->name }}</td>
                                        <td>{{ $cus->phone }}</td>
                                        <td>{{ $cus->address }}</td>
                                        <td>{{ $cus->message }}</td>
                                        <td>{{ $cus->subtotal }}$</td>
                                        <td>{{ Carbon\Carbon::createFromTimestamp(strtotime($cus->created_at))->diffForHumans() }}</td>
                                        <td>
                                            @if ($cus->status==0)
                                                {{ "Chưa" }}
                                            @else
                                                {{ "Đã" }}
                                            @endif
                                        </td>
                                        <td class="text-center" width="10%">
                                            <a href="admin/customer/detail/{{ $cus->id }}" class="font-20 text-success "><span class="fa fa-calendar"></span></a>&nbsp;&nbsp;
                                            <a onclick="return window.confirm('Bạn muốn xóa chứ?')" href="admin/customer/delete/{{ $cus->id }}" class="font-20 text-danger"><span class="fa fa-times"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <div class="text-center">
               {{ $customer->render() }}
           </div>
</div>
@endsection
