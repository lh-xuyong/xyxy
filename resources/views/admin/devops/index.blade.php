@extends('admin.layouts.iframe_main')
@section('content')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理  <span class="c-gray en">&gt;</span> 管理员列表  <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
{{--        <div class="text-c"> 日期范围：--}}
{{--            <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">--}}
{{--            ---}}
{{--            <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">--}}
{{--            <input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">--}}
{{--            <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜管理员</button>--}}
{{--        </div>--}}


        <div class="text-c">
            <input class="btn btn-primary radius" type="button" value="导入" onclick="devops_import('<strong>导入工单(请先下载模板填充后上传)</strong>','/devops/import','500','250')">

            <input class="btn btn-success radius" type="button" value="导出">
        </div>

        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加用户','/admin/add','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a></span> <span class="r">共有数据：<strong>88</strong> 条</span> </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-hover table-bg table-sort">
                <thead>
                <tr class="text-c">
                    <th width=""><input type="checkbox" name="" value=""></th>
                    <th width="">1</th>
                    <th width="">2</th>
                    <th width="">3</th>
                    <th width="">4</th>
                    <th width="">5</th>
                    <th width="">6</th>
                    <th width="">6</th>
                    <th width="">8</th>
                    <th width="">9</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($admin_list))
                @foreach($admin_list as $admin)
                    <tr class="text-c">
                    <td><input type="checkbox" value="1" name=""></td>
                    <td>{{$admin->id}}</td>
                    <td>{{$admin->username}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->tel}}</td>
                    <td>{{$admin->dep}}</td>
                    <td>{{$admin->gw}}</td>
                    <td>{{$admin->remark}}</td>
                    @if($admin->status==0)
                            <td class="td-status"><span class="label label-default radius">待启用</span></td>
                    @elseif($admin->status==1)
                        <td class="td-status"><span class="label label-success radius">已启用</span></td>
                    @elseif($admin->status==2)
                        <td class="td-status"><span class="label label-danger radius">被驳回</span></td>
                    @elseif($admin->status==3)
                        <td class="td-status"><span class="label label-warning radius">已修改待启用</span></td>
                    @endif
                    <td class="td-manage">
                        <a style="text-decoration:none" onClick="member_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>

                        <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>
                        </a>

                        <a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','change-password.html','10001','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i>
                        </a>

                        <a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>
                        </a>
                    </td>
                </tr>

                @endforeach
                @else
                    <tr>
                        <td colspan="100" style="text-align: center;color: red">无数据</td>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{asset('h-ui/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('h-ui/lib/datatables/1.10.15/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('h-ui/lib/laypage/1.2/laypage.js')}}"></script>

    <script type="text/javascript">
        $(function(){
            $('.table-sort').dataTable({
                "aaSorting": [[ 1, "desc" ]],//默认第几个排序
                "bStateSave": true,//状态保存
                "aoColumnDefs": [
                    //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                    {"orderable":false,"aTargets":[0,9]}// 制定列不参与排序
                ]
            });

        });
        /*import*/
        function devops_import(title,url,w,h){
            layer_show(title,url,w,h);
        }

        /*用户-添加*/
        function member_add(title,url,w,h){
            layer_show(title,url,w,h);
        }
        /*用户-查看*/
        function member_show(title,url,id,w,h){
            layer_show(title,url,w,h);
        }
        /*用户-停用*/
        function member_stop(obj,id){
            layer.confirm('确认要停用吗？',function(index){
                $.ajax({
                    type: 'POST',
                    url: '',
                    dataType: 'json',
                    success: function(data){
                        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
                        $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
                        $(obj).remove();
                        layer.msg('已停用!',{icon: 5,time:1000});
                    },
                    error:function(data) {
                        console.log(data.msg);
                    },
                });
            });
        }

        /*用户-启用*/
        function member_start(obj,id){
            layer.confirm('确认要启用吗？',function(index){
                $.ajax({
                    type: 'POST',
                    url: '',
                    dataType: 'json',
                    success: function(data){
                        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
                        $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                        $(obj).remove();
                        layer.msg('已启用!',{icon: 6,time:1000});
                    },
                    error:function(data) {
                        console.log(data.msg);
                    },
                });
            });
        }
        /*用户-编辑*/
        function member_edit(title,url,id,w,h){
            layer_show(title,url,w,h);
        }
        /*密码-修改*/
        function change_password(title,url,id,w,h){
            layer_show(title,url,w,h);
        }
        /*用户-删除*/
        function member_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                $.ajax({
                    type: 'POST',
                    url: '',
                    dataType: 'json',
                    success: function(data){
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                    },
                    error:function(data) {
                        console.log(data.msg);
                    },
                });
            });
        }
    </script>
@endsection
