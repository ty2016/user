<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $param = $request->all();
        if (isset($param['user_name']) && $param['user_name']) {
            $datas = $param['user_name'];
        }
        else{
            $datas="";
       }
            $user = \App\User::
                when($datas, function ($query, $datas) {
                    if($datas){
                        $query->where('user_name', 'like', '%' . $datas . '%');
                    }
                })
                ->paginate(5);
//        else {
//            $datas = '';
//            $user = \App\User::paginate(5);
//        }
        return view('user', compact('user'))->with('name', $datas);
//        dd($data);

    }

    /**
     * 修改
     */
    public function update()
    {
        $email = \App\User::all()->toArray();
        $rightEmail = [];
        $errorEmail = [];
        foreach ($email as $v) {
            if (filter_var($v['email'], FILTER_VALIDATE_EMAIL)) {
                $rightEmail[] = $v['id'];
            } else {
                $errorEmail[] = $v['id'];
            }
        }
        if ($errorEmail) {
            $res = \App\User::whereIn('id', $errorEmail)
                ->update(['email' => 'error@e.com']);
            if ($res > 0) {
                $result = ['code' => 200, 'msg' => 'success'];
            } else {
                $result = ['code' => 100, 'msg' => '无操作'];
            }
        } else {
            $result = ['code' => 100, 'msg' => '无操作'];
        }

        return $result;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $res = DB::table('users')->where('email', '=', 'error@e.com')->delete();
        if ($res > 0) {
            $result = ['code' => 200, 'msg' => 'success'];
        } else {
            $result = ['code' => 100, 'msg' => '无操作'];
        }
        return $result;
    }

    public function send()
    {
        $url = 'http://47.97.226.4/sms/send';
        $header = array(
            'Content-Type:' . 'application/x-www-form-urlencoded; charset=UTF-8'
        );
        $param[] = [
            'mobile' => '18723421234',
            'tpl_id' => 140566,
            'tpl_value' => urlencode('#code#=431515'),
            'key' => '184eb5c250f3d70becd6c4cff198de34'
        ];
        $param = json_encode($param);
        $result = $this->request_post($url, $param, $header);
        print_r(json_decode($result, true));
    }

    public function rand()
    {
        $arr = array();
        for ($i = 0; $i < 20000; $i++) {
            $num = mt_rand(1000000, 9999999);
            if (in_array($num, $arr)) {
                $i--;
            } else {
                array_push($arr, $num);
            }
        }
//        echo '<pre>';
//        print_r($arr);
//        echo '</pre>';
        $this->bubbleSort($arr);
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

    /**
     * @param string $url
     * @param string $param
     * @return bool|string
     * post请求
     */
    function request_post($url = '', $param = '', $header = null)
    {
        if (empty($url) || empty($param)) {
            return false;
        }

        $postUrl = $url;
        $curlPost = $param;
        // 初始化curl
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $postUrl);
        if (!empty($header)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            curl_setopt($curl, CURLOPT_HEADER, 0);//返回response头部信息
        }
        // 要求结果为字符串且输出到屏幕上
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // post提交方式
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
        // 运行curl
        $data = curl_exec($curl);
        curl_close($curl);

        return $data;
    }

    function bubbleSort(&$array)
    {
        $temp = 0;
        for ($i = 0; $i < count($array) - 1; $i++) {
            for ($j = 0; $j < count($array) - 1 - $i; $j++) {
                if ($array[$j] > $array[$j + 1]) {  //从小到大排列
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
    }
}
