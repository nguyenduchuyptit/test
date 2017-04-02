{{-- kế thừa thuộc tính,vv trang index --}}
@extends('admin.layouts.index')
{{-- câu lệnh để nhúng --}}
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Comment Blog
                            <small>Edit Comment</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    {{-- kiểm tra xem có tồn tại lỗi không rồi in ra --}}
                        @if(count($errors) > 0 )
                            <div class="alert alert-danger">
                                {{-- gọi đến tất cả các lỗi có thể xảy ra --}}
                                @foreach ($errors->all() as $loi)
                                    {!! $loi !!}<br>
                                @endforeach
                            </div>
                        @endif

                        {{-- kiểm tra xem có nhận đc session thông báo lúc redirect lại không --}}
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {!! session('thongbao') !!}
                            </div>
                        @endif
                        
                        <form action="{{ url('admin/comment-blog/edit/'.$comBlog->id) }}" method="POST">
                            <div class="form-group">
                                <label>User</label>
                                <select class="form-control" name="User">
                                @foreach ($user as $ur)
                                    <option value="{!! $ur->id !!}"
                                        @if ($comBlog->idUser==$ur->id)
                                            {{ "selected" }}
                                        @endif
                                    >{!! $ur->name !!}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Blog</label>
                                <select class="form-control" name="Blog">
                                @foreach ($blog as $bl)
                                    <option  value="{!! $bl->id !!}"
                                        @if ($comBlog->idBlog==$bl->id)
                                            {{ "selected" }}
                                        @endif

                                    >{!! $bl->tieude !!}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Comment</label>
                                <textarea id="demo" class="form-control ckeditor" name="NoiDung">@if(old('NoiDung')) {!! old('NoiDung') !!} @else {{   $comBlog->noidung }} @endif</textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Edit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                             {{-- KHÔNG BAO GIỜ ĐƯỢC THIẾU TOKEN --}}
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