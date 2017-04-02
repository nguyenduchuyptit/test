{{-- kế thừa thuộc tính,vv trang index --}}
@extends('admin.layouts.index')
{{-- câu lệnh để nhúng --}}
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Blog
                            <small>Add Blog</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    <div class="col-lg-12 table-responsive" style="padding-bottom:120px">

                        @if(count($errors) > 0 )
                            <div class="alert alert-danger">
                                {{-- gọi đến tất cả các lỗi có thể xảy ra --}}
                                @foreach ($errors->all() as $loi)
                                    {!! $loi !!}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{-- gọi đến tất cả các lỗi có thể xảy ra --}}
                                {{ session('error') }}
                            </div>
                        @endif

                        {{-- kiểm tra xem có nhận đc session thông báo lúc redirect lại không --}}
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {!! session('thongbao') !!}
                            </div>
                        @endif
                        <form action="{{ url('admin/blog/add') }}" method="POST" enctype="multipart/form-data">
                            <table class="table table-striped">
                                <div class="form-group">
                                    <label>Blog Name</label>
                                    <input class="form-control" name="Ten" placeholder="Đừng bỏ trống" required value="{!! old('Ten') !!}" />
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="demo" class="form-control ckeditor" rows="3" name="TomTat" required >{!! old('TomTat') !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea id="demo" class="form-control ckeditor" rows="3" name="NoiDung" required >{!! old('NoiDung') !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="Image"/>
                                </div>
                                <div class="form-group">
                                    <label>Nổi Bật</label>
                                    <label class="radio-inline">
                                        <input @if(old('NoiBat')==1) {{ "checked" }} @endif name="NoiBat" value="1"  type="radio">Có
                                    </label>
                                    <label class="radio-inline">
                                        <input @if(old('NoiBat')==0) {{ "checked" }} @endif name="NoiBat" value="0" type="radio">Không
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success">Add Blog</button>&nbsp;
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            </table>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
