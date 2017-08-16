@extends('index.layouts.nav')

@section('body')
<ul class="mui-table-view mui-grid-view mui-grid-9">
    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="{{ url('index/personlog') }}">
            <span class="mui-icon mui-icon-home"></span>
            <div class="mui-media-body">个人记录</div></a></li>
    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="{{ url('index/listmoon') }}">
            <span class="mui-icon mui-icon-email"><!-- <span class="mui-badge">5</span> --></span>
            <div class="mui-media-body">设置心情</div></a></li>
    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="{{ url('index/listtag') }}">
            <span class="mui-icon mui-icon-chatbubble"></span>
            <div class="mui-media-body">设置读物</div></a></li>
    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="{{ url('index/listlog') }}">
            <span class="mui-icon mui-icon-location"></span>
            <div class="mui-media-body">设置项目</div></a></li>
    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
            <span class="mui-icon mui-icon-search"></span>
            <div class="mui-media-body">设置轮播图</div></a></li>
    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3"><a href="#">
            <span class="mui-icon mui-icon-phone"></span>
            <div class="mui-media-body">设置打卡图</div></a></li>
</ul> 
@endsection