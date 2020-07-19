<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 19/07/2020
 * Time: 15:48
 * @property \shop\entities\Shop\Order\Order $order
 */

namespace shop\listeners\Shop\Order;


use shop\entities\Shop\Order\events\SendEmailAdminNotification;
use shop\entities\Shop\Order\Order;
use yii\mail\MailerInterface;
use yii\base\ErrorHandler;

class SendEmailAdminNotificationListener
{
    private $mailer;
    private $errorHandler;
    private $adminEmail = 'gorin163@gmail.com';

    public function __construct( MailerInterface $mailer, ErrorHandler $errorHandler)
    {
        $this->mailer = $mailer;
        $this->errorHandler = $errorHandler;
    }

    public function handle(SendEmailAdminNotification $event): void
    {
        if ($event->order->isNew()) {
                    try {
                        $this->sendEmailNotification($event->order);
                        file_put_contents(\Yii::getAlias('@frontend') . '/runtime/sendEmailNotification.log', "Предложение загружено" . "\n", FILE_APPEND);
                    } catch (\Exception $e) {
                        $this->errorHandler->handleException($e);
                    }
                }
    }

    private function sendEmailNotification(Order $order): void
    {
        $link = \Yii::$app->get('backendUrlManager')->createAbsoluteUrl(['shop/order/view', 'id' => $order->id]);
        $html = "Поступил новый заказ, для просмотра содержимого перейдите по <a href='$link'>ссылке</a>";
        $sent = $this->mailer
            ->compose()
            ->setTo($this->adminEmail)
            ->setFrom(['gorin163@gmail.com' => 'ТАНА Робот'])
            ->setSubject('Поступил новый заказ')
            ->setTextBody('Поступил новый заказ для просмотра заказы перейдите по ссылке ниже '.$link)
            ->setHtmlBody($html)
            ->send();
        if (!$sent) {
            throw new \RuntimeException('Email sending error to ' . $this->adminEmail);
        }
    }

}