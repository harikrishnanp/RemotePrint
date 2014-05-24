RemotePrint
===========

PHP-Yii extension for print data in a remote printer (CUPS Printer)


Usage
===========

Add this in protected/config/main.php of Yii
`'components'=>array(
            'RemotePrint' => array(
            'class' => 'RemotePrint',
            'ip' => '127.0.0.1',
            'port' => '631'
        ),
)`


Where ip is the IP of coputer in which printer is connected. Port id the port of cups printer, default 631.

Do print from your controller as 

`$data = 'Test Print';
echo Yii::app()->RemotePrint->print_data($data);`
