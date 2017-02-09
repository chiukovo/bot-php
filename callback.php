<?php
require_once __DIR__ . '/vendor/autoload.php';

$token = "n1jc2dGYTk/DzXgxzlBLck7Dfs3NMbC5vewN12QzW4mrrlocSYM+eHekhriHqZ6HTGtcGT33dK2mN7/NcfH6/0F9xd6+UBPYqSNkarbp6pXQIyF8wcJJM/EW0XkJ8x4I/fb8UBy44hw9l8RzI6wwLwdB04t89/1O/w1cDnyilFU=";

$secret = "b2330978dadce29d0dab83940f6faa58";

$bot = new \LINE\LINEBot(
  new \LINE\LINEBot\HTTPClient\CurlHTTPClient($token),
  ['channelSecret' => $secret]
);

$signature = $_SERVER["HTTP_".\LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
$body = file_get_contents("php://input");

try {
    $events = $bot->parseEventRequest($body, $signature);
} catch (Exception $e) {
    var_dump($e); //錯誤內容
}

?>