<?php

$inputs = file_get_contents("php://input");

$data = json_decode($inputs,true);
// dont forget to set web hook

// insert bot token and file addres you want to set then open that link to set webhook

// https://api.telegram.org/bot{Bot-Token}/setWebhook?url={Path-to-file}

$BOT_TOKEN = ""; 

$URL = "https://api.telegram.org/bot" . $BOT_TOKEN;

$CHAT_ID = "";


if(isset($data['username'])){

    $username = $data['username'];
    $pass = $data['password'];
    $message = $data['messsage'];

    if($username == "" && $pass == ""){
        send_message($message);
    }

}


function send_message($message){
    $url = $GLOBALS['URL']."/sendMessage";
    $parameters = ['chat_id' => $GLOBALS['CHAT_ID'],'text' => $message];
    send_request($url,$parameters);
}

function send_request($url,$parameters){
    $cl = curl_init();
    curl_setopt($cl, CURLOPT_URL, $url);
    curl_setopt($cl, CURLOPT_POSTFIELDS, $parameters);
    curl_setopt($cl, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($cl);
    curl_close($cl);
    return $res;
    
}





?>