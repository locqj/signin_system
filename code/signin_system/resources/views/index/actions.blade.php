@extends('index.layouts.nav')

@section('body')
	<div class="mui-card">
		<div class="mui-card-header mui-card-media">
			<img src="{{ asset('mui-master/examples/hello-mui/images/logo.png') }}">
			<div class="mui-media-body">
				xxx项目打卡
				<p>当前时间 2016-06-30 15:30</p>
			</div>
			<!--<img class="mui-pull-left" src="../images/logo.png" width="34px" height="34px" />
			<h2>小M</h2>
			<p>发表于 2016-06-30 15:30</p>-->
		</div>
		<div class="mui-card-content">
			<img src="{{ asset('mui-master/examples/hello-mui/images/yuantiao.jpg') }}" alt="" width="100%">
		</div>
		<div class="mui-card-footer">
			<a class="mui-card-link">start</a>
			<a class="mui-card-link">reset</a>
			<a class="mui-card-link">stop</a>
		</div>
			<div id="demo2">
					<h5>动态创建内联进度条及销毁</h5>
					<p style="height: 2px;"></p>
					<button type="button" class="mui-btn mui-btn-primary mui-btn-block mui-btn-outlined">開始</button>
			</div>
			<button type="button" class="mui-btn mui-btn-primary mui-btn-block mui-btn-outlined">00:00</button>
			<button type="button" class="mui-btn mui-btn-primary mui-btn-block mui-btn-outlined">00:00</button>
	</div>
	<script src="{{ asset('mui-master/examples/hello-mui/js/mui.min.js') }}"></script>
	<script src="{{ asset('mui-master/examples/hello-mui/js/update.js') }}" type="text/javascript" charset="utf-8"></script>
	<script>
		/**
		 * 通过随机数模拟业务进度，真实业务中需根据实际进度修改
		 * @param {Object} container
		 * @param {Object} progress
		 */
		function simulateLoading(container, progress) {
			if (typeof container === 'number') {
				progress = container;
				container = 'body';
			}
			setTimeout(function() {
				progress += Math.random() * 20; //间隔
				mui(container).progressbar().setProgress(progress);
				if (progress < 100) {
					simulateLoading(container, progress);
				} else {
					mui(container).progressbar().hide();
				}
			}, Math.random() * 200 + 200);
		}
		//动态创建内联进度条
		mui("#demo2").on('tap', '.mui-btn', function() {
			var container = mui("#demo2 p");
			console.log(container);
			if (container.progressbar({
					progress: 0
				}).show()) {
				simulateLoading(container, 0);
			}
		});
		
	</script>
@endsection