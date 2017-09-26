<?php
require_once('lib/FirePHPCore/FirePHP.class.php');
require_once('lib/FirePHPCore/fb.php');

class SphpProfiler extends Sphp\core\DebugProfiler{
    
    
    public function render() { 
        try{
        $firephp = FirePHP::getInstance(true);
        $fb = new FB(); 
        $C = 0;
        foreach ($this->msg as $key=>$value) { 
            $C += 1;
            if($C > 90){
                exit ;
            }
            if($value[4]=="info"){
//                $firephp->info($value[0]);
            }else if($value[4]=="infoi"){
                $firephp->info($value[0]);
            }else{
                $firephp->error("$value[2] - $value[0]","$value[1] - $value[3]");
            }
        }
        if(function_exists("getCheckErr") && getCheckErr()){
            $firephp->error(traceError(true).' '.traceErrorInner(true),"Internal App Error - ");
        }
        }  catch (Exception $e){
            echo 'Debugger Failed: ',  $e->getMessage(), "\n";
        }
        
        
//        $firephp->log('Plain Message');     // or FB::
//        $firephp->warn('Warn Message');     // or FB::
    }
    
    }
    