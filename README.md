Ulogin виджет для yii2
============================

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Konstantin-Vl/yii2-ulogin-widget/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Konstantin-Vl/yii2-ulogin-widget/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/Konstantin-Vl/yii2-ulogin-widget/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Konstantin-Vl/yii2-ulogin-widget/build-status/master)


Установка
------------
Установку через [composer](https://getcomposer.org/) можно выполнить так:
```bash
composer require kosv/yii2-ulogin-widget
```
или в секцию `require` файла composer.json добавить строку:
```
"kosv/yii2-ulogin-widget": "dev-master"
````

Как пользоваться
----------------

О всех параметрах ulogin можно почитать в [официальной дакументации](http://ulogin.ru/help.php)

Стандартная конфигурация
```php
use kosv\ulogin\widget\UloginWidget;

<?php
echo UloginWidget::widget([
        'options' => [
          'display' => 'panel',
          'fields' => ['first_name', 'last_name', 'phone'],
          'providers' => ['mailru', 'odnoklassniki', 'vkontakte'],
          'callback' => 'authCallback', //Ваш js callback, который будет вызыватся для отправки данных в контроллер
          'redirect_uri' => '' //При использовании callback, нужно поставить пустую строку
        ],
     ]);
?>
```


Стилизация кнопок
```php
use kosv\ulogin\widget\UloginWidget;

<?php
echo UloginWidget::widget([
        'options' => [
          'display' => 'buttons',
          'fields' => ['first_name', 'last_name', 'phone'],
          'providers' => ['mailru', 'odnoklassniki', 'vkontakte'],
          'callback' => 'authCallback', //Ваш js callback, который будет вызыватся для отправки данных в контроллер
          'redirect_uri' => '' //При использовании callback, нужно поставить пустую строку
        ],
        'buttons' => [
            [
              'provider' => 'mailru',
              'layout' => function($data) {
                return ' <img src="mailru.png" ' . $data . '/>';
              }
            ],
            [
              'provider' => 'odnoklassniki',
              'layout' => function($data) {
                return ' <img src="odnoklassniki.png" ' . $data . '/>';
              }
            ],
            [
              'provider' => 'vkontakte',
              'layout' => function($data) {
                return ' <img src="vkontakte.png" ' . $data . '/>';
              }
            ],
        ]
     ]);
?>
```


Обработка событий
```php
<?php
echo UloginWidget::widget([
        'options' => [
          'display' => 'panel',
          'fields' => ['first_name', 'last_name', 'phone'],
          'providers' => ['mailru', 'odnoklassniki', 'vkontakte'],
          'callback' => 'authCallback', //Ваш js callback, который будет вызыватся для отправки данных в контроллер
          'redirect_uri' => '' //При использовании callback, нужно поставить пустую строку
        ],
        'eventListeners' => [
          'cloase' => 'closeCallback',
          'open' => 'openCallback',
          'ready' => 'readyCallback',
          ...
        ],
     ]);
?>
```
