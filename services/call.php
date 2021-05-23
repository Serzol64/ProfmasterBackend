<?php


class Backcall {
    public function SendData($query) {
       date_default_timezone_set('Europe/Moscow');
       $mailData = [
        'poster' => 'zolotaryow.sergey@yandex.ru',
        'getter' => 'zolotaryow.mswebdev@outlook.com',
        'title' => 'Заказ обратного звонка с сайта от '. date('Y-m-d H:i:s')
       ];

       $headers  = 'MIME-Version: 1.0' . "\r\n";
       $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
       $headers .= 'Поддержка Profmaster <'. $mailData['poster'] .'>' . "\r\n";
       $send = mail('Горячая линия Profmaster<' . $mailData['getter'] . '>',$mailData['title'], '<!DOCTYPE html><html lang="ru-RU"><head><meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover"><style>html,body{margin: 0;font-family: Arial,sans-serif;}h1{font-size: 150%;}p{font-size:125%;}h1,p,strong{display:block;padding-top: 2vh;padding-bottom: 2vh;}</style><title>Заказ обратного звонка с сайта от '. date('Y-m-d H:i:s') .'</title></head><body><h1>Доброго времени суток!</h1><p>Вы получили заказ обратного звонка с нашего сайта на этот номер телефона:<a href="tel:'. $query .'" target="_blank">'. $query .'</a></p><strong>Заранее мы вам благодарны и просим вас исполнить его!</strong></body></html>',$headers);

       if($send){ return ['type' => 'success','response' => $this->Success(0)]; }
       else{ return ['type' => 'problem','response' => $this->Success(1)]; }
    }
    public function Success($code) {
        $status = NULL;

        switch ($code) {
            case 0: $status = 'OkSend'; break;
            case 1: $status = 'ErrorSend'; break;
        }

        return $status;
    }
}
?>