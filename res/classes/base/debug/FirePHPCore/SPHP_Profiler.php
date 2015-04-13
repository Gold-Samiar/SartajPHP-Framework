<?php
require_once('lib/FirePHPCore/FirePHP.class.php');
require_once('lib/FirePHPCore/fb.php');

class SPHP_Profiler extends DebugProfiler{
    
    public function render() {
        $firephp = FirePHP::getInstance(true);
        $fb = new FB();
        foreach ($this->msg as $key => $value) {
            if($value[4]=="info"){
                $firephp->info($value[0]);
            }else{
                $firephp->error("$value[2] - $value[0]","$value[1] - $value[3]");
            }    
        }

//        $firephp->log('Plain Message');     // or FB::
//        $firephp->warn('Warn Message');     // or FB::
    }
    
    }