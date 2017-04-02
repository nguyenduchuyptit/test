<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CustomOrder;
use Carbon\Carbon;
use DB;
use Charts;
class chartController extends Controller
{
    public function chart(){
    	// chart
    	$data=CustomOrder::all();
    	$chartday = Charts::database(CustomOrder::all(), 'bar', 'highcharts')
			->title('Chart Day')
			->x_axis_title('Day')
			->y_axis_title('Total')
		    ->elementLabel('total')
		    ->values($data->pluck('total'))
		    ->labels($data->pluck('created_at'))
		    ->dimensions(0, 1000)
		    ->responsive(true)
		    ->loader(true)
		    ->loaderDuration(100)
		    //->groupByDay()
		    ->colors(['#3C29F8', '#EC2AD3', '#EF3131'])
		    ->loaderColor('#FF0000');
		// end chart
		
		// chart
    	$chartmonth = Charts::database(CustomOrder::all(), 'bar', 'highcharts')
			->title('Chart Month')
			->x_axis_title('Month')
			->y_axis_title('Total')
		    ->elementLabel("Chart Month")
		    ->dimensions(0, 1000)
		    ->responsive(true)
		    ->groupByMonth()
		    ->loader(true)
		    ->loaderDuration(2000)
		    ->loaderColor('#FF0000');
		// end chart
		
		// chart
    	$chartyear = Charts::database(CustomOrder::all(), 'bar', 'highcharts')
			->title('Chart Year')
			->x_axis_title('Year')
			->y_axis_title('Total')
		    ->elementLabel("Chart Year")
		    ->dimensions(0, 1000)
		    ->responsive(true)
		    ->groupByYear()
		    ->loader(true)
		    ->loaderDuration(3000)
		    ->colors(['#0EFBC6', '#0EFBC6', '#0EFBC6'])
		    ->loaderColor('#FF0000');
		// end chart
		
    	return view('admin.chart.chart',['chartday'=>$chartday,'chartmonth'=>$chartmonth,'chartyear'=>$chartyear]);
    }
    public function day(){
    	$now= Carbon::now();
    	//lấy từ 0h ngày hn
    	$today= Carbon::today();
    	
    	$day= CustomOrder::orderBy('created_at','asc')->whereBetween('created_at',[$today,$now])->paginate(50);
    	$sumday= CustomOrder::whereBetween('created_at',[$today,$now])->sum('total');
    	
    	return view('admin.chart.day',['day'=>$day,'sumday'=>$sumday,'chart'=>$chart]);

    }
    public function week(){
    	$now= Carbon::now();
    	//lấy t2 của tuần hiện tại
    	$sweek = Carbon::now()->startOfWeek()->toDateString();

    	$week= CustomOrder::orderBy('created_at','asc')->whereBetween('created_at',[$sweek,$now])->paginate(50);
    	$sumweek= CustomOrder::whereBetween('created_at',[$sweek,$now])->sum('total');

    	
    	return view('admin.chart.week',['week'=>$week,'sumweek'=>$sumweek]);

    }

    public function month(){
    	$now= Carbon::now();

    	//lấy ngày đầu tiên của tháng hiện tại
    	$smonth = Carbon::now()->startOfMonth()->toDateString();
    	
    	$month= CustomOrder::orderBy('created_at','asc')->whereBetween('created_at',[$smonth,$now])->paginate(50);
    	$summonth=CustomOrder::whereBetween('created_at',[$smonth,$now])->sum('total');

    	
    	return view('admin.chart.month',['month'=>$month,'summonth'=>$summonth]);

    }

    public function year(){
    	$now= Carbon::now();

    	//lấy ngày đầu tiên của năm hiện tại
    	$syear = Carbon::now()->startOfYear()->toDateString();

    	$year= CustomOrder::orderBy('created_at','asc')->whereBetween('created_at',[$syear,$now])->paginate(50);
    	$sumyear=CustomOrder::whereBetween('created_at',[$syear,$now])->sum('total');

    	
    	return view('admin.chart.year',['year'=>$year,'sumyear'=>$sumyear]);

    }

    // ajax day
    public function postday(Request $request){
    	if($request->ajax()){
    		$day= $request->day;
    		if($day==3) echo "ok";
    	}
    }
}
