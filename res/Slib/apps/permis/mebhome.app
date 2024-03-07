<?php
include_once(__DIR__ ."/PermisApp.php");
class mebhome extends PermisApp {

    public $genFormTemp = null;
    
    public function onstart() {
        global $mebmasterf;
        //echo $this->page->getAuthenticateType();
        $this->getAuthenticate("ADMIN,MEMBER,MEMBERT");
        //$this->setTableName("omer_employee"); 
        parent::onstart();
        if(file_exists("apps/forms/mebmain.front")){
            $this->genFormTemp = new TempFile("apps/forms/mebmain.front", false,null, $this); 
        }else{
            $this->genFormTemp = new TempFile($this->apppath . "/forms/main.front", false,null, $this);  
        }
        $this->setMasterFile($mebmasterf);
    }
    
    public function page_new() {  
        $this->setTempFile($this->genFormTemp);
    }
    
    public function page_event_install($evtp) {
        if($this->hasPermission("install","mebhome")){
        $mysql = $this->dbEngine;
        $mysql->connect();

        // 1. Member Tbl
        $sql = "CREATE TABLE IF NOT EXISTS member (
         id bigint(20) NOT NULL AUTO_INCREMENT,
         usertype varchar(10) NOT NULL COMMENT 'ADMIN,MEMBER',
         userid bigint(20) NOT NULL,
         parentid bigint(20) NOT NULL,
         profile_id int(2) NOT NULL,
         fname varchar(50) NOT NULL,
         lname varchar(30) NOT NULL,
         pic varchar(100),
         address1 varchar(100),
         address2 varchar(100),
         city varchar(100),
         country varchar(100),
         postal varchar(20),
         website varchar(200) ,
         email varchar(200) ,
         mobile varchar(20) ,
         username varchar(50) NOT NULL,
         password varchar(50) NOT NULL,
         submit_timestamp varchar(20) NOT NULL,
         status tinyint(2) NOT NULL COMMENT '0 : Inactive, 1 : Active',
         varification tinyint(1) NOT NULL,
         uniqueno varchar(30) ,
         spcmpid varchar(14) ,
         PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET='UTF8'";
        $mysql->createTable($sql);

        // 2. Profile Permission Tbl
        $sql = "CREATE TABLE  IF NOT EXISTS profile_permission (
         id bigint(20) NOT NULL AUTO_INCREMENT,
         userid bigint(20) NOT NULL,
         parentid bigint(20) NOT NULL,
         sid bigint(20) NOT NULL,
         profile_name varchar(50) NOT NULL,
         permission_id varchar(2048) NOT NULL,
         status tinyint(4) NOT NULL,
         submit_timestamp varchar(20) NOT NULL,
         spcmpid varchar(14) ,
         PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET='UTF8'";
        $mysql->createTable($sql);
        include_once(PROJ_PATH . "/temp/db.php");
        $mysql->disconnect();
        $this->setTempFile(new TempFile("Database Created",true));
        }else{
            $this->page->forward("mebhome.html");
        }

    }
    
}
