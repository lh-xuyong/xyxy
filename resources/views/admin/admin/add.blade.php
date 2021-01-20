@extends('admin.layouts.iframe_main')
@section('content')
	<article class="page-container">
	<form action="" method="post" class="form form-horizontal" enctype="multipart/form-data" id="form-member-add">
		{{csrf_field()}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="username" name="username">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="pass" name="pass">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="confirm_pass" name="confirm_pass">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input name="sex" type="radio" id="sex-1" value="1" checked>
					<label for="sex-1">男</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="sex" value="2">
					<label for="sex-2">女</label>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="tel" name="tel">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="@" name="email" id="email">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">部门：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select valid" name="adminRole" size="1" aria-required="true" aria-invalid="false">
				<option value="0">洪泽</option>
				<option value="1">涟水</option>
			</select><label id="adminRole-error" class="error valid" for="adminRole" style="display: block;"></label>
			</span> </div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">是否组长：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select valid" name="adminRole" size="1" aria-required="true" aria-invalid="false">
				<option value="0">否</option>
				<option value="1">是</option>

			</select><label id="adminRole-error" class="error valid" for="adminRole" style="display: block;"></label>
			</span> </div>
		</div>
{{--		<div class="row cl">--}}
{{--			<label class="form-label col-xs-4 col-sm-3">角色：</label>--}}
{{--			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">--}}
{{--			<select class="select" name="adminRole" size="1">--}}
{{--				<option value="0">超级管理员</option>--}}
{{--				<option value="1">总编</option>--}}
{{--				<option value="2">栏目主辑</option>--}}
{{--				<option value="3">栏目编辑</option>--}}
{{--			</select>--}}
{{--			</span> </div>--}}
{{--		</div>--}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="remark" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
			</div>
		</div>

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
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
				url: "{{url('/admin/add')}}" ,
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
