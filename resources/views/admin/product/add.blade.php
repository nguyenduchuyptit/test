{{-- kế thừa thuộc tính,vv trang index --}}
@extends('admin.layouts.index')
{{-- câu lệnh để nhúng --}}
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Add Product</small>
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
                        <form action="{{ url('admin/product/add') }}" method="POST" enctype="multipart/form-data">
                            <table class="table table-striped">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="Category" id="Category">
                                    @foreach ($category as $cate)
                                        <option @if(old('Category')==$cate->id) {{ "selected" }} @endif value="{!! $cate->id !!}">{!! $cate->ten !!}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Sub Category</label>
                                    <select class="form-control" name="Subcate" id="Subcate">
                                        @foreach ($subcate as $sub)
                                        <option @if(old('Subcate')==$sub->id) {{ "selected" }} @endif value="{!! $sub->id !!}">{!! $sub->ten !!}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select class="form-control" name="Brand">
                                        @foreach ($brand as $bra)
                                        <option @if(old('Brand')==$bra->id) {{ "selected" }} @endif value="{!! $bra->id !!}">{!! $bra->ten !!}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product</label>
                                    <input class="form-control" name="Ten" placeholder="Đừng bỏ trống" value="{!! old('Ten') !!}" />
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="form-control" name="TomTat" placeholder="Đừng bỏ trống" value="{!! old('TomTat') !!}"/>
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea id="demo" class="form-control ckeditor" rows="3" name="NoiDung">{!! old('NoiDung') !!}</textarea>
                                </div>
                               
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" min="0" class="form-control" name="Price" placeholder="Đừng bỏ trống" required value="{!! old('Price') !!}" />
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" min="0" class="form-control" name="Quantity" placeholder="Đừng bỏ trống" required value="{!! old('Quantity') !!}"/>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="Image"/>
                                </div>
                                <div class="form-group">
                                    <label>Image 2</label>
                                    <input type="file" name="Image2"/>
                                </div>
                                <div class="form-group">
                                    <label>Image 3</label>
                                    <input type="file" name="Image3"/>
                                </div>
                                <div class="form-group">
                                    <label>Nổi Bật</label>
                                    <label class="radio-inline">
                                        <input @if(old('NoiBat')==1) {!! "checked" !!} @endif name="NoiBat" value="1"  type="radio">Có
                                    </label>
                                    <label class="radio-inline">
                                        <input @if(old('NoiBat')==0) {!! "checked" !!} @endif name="NoiBat" value="0" type="radio">Không
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success">Add Product</button>&nbsp;
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

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#Category").change(function()
            {
                var idCate = $(this).val();
                $.get('admin/ajax/subcate/'+idCate,function(data){
                    $('#Subcate').html(data);
                });
            });
        });
    </script>
@endsection