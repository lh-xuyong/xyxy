@extends('layouts.admin')
@section('content')
    <article class="cl pd-20">
        @if ($errors->any())
            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div class="Huialert Huialert-danger"><i class="Hui-iconfont">&#xe6a6;</i>{{ $error }}</div>
                    @endforeach
            </div>
        @endif
        <form action="{{ url('system/parameters/store') }}" method="post" class="form form-horizontal">
            {{ csrf_field() }}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>参数名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="username"
                           name="name">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>参数值：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" name="option_list" value="" >
                    <span class="help-block">强制参数格式:<strong>1:参数一,2:参数二,</strong></span>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="radio-box">
                        <input name="status" type="radio" id="sex-1" value="1" checked>
                        <label for="sex-1">启用</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" id="sex-2" name="status" value="2">
                        <label for="sex-2">禁用</label>
                    </div>

                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">描述：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <textarea name="description" cols="" rows="" class="textarea" placeholder="说点什么...最少输入10个字符"
                              onKeyUp="textarealength(this,100)"></textarea>
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

