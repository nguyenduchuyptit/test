{{-- kế thừa thuộc tính,vv trang index --}}
@extends('admin.layouts.index')
{{-- câu lệnh để nhúng --}}
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Thêm</small>
                        </h1>
                    </div>
                    {{-- kiểm tra xem có nhận đc session thông báo lúc redirect lại không --}}

                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    @if (session('thongbao'))
                        <div class="alert alert-success" role="alert">
                            {!! session('thongbao') !!}
                        </div>
                    @endif
                    @if(count($errors) >0)
                        <div class="alert alert-warning" role="alert">
                            @foreach ($errors->all() as $err)
                                {!! $err !!}<br>
                            @endforeach
                        </div>
                    @endif
                        <form action="{{ url('admin/user/add') }}" method="POST">
                            <div class="form-group">
                                <label>Level</label>
                                <select class="form-control" name="quyen">
                                    <option @if(old('quyen')==0) {{ "selected" }} @endif value="0">Người dùng</option>
                                    <option @if(old('quyen')==1) {{ "selected" }} @endif  value="1">Cộng tác viên</option>
                                    <option @if(old('quyen')==2) {{ "selected" }} @endif  value="2">Quản trị viên</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" type="text" name="name" placeholder="Đừng bỏ trống" required value="{!! old('name') !!}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" placeholder="kaideptrai@gmail.com" value="{!! old('email') !!}" required/>
                            </div>
                            
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label>Nhập lại Password</label>
                                <input class="form-control" type="password" name="passwordAgain" placeholder="Password Again" required/>
                            </div>
                            
                            <button type="submit" class="btn btn-success">Add User</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection