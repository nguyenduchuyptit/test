@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sub Footer Cate</h1>
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
                            List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Sub Category</th>
                                        <th>Tên Không Dấu</th>
                                        <th>Footer Cate</th>
                                        <th>Ngày</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $stt=1;
                                @endphp
                                @foreach ($subfooter as $sf)
                                
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $sf->ten }}</td>
                                        <td>{{ $sf->tenkodau }}</td>
                                        <td>{{ $sf->footer->ten }}</td>
                                        <td>
                                            {{ Carbon\Carbon::createFromTimestamp(strtotime($sf->created_at))->diffForHumans()  }}
                                        </td>
                                        <td class="text-center" width="10%">
                                            <a href="admin/sub-footer/edit/{{ $sf->id }}" class="font-20 text-success "><span class="fa fa-pencil-square-o"></span></a>&nbsp;&nbsp;
                                            <a href="admin/sub-footer/delete/{{ $sf->id }}" class="font-20 text-danger" onclick="return window.confirm('Bạn muốn xóa chứ?')"><span class="fa fa-times"></span></a>
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
               {{ $subfooter->render() }}
           </div>
</div>
@endsection
