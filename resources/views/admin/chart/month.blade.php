@extends('admin.layouts.index')
@section('content')
<style type="text/css">
    .red{color: red;}
</style>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thống kê</h1>
                </div>
                <div class="col-lg-12" style="margin-bottom: 30px;">
                    <div class="form-group">
                      <label for="sel1">Chọn tháng:</label>
                      <form>
                      <select class="form-control" id="day">
                        @for ($i = 1; $i <= Carbon\Carbon::now()->month ; $i++)
                            <option>{{ $i }}</option>
                        @endfor
                      </select>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      </form>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        
            <div class="row">
                <div class="col-lg-12">
                    @if (session('thongbao'))
                        <div class="alert-success" style="line-height: 50px;">
                            <p style="margin-left:30px;">{{ session('thongbao') }}</p>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert-success" style="line-height: 50px;">
                            <p style="margin-left:30px;">{{ session('success') }}</p>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert-danger" style="line-height: 50px;">
                            <p style="margin-left:30px;">{{ session('error') }}</p>
                        </div>
                    @endif
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Tháng này
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr class="center">
                                        <th>STT</th>
                                        <th>Tên Sp</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Tổng</th>
                                        <th>Thời Gian</th>
                                    </tr>
                                </thead>
                                <tbody >
                                @php
                                    $stt=1;
                                @endphp
                                @foreach ($month as $thang)
                                
                                    <tr class="text-center">
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $thang->product->ten }}</td>
                                        <td>{{ $thang->qty }}</td>
                                        <td>{{ $thang->price }} $</td>
                                        <td>{{ $thang->total }} $</td>
                                        <td>
                                            {{ Carbon\Carbon::createFromTimestamp(strtotime($thang->created_at))->diffForHumans() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="text-center">
                                {{ $month->render() }}
                            </div>
                            <div class="col-md-12">
                                <p style="float: right;font-size: 18px; margin-top:7px;">Tổng tháng: <span class="red">{{ $summonth }}$</span></p>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
           <div class="text-center">
           </div>
</div>
@endsection
