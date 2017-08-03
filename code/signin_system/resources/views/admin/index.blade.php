@extends('admin.layouts.nav')

@section('content')
<div class="col-md-8">
	<h4 class="m-t-none">Todos</h4>
	<ul class="list-group gutter list-group-lg list-group-sp sortable">
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-1" data-toggle="class:text-lt text-success" class="active">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-success"></i>
		</a>
		</span>
		<div class="clear text-success text-lt" id="todo-1">Browser compatibility</div>
	</li>
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-2" data-toggle="class:text-lt text-danger">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-danger"></i>
		</a>
		</span>
		<div class="clear" id="todo-2">Looking for more example templates</div>
	</li>
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-3" data-toggle="class:text-lt">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-success"></i>
		</a>
		</span>
		<div class="clear" id="todo-3">Customizing components</div>
	</li>
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-4" data-toggle="class:text-lt">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-success"></i>
		</a>
		</span>
		<div class="clear" id="todo-4">The fastest way to get started</div>
	</li>
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-5" data-toggle="class:text-lt">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-success"></i>
		</a>
		</span>
		<div class="clear" id="todo-5">HTML5 doctype required</div>
	</li>
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-6" data-toggle="class:text-lt">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-success"></i>
		</a>
		</span>
		<div class="clear" id="todo-6">LessCSS compiling</div>
	</li>
	</ul>
</div>       <div class="col-md-8">
	<h4 class="m-t-none">Todos</h4>
	<ul class="list-group gutter list-group-lg list-group-sp sortable">
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-1" data-toggle="class:text-lt text-success" class="active">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-success"></i>
		</a>
		</span>
		<div class="clear text-success text-lt" id="todo-1">Browser compatibility</div>
	</li>
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-2" data-toggle="class:text-lt text-danger">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-danger"></i>
		</a>
		</span>
		<div class="clear" id="todo-2">Looking for more example templates</div>
	</li>
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-3" data-toggle="class:text-lt">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-success"></i>
		</a>
		</span>
		<div class="clear" id="todo-3">Customizing components</div>
	</li>
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-4" data-toggle="class:text-lt">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-success"></i>
		</a>
		</span>
		<div class="clear" id="todo-4">The fastest way to get started</div>
	</li>
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-5" data-toggle="class:text-lt">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-success"></i>
		</a>
		</span>
		<div class="clear" id="todo-5">HTML5 doctype required</div>
	</li>
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-6" data-toggle="class:text-lt">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-success"></i>
		</a>
		</span>
		<div class="clear" id="todo-6">LessCSS compiling</div>
	</li>
	</ul>
</div>       <div class="col-md-8">
	<h4 class="m-t-none">Todos</h4>
	<ul class="list-group gutter list-group-lg list-group-sp sortable">
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-1" data-toggle="class:text-lt text-success" class="active">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-success"></i>
		</a>
		</span>
		<div class="clear text-success text-lt" id="todo-1">Browser compatibility</div>
	</li>
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-2" data-toggle="class:text-lt text-danger">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-danger"></i>
		</a>
		</span>
		<div class="clear" id="todo-2">Looking for more example templates</div>
	</li>
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-3" data-toggle="class:text-lt">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-success"></i>
		</a>
		</span>
		<div class="clear" id="todo-3">Customizing components</div>
	</li>
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-4" data-toggle="class:text-lt">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-success"></i>
		</a>
		</span>
		<div class="clear" id="todo-4">The fastest way to get started</div>
	</li>
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-5" data-toggle="class:text-lt">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-success"></i>
		</a>
		</span>
		<div class="clear" id="todo-5">HTML5 doctype required</div>
	</li>
	<li class="list-group-item box-shadow">
		<a href="#" class="pull-right" data-dismiss="alert">
		<i class="fa fa-times icon-muted"></i>
		</a>
		<span class="pull-left media-xs">
		<i class="fa fa-sort icon-muted fa m-r-sm"></i>
		<a href="#todo-6" data-toggle="class:text-lt">
			<i class="fa fa-square-o fa-fw text"></i>
			<i class="fa fa-check-square-o fa-fw text-active text-success"></i>
		</a>
		</span>
		<div class="clear" id="todo-6">LessCSS compiling</div>
	</li>
	</ul>
</div>

@endsection