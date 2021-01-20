@extends('admin.layouts.iframe_main')
@section('content')




	<article class="page-container">
	<form action="" method="post" class="form form-horizontal" enctype="multipart/form-data" id="form-member-add">
		{{csrf_field()}}

		<div class="row cl">
			<label  class="form-label col-xs-3 col-sm-3"> <b> 导入文件：</b></label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="file" name="ticket_excel" id="ticket_excel">
			</div>
		</div>



		<div class="row cl">
			<label class="form-label col-xs-3 col-sm-3"> <b>   下载模板：</b></label>
			<div class="formControls col-xs-8 col-sm-9">
				<a href="http://localhost/request/export">点击此处下载文件</a>
			</div>
		</div>

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-3 col-sm-offset-3">
				<input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>

</article>
@endsection

@section('script')

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/jquery.validation/1.14.0/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/jquery.validation/1.14.0/validate-methods.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/jquery.validation/1.14.0/messages_zh.js')}}"></script>

<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});

	$("#form-member-add").validate({
		rules:{
			// username:{
			// 	required:true,
			// 	minlength:2,
			// 	maxlength:16
			// },
			// sex:{
			// 	required:true,
			// },
			// mobile:{
			// 	required:true,
			// 	isMobile:true,
			// },
			// email:{
			// 	required:true,
			// 	email:true,
			// },
			// uploadfile:{
			// 	required:true,
			// },

		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			// alert(222222222222)
			// $(form).ajaxSubmit();
			// var index = parent.layer.getFrameIndex(window.name);
			// console.log(index)
			// parent.$('.btn-refresh').click();
			// parent.layer.close(index);
			$(form).ajaxSubmit({
				type: 'post',
				dataType:'json',
				url: "{{url('devops/import')}}" ,
				secureuri:true,
				fileElementId:'ticket_excel',
				success: function(data){
					console.log(data);
					if (data.status == 'error') {
						layer.msg('错误', {icon: 2, time: 1500});
						return false;
					}else{
						layer.msg('添加成功!',{icon:1,time:1500});
						window.parent.location.reload();
						return true;
					}
				}
			});
		}
	});
});
</script>
@endsection
