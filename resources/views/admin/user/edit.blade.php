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
                            <small>Đang sửa: <small>{!! $user->name !!}</small></small>
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
                        <form action="{{ url('admin/user/edit/'.$user->id) }}" method="POST">
                            <div class="form-group">
                                <label>Level</label>
                                <select name="quyen" class="form-control" >
                                    <option value="0" 
                                        @if ($user->quyen==0)
                                            {!! "selected" !!}
                                        @endif
                                        >Người dùng</option>
                                    <option value="1"
                                        @if ($user->quyen==1)
                                            {!! "selected" !!}
                                        @endif
                                    >Cộng tác viên</option>
                                    <option value="2"
                                        @if ($user->quyen==2)
                                            {!! "selected" !!}
                                        @endif
                                    >Admin</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" type="text" name="name" placeholder="Đừng bỏ trống" required value="@if(old('name')) {{ old('name') }} @else {!! $user->name !!} @endif" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" placeholder="kaideptrai@gmail.com" readonly="" value="@if(old('email')) {{ old('email') }} @else {!! $user->email !!} @endif"/>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" id="changePassword" name="changePassword">&nbsp;Đổi mật khẩu
                                </label>
                                <input class="form-control password" type="password" name="password" placeholder="Nhập mật khẩu mới" disabled="" required/>
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input class="form-control password" type="password" name="passwordAgain" placeholder="Nhập lại mật khẩu" disabled="" required/>
                            </div>
                            
                            <button type="submit" class="btn btn-success">Sửa User</button>
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

@section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                //nếu trong input không có dấu tích thì
                if($(this).is(':checked'))
                {
                    $('.password').removeAttr('disabled');
                }
                else{
                    $('.password').attr('disabled','');
                }
            });
        });
    </script>
@endsection
