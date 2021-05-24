<?php

class FreeConsultRegister {
    public function SendData($query) {
       date_default_timezone_set('Europe/Moscow');
       $mailData = [
        'poster' => 'zolotaryow.sergey@yandex.ru',
        'getter' => 'zolotaryow.mswebdev@outlook.com',
        'title' => 'Онлайн-заявка на бесплатную консультацию'. date('Y-m-d H:i:s')
       ];

       $headers  = 'MIME-Version: 1.0' . "\r\n";
       $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
       $headers .= 'Поддержка Profmaster <'. $mailData['poster'] .'>' . "\r\n";
       $send = mail('Горячая линия Profmaster<' . $mailData['getter'] . '>',$mailData['title'], '<!DOCTYPE html><html lang="ru-RU"><head><meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover"><style>html,body{margin: 0;font-family: Arial,sans-serif;}h1{font-size: 150%;}p{font-size:125%;}h1,p,strong{display:block;padding-top: 2vh;padding-bottom: 2vh;}</style><title>Онлайн-заявка на бесплатную консультацию от '. date('Y-m-d H:i:s') .'</title></head><body><h1>Доброго времени суток!</h1><p>Вы получили онлайн-заявку на бесплатную консультацию от клиента, на номер которого вы можете позвонить:<a href="tel:'. $query['phone'] .'" target="_blank">'. $query['phone'] .'</a></p><p>Заявка была оформлена на нашем сайте клиентом с именем '. $query['customer'] .'</p><strong>Заранее мы вам благодарны и просим вас выполнить полученную заявку!</strong></body></html>',$headers);

       if($send){ return ['type' => 'success','response' => $this->Success(0)]; }
       else{ return ['type' => 'problem','response' => $this->Success(1)]; }

    }
    private function Success($code) {
        $status = NULL;

        switch ($code) {
            case 0: $status = 'OkForm'; break;
            case 1: $status = 'ErrorForm'; break;
        }

        return $status;
    }
}
?>