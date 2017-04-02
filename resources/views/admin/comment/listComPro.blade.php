@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Comment Product</h1>
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
                            List Comment Product
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr class="center">
                                        <th>STT</th>
                                        <th>Comment</th>
                                        <th>Product</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                @php
                                    $stt=1;
                                @endphp
                                @foreach ($comPro as $com)
                                
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{!! $com->noidung !!}</td>
                                        <td>{{ $com->product->ten }}</td>
                                        <td>{{ $com->user->name }}</td>
                                        <td>
                                            @if ($com->created_at)
                                                {{ Carbon\Carbon::createFromTimestamp(strtotime($com->created_at))->diffForHumans()  }}
                                            @endif
                                        </td>
                                        <td class="text-center" width="10%">
                                            <a href="admin/comment-product/edit/{{ $com->id }}" class="font-20 text-success "><span class="fa fa-pencil-square-o"></span></a>&nbsp;&nbsp;
                                            <a onclick="return window.confirm('Bạn muốn xóa chứ?')" href="admin/comment-product/delete/{{ $com->id }}" class="font-20 text-danger"><span class="fa fa-times"></span></a>
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
           {{  $comPro->render() }}
            </div>
           
</div>
@endsection
