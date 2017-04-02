        {{-- kế thừa thuộc tính,vv trang index --}}
     @extends('admin.layouts.index')
        {{-- câu lệnh để nhúng --}}
        <!-- Page Content -->
    @section('content')
    <style type="text/css"> .center>th{text-align: center;} </style>
        <div id="page-wrapper">
            <div class="container-fluid">
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
                        <h1 class="page-header">Slide
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr class="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th >Hình Ảnh</th>
                                <th>Nội Dung</th>
                                <th>Link</th>
                                <th>Ngày</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $stt=1;
                        @endphp
                        @foreach ($slide as $sld)
                        
                            <tr class="odd gradeX" align="center">
                                <td>{!! $stt++ !!}</td>
                                <td>{!! $sld->ten !!}</td>
                                <td>
                                    @if ($sld->hinh)
                                        <img class="img-responsive" src="upload/slide/{!! $sld->hinh !!}" width="200px">
                                    @endif
                                    
                                </td>
                                <td>{!! $sld->noidung !!}</td>
                                <td>{!! $sld->link !!}</td>
                                <td>
                                    {{ Carbon\Carbon::createFromTimestamp(strtotime($sld->created_at))->diffForHumans()  }}
                                </td>
                                <td class="text-center" width="10%">
                                    <a href="admin/slide/edit/{{ $sld->id }}" class="font-20 text-success "><span class="fa fa-pencil-square-o"></span></a>&nbsp;&nbsp;
                                    <a href="admin/slide/delete/{{ $sld->id }}" class="font-20 text-danger"><span class="fa fa-times" onclick="return window.confirm('Bạn muốn xóa chứ?')"></span></a>
                                </td>
                            </tr>
                        @endforeach   
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <div class="text-center">
            {{ $slide->render() }}
        </div>
    @endsection