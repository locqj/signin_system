@extends('index.layouts.nav')

@section('body')
        	<div class="mui-card">
	        	<ul class="mui-table-view matters">
					 <li class="mui-table-view-cell clone_block"><span></span><span style="float: right">test</span></li>
				</ul>
				<div id="slider" class="mui-slider" >
				<div class="mui-slider-group mui-slider-loop">
					<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
					<div class="mui-slider-item mui-slider-item-duplicate">
						<a href="#">
							<img src="{{ asset('mui-master/examples/hello-mui/images/yuantiao.jpg') }}">
						</a>
					</div>
					<!-- 第一张 -->
					<div class="mui-slider-item">
						<a href="#">
							<img src="{{ asset('mui-master/examples/hello-mui/images/shuijiao.jpg') }}">
						</a>
					</div>
					<!-- 第二张 -->
					<div class="mui-slider-item">
						<a href="#">
							<img src="{{ asset('mui-master/examples/hello-mui/images/muwu.jpg') }}">
						</a>
					</div>
					<!-- 第三张 -->
					<div class="mui-slider-item">
						<a href="#">
							<img src="{{ asset('mui-master/examples/hello-mui/images/cbd.jpg') }}">
						</a>
					</div>
					<!-- 第四张 -->
					<div class="mui-slider-item">
						<a href="#">
							<img src="{{ asset('mui-master/examples/hello-mui/images/yuantiao.jpg') }}">
						</a>
					</div>
					<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
					<div class="mui-slider-item mui-slider-item-duplicate">
						<a href="#">
							<img src="{{ asset('mui-master/examples/hello-mui/images/shuijiao.jpg') }}">
						</a>
					</div>
				</div>
				<div class="mui-slider-indicator">
					<div class="mui-indicator mui-active"></div>
					<div class="mui-indicator"></div>
					<div class="mui-indicator"></div>
					<div class="mui-indicator"></div>
				</div>
			</div>
				<div class="mui-card-content">
					<div class="mui-card-content-inner">
						<p>Posted on January 18, 2016</p>
						<p style="color: #333;"></p>
					</div>
				</div>
				<div class="mui-card-footer">
					<a class="mui-card-link" href="index/actions">開始</a>
					<a class="mui-card-link" href="index/listlog">查看</a>
				</div>
			</div>
	<script src="{{ asset('mui-master/examples/hello-mui/js/mui.min.js') }}"></script>
	<script src="{{ asset('mui-master/examples/hello-mui/js/update.js') }}" type="text/javascript" charset="utf-8"></script>
	<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery-1.11.1.js"></script>

	<script type="text/javascript" charset="utf-8">
		var slider = mui("#slider");
		slider.slider({
			interval: 5000
		});
	</script>
	<script type="text/javascript">
		$.get('/api/index/getmatter', function(data) {
			if(data.code == 200) {
				var clone_block = $('.clone_block');
				$.each(data.data, function(key, val) {
					console.log(val.name);
					var clo = clone_block.clone(true);
	                $(clo).removeClass('clone_block');
	                $(clo).children('span').eq(0).text(val.name);
	                var msg = '還有'+val.daymatter+'天';
	                $(clo).children('span').eq(1).text(msg);
	                $(clo).show();
	                $('.matters').append(clo);
				})
			}
		});
	</script>
@endsection

