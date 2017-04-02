@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
<style type="text/css">
    .text-mid>th{ text-align: center; }
</style>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
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
                        <div class="panel-heading">
                            List Product
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr class="text-mid">
                                        <th>STT</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Brand</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>View</th>
                                        <th>Hot</th>
                                        <th>Quantity</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                @php
                                    $stt=1;
                                @endphp
                                @foreach ($product as $pro)
                                
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>
                                            @if ($pro->hinh)
                                                <img src="upload/product/{{ $pro->hinh }}" style="width: 100px;">
                                            @endif
                                        </td>
                                        <td>{{ $pro->ten }}</td>
                                        <td>{{ $pro->gia }} $</td>
                                        <td>{{ $pro->brand->ten }}</td>
                                        <td>{{ $pro->subcate->ten }}</td>
                                        <td>{!! $pro->tomtat !!}</td>
                                        <td>{!! $pro->soluotxem !!}</td>
                                        <td>
                                            @if ($pro->noibat==1)
                                                {{ "Có" }}
                                            @else {{ "Không" }}
                                            @endif
                                        </td>
                                        <td>{{ $pro->soluong }}</td>
                                        <td class="text-center" width="10%">
                                            <a href="admin/product/edit/{{ $pro->id }}" class="font-20 text-success "><span class="fa fa-pencil-square-o"></span></a>&nbsp;&nbsp;
                                            <a onclick="return window.confirm('Bạn muốn xóa chứ?')" href="admin/product/delete/{{ $pro->id }}" class="font-20 text-danger"><span class="fa fa-times" ></span></a>
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
              {{ $product->render() }}
           </div>
</div>
@endsection
