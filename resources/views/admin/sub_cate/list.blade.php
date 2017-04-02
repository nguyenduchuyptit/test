@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sub Category</h1>
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
                            List Sub Category
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Tên Sub Category</th>
                                        <th class="text-center">Tên Không Dấu</th>
                                        <th class="text-center">Thuộc Category</th>
                                        <th class="text-center">Ngày tạo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                @php
                                    $stt=1;
                                @endphp
                                @foreach ($subcate as $sub)
                                
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $sub->ten }}</td>
                                        <td>{{ $sub->tenkodau }}</td>
                                        <td>{{ $sub->category->ten }}</td>
                                        <td>
                                            @php
                                                echo Carbon\Carbon::createFromTimestamp(strtotime($sub->created_at))->diffForHumans();
                                            @endphp
                                        </td>
                                        <td class="text-center" width="10%">
                                            <a href="admin/sub-category/edit/{{ $sub->id }}" class="font-20 text-success "><span class="fa fa-pencil-square-o"></span></a>&nbsp;&nbsp;
                                            <a href="admin/sub-category/delete/{{ $sub->id }}" class="font-20 text-danger"><span class="fa fa-times" onclick="return window.confirm('Bạn muốn xóa chứ?')"></span></a>
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
               {{ $subcate->render() }}
           </div>
</div>
@endsection
