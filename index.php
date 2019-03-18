<?php
/**
 * 模拟post进行url请求
 * @param string $url
 * @param array $post_data
 */
function request_post($url = '', $post_data = '') {
    if (empty($url) || empty($post_data)) {
        return false;
    }
    $postUrl = $url;
    $curlPost = $post_data;
    $ch = curl_init();//初始化curl
    curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
    curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
    curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
    curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
    $data = curl_exec($ch);//运行curl
    curl_close($ch);

    return $data;
}

$url = 'http://openapi.tuling123.com/openapi/api/v2';
$post_data['userInfo']=array('apiKey'=>'','userId'=>1);
$post_data['perception']=array('inputText'=>array('text'=>'你叫什么名字？'));
$post_data=json_encode($post_data);
$res = request_post($url, $post_data);
print_r($res);

?>
