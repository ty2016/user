<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    　
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
        table {
            border-collapse: collapse;
            margin: 0 auto;
            text-align: center;
        }

        table td, table th {
            border: 1px solid #cad9ea;
            color: #666;
            height: 30px;
        }

        table thead th {
            background-color: #CCE8EB;
            width: 100px;
        }
        table tr:nth-child(odd) {
            background: #fff;
        }
        table tr:nth-child(even) {
            background: #F5FAFA;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="col-sm-12">
            <a target="_blank" href="/rand">生成随机数</a>
            <a target="_blank" href="/send">打印接口数据</a>
        </div>
        <div class="title">
            <form role="form" >
                <div class="row">
                    <div class="col-sm-11">
                        <input type="text" style="display:inline-block;width:45%;vertical-align:middle;" class="form-control user_name" name="user_name" value="{{$name}}" placeholder="清输入用户名">
                        <button type="button" class="btn btn-default" id="ok">提交</button>
                        <button type="button" class="btn btn-default" id="edit">更新</button>
                        <button type="button" class="btn btn-default" id="del">删除</button>
                    </div>
                </div>
            </form>

        </div>

        <div class="links">
            <table width="90%" class="table">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>邮箱</th>
                    <th>用户名</th>
                    <th>时间</th>
                </tr>
                @foreach($user as $v)
                    <tr>
                        <td>{{$v['id']}}</td>
                        <td>{{$v['email']}}</td>
                        <td>{{$v['user_name']}}</td>
                        <td>{{date('Y-m-d',$v['register_time'])}}</td>
                    </tr>
                @endforeach
                </thead>
            </table>
            @if($user)
            <div class="pagination">{{$user->appends(['user_name' => $name])->links()}}</div>
                @endif
        </div>
    </div>
</div>
</body>
　
<script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
<script>
    $(function () {
        $('#ok').click(function () {
            // if($('.user_name').val()==""){
            //     return;
            // }
            $('form').submit();
        })

        $('#edit').click(function () {
            $.post('/user/update',{'_token':"{{csrf_token()}}"},function(data) {
              alert(data.msg)
            },'json');
        })
        $('#del').click(function () {
            $.post('/user/destroy',{'_token':"{{csrf_token()}}"},function(data) {
                alert(data.msg)
            },'json');
        })
    })

</script>
</html>
