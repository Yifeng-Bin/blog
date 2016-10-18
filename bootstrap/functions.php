<?php

/**
 * @deprecated 手机归属地查询
 * @param string $phone 手机号码
 * @return string $res
 * @author wzb 2016-10-18
 */
if (!function_exists(mobile_addr)) {
    function mobile_addr($phone) {
        $res = array();
        $paramArr['key'] = '0046a8ea52ce7abd35abeeb480d2d79d';
        $paramArr['dtype'] = 'json';
        $paramArr['phone'] = $phone;
        $url = "http://apis.juhe.cn/mobile/get";
        $data = http_build_query($paramArr);
        $postdata = do_post_request($url, $data);
        if ($postdata['tag']) {
            $res = json_decode($postdata['data'], true);
        }
        return $res;
    }
}

/**
 * @deprecated 返回json数据格式
 * @param unknown_type $code : 错误码
 * @param unknown_type $data : 数据
 * @author wzb 2016-10-18
 */
if(!function_exists(back_code)){
    function back_code($code, $data=array()) {
        $ini_path = __DIR__.'/code.ini';
        $aCode = parse_ini_file($ini_path);
        $msg = isset($aCode[$code]) ?  $aCode[$code] : "成功";
        return array("staus"=>$code, "msg"=>$msg, "data"=>$data);
    }
}
