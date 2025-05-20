<?php
include_once(__DIR__ ."/PermisApp.php");
class mebhome extends PermisApp {

    public $genFormTemp = null;
    
    public function onstart() {
        global $mebmasterf;
        //echo $this->page->getAuthenticateType();
        $this->getAuthenticate("ADMIN,MEMBER");
        $this->page->getAuthenticatePerm();
        //$this->setTableName("omer_employee"); 
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
        if($this->page->hasPermission("install","mebhome")){
        $mysql = $this->dbEngine;
        $mysql->connect();
        //$mysql->dropTable("member");
        //$mysql->dropTable("profile_permission");
        
        if($mysql instanceof Sqlite){
        // 1. Member Tbl
        $sql = "CREATE TABLE IF NOT EXISTS member (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    usertype VARCHAR(10) NOT NULL,
    userid BIGINT NOT NULL,
    parentid BIGINT NOT NULL,
    profile_id INTEGER NOT NULL,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(30) NOT NULL,
    pic VARCHAR(100),
    address1 VARCHAR(100),
    address2 VARCHAR(100),
    city VARCHAR(100),
    country VARCHAR(100),
    postal VARCHAR(20),
    website VARCHAR(200),
    email VARCHAR(200),
    mobile VARCHAR(20),
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    status TINYINT NOT NULL,
    varification TINYINT NOT NULL,
    uniqueno VARCHAR(30),
    submit_timestamp VARCHAR(20) NOT NULL,
    update_timestamp VARCHAR(20) NOT NULL,
    spcmpid VARCHAR(14)
)";
        $mysql->createTable($sql);

        // 2. Profile Permission Tbl
        $sql = "CREATE TABLE IF NOT EXISTS profile_permission (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    userid BIGINT NOT NULL,
    parentid BIGINT NOT NULL,
    sid BIGINT NOT NULL,
    profile_name VARCHAR(50) NOT NULL,
    permission_id VARCHAR(2048) NOT NULL,
    status TINYINT NOT NULL,
    submit_timestamp VARCHAR(20) NOT NULL,
    update_timestamp VARCHAR(20) NOT NULL,
    spcmpid VARCHAR(14)
)";
        $mysql->createTable($sql);
            
        }else{
        // 1. Member Tbl
        $sql = "CREATE TABLE IF NOT EXISTS member (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    usertype VARCHAR(10) NOT NULL,
    userid BIGINT NOT NULL,
    parentid BIGINT NOT NULL,
    profile_id INT NOT NULL,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(30) NOT NULL,
    pic VARCHAR(100),
    address1 VARCHAR(100),
    address2 VARCHAR(100),
    city VARCHAR(100),
    country VARCHAR(100),
    postal VARCHAR(20),
    website TEXT, 
    email VARCHAR(200),
    mobile VARCHAR(20),
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL, 
    status TINYINT NOT NULL,
    varification TINYINT NOT NULL, 
    uniqueno VARCHAR(30),
    submit_timestamp INT NOT NULL,
    update_timestamp INT NOT NULL,
    spcmpid VARCHAR(14)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
";
        $mysql->createTable($sql);

        // 2. Profile Permission Tbl
        $sql = "CREATE TABLE IF NOT EXISTS profile_permission (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    userid BIGINT NOT NULL,
    parentid BIGINT NOT NULL,
    sid BIGINT NOT NULL,
    profile_name VARCHAR(50) NOT NULL,
    permission_id TEXT NOT NULL, 
    status TINYINT NOT NULL,
    submit_timestamp INT NOT NULL,
    update_timestamp INT NOT NULL,
    spcmpid VARCHAR(14)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
";
        $mysql->createTable($sql);
        }
        
        include_once(PROJ_PATH . "/temp/db.php");
        $mysql->disconnect();
        $this->setTempFile(new TempFile("Database Created",true));
        }else{
            $this->page->forward("mebhome.html");
        }

    }
    
}
