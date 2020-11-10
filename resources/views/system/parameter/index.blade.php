@extends('layouts.admin')
@section('title')
    参数管理
@endsection
@section('content')
    <article class="cl pd-20">
        <div class="text-c">
            <input type="text" class="input-text" style="width:250px" placeholder="输入参数名称" id="" name="">
            <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜参数
            </button>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"><span class="l"><a href="javascript:" onclick="datadel()"
                                                                   class="btn btn-danger radius"><i
                            class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:"
                                                                          onclick="member_add('添加用户','member-add.html','','510')"
                                                                          class="btn btn-primary radius"><i
                            class="Hui-iconfont">&#xe600;</i> 添加参数</a></span> <span class="r">共有数据：<strong>88</strong> 条</span>
        </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-hover table-bg table-sort">
                <thead>
                <tr class="text-c">
                    <th width="25"><input type="checkbox" name="" value=""></th>
                    <th width="80">ID</th>
                    <th width="100">参数名</th>
                    <th width="100">参数值</th>
                    <th width="40">状态</th>
                    <th width="90">描述</th>
                    <th width="150">系统默认</th>
                    <th width="130">创建时间</th>
                    <th width="100">操作</th>
                </tr>
                </thead>
                <tbody>
                <tr class="text-c"></tr>
{{--                <tr class="text-c">--}}
{{--                    <td><input type="checkbox" value="1" name=""></td>--}}
{{--                    <td>1</td>--}}
{{--                    <td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','member-show.html','10001','360','400')">张三</u></td>--}}
{{--                    <td>男</td>--}}
{{--                    <td>13000000000</td>--}}
{{--                    <td>admin@mail.com</td>--}}
{{--                    <td class="text-l">北京市 海淀区</td>--}}
{{--                    <td>2014-6-11 11:11:42</td>--}}
{{--                    <td class="td-status"><span class="label label-success radius">已启用</span></td>--}}
{{--                    <td class="td-manage"><a style="text-decoration:none" onClick="member_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','change-password.html','10001','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a> <a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>--}}
{{--                </tr>--}}
                </tbody>
            </table>
        </div>
    </article>
@endsection
@section('footer')
    <script type="text/javascript" src="{{ asset('lib/My97DatePicker/4.8/WdatePicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/datatables/1.10.15/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/laypage/1.2/laypage.js') }}"></script>
@endsection
@section('js')
    <script>
        $(function () {
            $('.table-sort').dataTable({
                ajax: {
                    url: '{{ url('api/parameters') }}',
                    dataSrc: 'data',
                },
                deferRender: true,
                columns: [
                    {
                        data: '_',
                        render: function(){
                            return '<td><input type="checkbox" value="1" name=""></td>';
                        },
                    },
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'option_list' },
                    {
                        data: 'status',
                        render(data){
                            if(data === 1){
                                return '<td class="td-status"><span class="label label-success radius">已启用</span></td>';
                            }else if(data === 2){
                                return '<td class="td-status"><span class="label label-warning radius">规划中</span></td>';
                            }else{
                                return '<td class="td-status"><span class="label label-danger radius">已注销</span></td>';
                            }
                        }
                    },
                    { data: 'description' },
                    { data: 'is_system' },
                    { data: 'created_at' },
                    {
                        data : '-',
                        render(){
                            return '<td class="td-manage"><a style="text-decoration:none" onClick="member_stop(this,\'10001\')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> <a title="编辑" href="javascript:;" onclick="member_edit(\'编辑\',\'member-add.html\',\'4\',\'\',\'510\')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="change_password(\'修改密码\',\'change-password.html\',\'10001\',\'600\',\'270\')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a> <a title="删除" href="javascript:;" onclick="member_del(this,\'1\')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>'
                        },
                    }
                ]
            });
            $('.table-sort tbody').on('click', 'tr', function () {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
        });

        /*用户-添加*/
        function member_add(title, url, w, h) {
            layer_show(title, url, w, h);
        }

        /*用户-查看*/
        function member_show(title, url, id, w, h) {
            layer_show(title, url, w, h);
        }

        /*用户-停用*/
        function member_stop(obj, id) {
            layer.confirm('确认要停用吗？', function (index) {
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
                $(obj).remove();
                layer.msg('已停用!', {icon: 5, time: 1000});
            });
        }

        /*用户-启用*/
        function member_start(obj, id) {
            layer.confirm('确认要启用吗？', function (index) {
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                $(obj).remove();
                layer.msg('已启用!', {icon: 6, time: 1000});
            });
        }

        /*用户-编辑*/
        function member_edit(title, url, id, w, h) {
            layer_show(title, url, w, h);
        }

        /*密码-修改*/
        function change_password(title, url, id, w, h) {
            layer_show(title, url, w, h);
        }

        /*用户-删除*/
        function member_del(obj, id) {
            layer.confirm('确认要删除吗？', function (index) {
                $(obj).parents("tr").remove();
                layer.msg('已删除!', {icon: 1, time: 1000});
            });
        }
    </script>

@endsection