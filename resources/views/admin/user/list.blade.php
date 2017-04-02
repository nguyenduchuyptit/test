@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users</h1>
                    
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
                            List Users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Chức vụ</th>
                                        <th>Ngày Đăng ký</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $stt=1;
                                @endphp
                                @foreach ($user as $us)
                                    <tr>
                                        <td>{!! $stt++ !!}</td>
                                        <td>{!! $us->name !!}</td>
                                        <td>{!! $us->email !!}</td>
                                        <td>
                                            @if($us->quyen==2)
                                                {{ "Admin" }}
                                            @elseif($us->quyen==1)
                                                {{ "Cộng tác viên" }}
                                            @else {!! "Người dùng" !!}
                                            @endif

                                        </td>
                                        <td>
                                            @php
                                                echo Carbon\Carbon::createFromTimestamp(strtotime($us->created_at))->diffForHumans();
                                            @endphp
                                        </td>
                                        <td class="text-center" width="10%">
                                            <a href="admin/user/edit/{{ $us->id }}" class="font-20 text-success "><span class="fa fa-pencil-square-o"></span></a>&nbsp;&nbsp;
                                            <a onclick="return window.confirm('Bạn muốn xóa chứ?')" href="admin/user/delete/{{ $us->id }}" class="font-20 text-danger"><span class="fa fa-times"></span></a>
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
           
</div>
@endsection

@section('script')

    <!-- DataTables JavaScript -->
    <script src="admin_asset/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <!-- phân trang -->
    <script src="admin_asset/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <!-- end phân trang -->
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
@endsection