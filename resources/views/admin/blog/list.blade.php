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
                                        <th>Image</th>
                                        <th>Tiêu đề</th>
                                        <th>Mô tả</th>
                                        <th>Người đăng</th>
                                        <th>Nổi bật</th>
                                        <th>View</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody >
                                @php
                                    $stt=1;
                                @endphp
                                @foreach ($blog as $bl)
                               
                                    <tr class="text-center">
                                        <td>{{ $stt++ }}</td>
                                        <td>
                                            @if ($bl->hinh!='')
                                                <img style="width: 200px" src="upload/blog/{{ $bl->hinh }}">
                                            @endif
                                        </td>
                                        <td>{{ $bl->tieude }}</td>
                                        <td>{{ $bl->tomtat }}</td>
                                        <td>{{ $bl->user->name }}</td>
                                        <td>
                                            @if ($bl->noibat==1)
                                                {{"Có"}}
                                            @else {{ "Không" }}
                                            @endif
                                        </td>
                                        <td>{{ $bl->soluotxem }}</td>
                                        <td class="text-center" width="10%">
                                            <a href="admin/blog/edit/{{ $bl->id }}" class="font-20 text-success "><span class="fa fa-pencil-square-o"></span></a>&nbsp;&nbsp;
                                            <a onclick="return window.confirm('Bạn muốn xóa chứ?')" href="admin/blog/delete/{{ $bl->id }}" class="font-20 text-danger"><span class="fa fa-times"></span></a>
                                        </td>
                                    </tr>
                                </tbody>

                                @endforeach

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
               {{ $blog->render() }}
           </div>
</div>
@endsection
