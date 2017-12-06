<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
          /*  'dsn' => 'mysql:host=localhost;dbname=yii2advanced',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',*/

              'dsn' => 'mysql:host=localhost;dbname=yes_natural',
              'username' => 'root',
              'password' => '',
              'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.firstcom.sg',
                 'username' => 'no-reply@firstcom.sg',
                'password' => 'Uh3*[$[$5}9M',
               //  'host' => 'smtp.gmail.com',
               //  'username' => 'currentdemo777@gmail.com',
               //  'password' => 'lepassword',
                'port' => '465',
                'encryption' => 'ssl',
                'streamOptions'=> [ 'ssl' =>
                    [ 'allow_self_signed' => true,
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ],
                ] //here
            ],
        ],
    ],
];
