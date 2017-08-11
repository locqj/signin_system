@extends('index.layouts.nav')

@section('body')
<div class="mui-card">
	<div class="mui-card-header mui-card-media">
		<img src="{{ asset('mui-master/examples/hello-mui/images/logo.png') }}">
		<div class="mui-media-body">
			{{ $data->name }}
			<p id="nowTime"></p>
		</div>
		<!--<img class="mui-pull-left" src="../images/logo.png" width="34px" height="34px" />
		<h2>小M</h2>
		<p>发表于 2016-06-30 15:30</p>-->
	</div>
	<div class="mui-card-content">
		<img src="{{ asset('mui-master/examples/hello-mui/images/yuantiao.jpg') }}" alt="" width="100%">
	</div>
	<div class="mui-card-footer">
		
	</div>
	@if($data->blade_status == 1)
		<div id="countdown-dev">
				<h5>進度：</h5>
				<p class="mui-progressbar mui-progressbar-success"><span></span></p>
				<button type="button" class="mui-btn mui-btn-primary mui-btn-block mui-btn-outlined actions_start_1">打卡</button>
		</div>
	@else
		<div id="countdown-dev">
				<button type="button" class="mui-btn-primary mui-btn-block mui-btn-outlined actions_start_0">打卡</button>
		</div>
	@endif
		<button type="button" class="mui-btn-primary mui-btn-block mui-btn-outlined countdown"></button>
</div>
<script src="{{ asset('mui-master/examples/hello-mui/js/mui.min.js') }}"></script>
<script src="{{ asset('mui-master/examples/hello-mui/js/update.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery-1.11.1.js"></script>

<script>
	/**
	 * 通过随机数模拟业务进度，真实业务中需根据实际进度修改
	 * @param {Object} container
	 * @param {Object} progress
	 */
	function simulateLoading(container, progress, endprogress) {
		if (typeof container === 'number') {
			progress = container;
			container = 'body';
		}
		setTimeout(function() {
			progress += 1;
			intent_now = parseFloat(progress / endprogress) * 100;
			console.log(intent_now)
			if (intent_now <= 75 && intent_now > 50) {
				$("#countdown-dev p").removeClass('mui-progressbar-success');
				$("#countdown-dev p").addClass('mui-progressbar-warning');
			} else if (intent_now <= 100 && intent_now > 75) {
				$("#countdown-dev p").removeClass('mui-progressbar-warning');
				$("#countdown-dev p").addClass('mui-progressbar-danger');
			}
			mui(container).progressbar().setProgress(intent_now);
			if (progress <= endprogress) {
				simulateLoading(container, progress, endprogress);
			} else {
				mui(container).progressbar().hide();
			}
		}, 1000);
	}
	//动态创建内联进度条
	mui("#countdown-dev").on('tap', '.actions_start_1', function() {
		var container = mui("#countdown-dev p");
		$('.countdown').show();
		var countdown = {{ $data->time_length }};
		if (container.progressbar({
				progress: 0
			}).show()) {
			simulateLoading(container, progress, countdown);
		}
		var interval = setInterval(function(){
			countdown--;
			$(".countdown").html(formatSeconds(countdown));
			if(countdown == 0) {
				clearInterval(interval);
				window.location.href = '/index/taglog/{{ $data->code }}';
			}
		},1000);
		
	});
	
</script>
<script type="text/javascript"> 
	/*獲取當前時間*/
	function current(){ 
		var d=new Date(),str=''; 
		str +=d.getFullYear()+'年'; //获取当前年份 
		str +=d.getMonth()+1+'月'; //获取当前月份（0——11） 
		str +=d.getDate()+'日'; 
		str +=d.getHours()+'时'; 
		str +=d.getMinutes()+'分'; 
		str +=d.getSeconds()+'秒'; 
		return str; 
	}
	setInterval(function(){$("#nowTime").html(current)},1000); 
	/*倒計時*/
	function formatSeconds(value) {
	    var theTime = parseInt(value);// 秒
	    var theTime1 = 0;// 分
	    var theTime2 = 0;// 小时
	    if(theTime > 60) {
	        theTime1 = parseInt(theTime/60);
	        theTime = parseInt(theTime%60);
	            if(theTime1 > 60) {
	            theTime2 = parseInt(theTime1/60);
	            theTime1 = parseInt(theTime1%60);
	            }
	    }
	        var result = ""+parseInt(theTime)+"秒";
	        if(theTime1 > 0) {
	        result = ""+parseInt(theTime1)+"分"+result;
	        }
	        if(theTime2 > 0) {
	        result = ""+parseInt(theTime2)+"小时"+result;
	        }
	    return result;
	}

	$('.actions_start_0').click(function() {
		window.location.href = '/index/taglog/{{ $data->code }}';
	});
</script>
@endsection