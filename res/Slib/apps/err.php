<?php

SphpBase::$dynData = new TempFile("{$apppath}/forms/error_msg.php");

if(SphpBase::page()->getEvent() == 'page'){
    SphpBase::$dynData->spnmsg->setInnerHTML("HTML Error " . SphpBase::page()->getEventParameter());
}

SphpBase::$dynData->run();
include_once("$masterf");
