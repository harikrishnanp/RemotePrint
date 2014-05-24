<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Harikrishnan
 * Date: 5/10/14
 * Time: 4:28 PM
 * To change this template use File | Settings | File Templates.
 */
class RemotePrint{
    public $ip;
    public $port;
    private $error = 'Error. ';

    public function init(){

    }

    public function test_connection(){
        //telnet ip port
        if(0){
            $this->error = 'Connection to remote printer failed. Please check IP or Port';
        }
    }

    public function test_exec(){
        //check exec enabled or not
        if(!function_exists('exec')){
            $this->error = 'exec() function is disabled in your php.ini, please enable it.';
        }
    }

    public function print_data($data){

        if($data == ''){
            return 'Nothing to print. Data is empty';
        }
        $this->test_connection();
        $this->test_exec();
        if('Error. ' === $this->error){
            $command = '/bin/echo '.escapeshellarg($data).' | /usr/bin/lpr -l -H '.$this->ip.':'.$this->port.' > /dev/null 2>&1';
            if(exec($command, $output)){
                return 'Successfully sent data to remote printer.';
            }else{
                return 'Error. Permission denied';
            }
        }else{
            return $this->error;
        }
    }
}
