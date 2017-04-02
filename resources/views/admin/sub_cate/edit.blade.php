    {{-- kế thừa thuộc tính,vv trang index --}}
    @extends('admin.layouts.index')
        {{-- câu lệnh để nhúng --}}
        <!-- Page Content -->
    @section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sub Category
                            <small>Đang Sửa: {!! $subcate->ten !!}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                     {{-- kiểm tra tồn tại lỗi, đếm số lỗi --}}
                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            {{-- lấy tất cả lỗi --}}
                            @foreach ($errors->all() as $loi)
                                {{ $loi }}<br>
                            @endforeach
                        </div>
                    @endif
                    
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{ session('thongbao') }}
                        </div>
                    @endif
                        <form action="{{ url('admin/sub-category/edit/'.$subcate->id) }}" method="POST">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="Category">
                                    @foreach ($category as $cate)
                                    <option 
                                        @if($subcate->idCate==$cate->id)
                                            {{ "selected" }}
                                        @endif 
                                    value="{!! $cate->id !!}">{!! $cate->ten !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Category</label>
                                <input class="form-control" name="Ten" placeholder="Vui lòng đừng bỏ trống" value="@if(old('Ten')) {!! old('Ten') !!} @else {!! $subcate->ten !!} @endif" />
                            </div>
                            <button type="submit" class="btn btn-success">Edit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    @endsection