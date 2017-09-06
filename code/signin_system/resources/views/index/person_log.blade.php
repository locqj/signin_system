@extends('index.layouts.nav')

@section('body')
<style>
.chart {
	height: 200px;
	margin: 0px;
	padding: 0px;
}
h5 {
	margin-top: 30px;
	font-weight: bold;
}
h5:first-child {
	margin-top: 15px;
}
.mui-table h4,.mui-table h5,.mui-table .mui-h5,.mui-table .mui-h6,.mui-table p{
    margin-top: 0;
}
.mui-table h4{
    line-height: 21px;
    font-weight: 500;
}

.mui-table .oa-icon{
    position: absolute;
    right:0;
    bottom: 0;
}
.mui-table .oa-icon-star-filled{
    color:#f14e41;
}
</style>

<div class="mui-content-padded">
	<p style="text-indent: 22px;">个人记录，记录打卡总次数，每天打卡次数，最高连击等相关信息。。。</a>
	</p>
</div>
<ul class="mui-table-view">
<li class="mui-table-view-cell">
		<img src="{{ $user->head_img }}" class="ul-li-img"><span class="ul-li-span">{{ $user->nickname }}的个人打卡记录</span>
	</li>
	<li class="mui-table-view-cell data-con"></li>
	<li class="mui-table-view-cell data-count"></li>
</ul>
<div class="mui-content-padded">
	<!-- <h5>柱图示例</h5>
	<div class="chart" id="barChart"></div> -->
	<h5>近十日打卡记录</h5>
	<div class="chart" id="lineChart"></div>
	<!-- <h5>饼图示例</h5>
	<div class="chart" id="pieChart"></div> -->
</div>
<div class="mui-content-padded">
	<h5>近十次打卡记录</h5>
	<ul class="mui-table-view lastlog">
		<li class="mui-table-view-cell clone_block">
            <div class="mui-table">
                <div class="mui-table-cell mui-col-xs-10">
                    <h4 class="mui-ellipsis-2">信息化推进办公室张彦合同付款信息化推进办公室张彦合同付款信息化推进办公室张彦合同付款</h4>
                    <h5>申请人：李四</h5>
                    <p class="mui-h6 mui-ellipsis">Hi，李明明，申请交行信息卡，100元等你拿，李明明，申请交行信息卡，100元等你拿，</p>
                </div>
                <div class="mui-table-cell mui-col-xs-2 mui-text-right">
                    <span class="mui-h5">12:25</span>
                     
                </div>
            </div>
        </li>
	</ul>
</div>
<script src="{{ asset('mui-master/examples/hello-mui/libs/echarts-all.js') }}"></script>
<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery-1.11.1.js"></script>

<script>
	$.get('/api/index/personlog', function(data) {
		if (data.code == 200) {
			var con_msg = '最高连续打卡数为：'+data.data.res.con;
			var count_msg = '历史打卡天数为：'+data.data.res.count;
			$('.data-con').text(con_msg);
			$('.data-count').text(count_msg);
			var getOption = function(chartType) {
				var chartOption = chartType == 'pie' ? {
					calculable: false,
					series: [{
						name: '访问来源',
						type: 'pie',
						radius: '65%',
						center: ['50%', '50%'],
						data: [{
							value: 335,
							name: '直接访问'
						}, {
							value: 310,
							name: '邮件营销'
						}, {
							value: 234,
							name: '联盟广告'
						}, {
							value: 135,
							name: '视频广告'
						}, {
							value: 1548,
							name: '搜索引擎'
						}]
					}]
				} : {
					legend: {
						data: ['日均打卡次数']
					},
					grid: {
						x: 35,
						x2: 10,
						y: 30,
						y2: 25
					},
					toolbox: {
						show: false,
						feature: {
							mark: {
								show: true
							},
							dataView: {
								show: true,
								readOnly: false
							},
							magicType: {
								show: true,
								type: ['line', 'bar']
							},
							restore: {
								show: true
							},
							saveAsImage: {
								show: true
							}
						}
					},
					calculable: false,
					xAxis: [{
						type: 'category',
						data: data.data.res.date
					}],
					yAxis: [{
						type: 'value',
						splitArea: {
							show: true
						}
					}],
					series: [{
						name: '日均打卡次数',
						type: chartType,
						data: data.data.res.date_count
					}]
				};
				return chartOption;
			};
			var byId = function(id) {
				return document.getElementById(id);
			};
			// var barChart = echarts.init(byId('barChart'));
			// barChart.setOption(getOption('bar'));
			var lineChart = echarts.init(byId('lineChart'));
			lineChart.setOption(getOption('line'));
		}
	});
	/*最新十条数据*/
	$.get('/api/index/personlistlog', function(data) {
		if (data.code == 200) {
			var clone_block = $('.clone_block');
            $.each(data.data, function(key, val) {
                var clo = clone_block.clone(true);
                $(clo).removeClass('clone_block');
                var title_msg = '项目名称：'+val.action.name;
                $(clo).children('div').children('div').children('h4').text(title_msg);
                var date_msg = val.month+'-'+val.day;
                $(clo).children('div').children('div').eq(1).children('span').text(date_msg);
                var tag_time_msg = '打卡时间：'+val.created_at;
                $(clo).children('div').children('div').children('h5').text(tag_time_msg);
                var tag_log_msg = '心情：'+val.moon.name+', 读物：'+val.tag.name;
                $(clo).children('div').children('div').children('p').text(tag_log_msg);
                
                $(clo).show();
                $('.lastlog').append(clo);
            });
		}
	});
</script>
@endsection