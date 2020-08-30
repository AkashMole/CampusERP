<?php

define('TELEGRAM_BOT_API_KEY', '1155014817:AAHX7Q2lTO0AdLd3QrNenlfw77Wn1PmvDGA');
define('TELEGRAM_CHAT_ID', '799579064'); // for sending messages to groups use number of chat_id with minus '-' before, example -1238735917

$text = "Sample";
$method_url = 'https://api.telegram.org/bot' . TELEGRAM_BOT_API_KEY . '/sendMessage';

$url = $method_url . '?chat_id=' . TELEGRAM_CHAT_ID . '&disable_web_page_preview=1&text=' . $text;

$response = @file_get_contents($url);