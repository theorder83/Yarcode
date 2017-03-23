<?php
/**
 * Created by PhpStorm.
 * User: Antonov
 */
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Class ContactForm
 * @package frontend\models
 */
class ContactForm extends Model
{
    public $name, $email, $message, $phone;


    public function rules()
    {
        return [
            [ ['name', 'email', 'message', 'phone'], 'required'],
            ['email', 'email'],
        ];
    }

    public function contact()
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($this->email)
                ->setSubject($this->name)
                ->setHtmlBody($this->message . '<br/>' . $this->phone)
                ->send();
            return true;
        } else {
            return false;
        }
    }
}