<?php
/**
 * mysql class
 *
 * This class should be responsible for all mysql Database activities 
 * 
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class mysql{
/**
     * Class Constructor
     * This returns the mysql class object
     * @return mysql
     */
public function __construct(){}
/**
 * Connect to Database. Settings saved in comp.php file in project Root.
 * @global String $db Database Name
 * @global String $dhost Database Server Host
 * @global String $duser Database Server user
 * @global String $dpass Database Server password
 * @param String $db1
 * @param String $dhost1
 * @param String $duser1
 * @param String $dpass1 
 */
public function connect($db1='',$dhost1='',$duser1='',$dpass1=''){}

/**
 * When Connection available this function clean the query code from string data.
 * @param String $string
 * @return String
 */
public function cleanQuery($string){}
/**
 * When Connection available this function clear the query code from string data.
 * @param String $string
 * @return String
 */
public function clearQuery($string){}
/**
 * When Connection available this function execute Query.
 * @param String $sql
 * @return resource 
 * @example $mysql = getMySQLEngine(); <br>
 * $mysql->connect();<br>
 * $result = $mysql->executeQuery("SELECT * FROM user WHERE userID='rahul'");<br>
 * $mysql->disconnect();<br>
 */
public function executeQuery($sql){}
/**
 * When Connection available this function execute Query and When Connection is not
 * available this try to first connect to database.
 * @param String $sql
 * @return resource 
 * @example $mysql = getMySQLEngine(); <br>
 * $result = $mysql->executeQueryQuick("SELECT * FROM user WHERE userID='rahul'");<br>
 */
public function executeQueryQuick($sql){}
public function disconnect(){}

/**
 * Return update SQL
 * @param array $frm associative array with field name and value
 * @param String $txttbl Table Name
 * @param String $where Where Logic
 * @return String SQL Query
 * @example $frm['fld1'] = 'sanjiv';<br>
 * $frm['fld2'] = '987737746';<br>
 * $sql = updateSQL($frm,"tbluser","Where userID='sanjiv'");<br>
 */
public function updateSQL($frm, $txttbl, $where){}
/**
 * Return insert SQL
 * @param array $frm associative array with field name and value
 * @param String $txttbl Table Name
 * @return String SQL Query
 * @example $frm['fld1'] = 'sanjiv';<br>
 * $frm['fld2'] = '987737746';<br>
 * $sql = insertSQL($frm,"tbluser");<br>
 */
public function insertSQL($frm, $txttbl){}

/**
 * Return Select SQL
 * @param array $frm associative array with field name and value
 * @param String $tbllist Table Names separate with comma(,)
 * @param String $where Where Logic
 * @param String $OP Operator AND OR etc.
 * @return String SQL Query
 * @example $frm['fld1'] = 'sanjiv';<br>
 * $frm['fld2'] = '987737746';<br>
 * $sql = insertSQL($frm,"tbluser");<br>
 */
public function searchSQL($frm, $tbllist, $where, $OP){}
/**
 * Create Database if not Exist
 * @global String $db
 * @global String $dhost
 * @global String $duser
 * @global String $dpass 
 */
public function createDatabase(){}
/**
 * Create Table in Database. This function is work as executeQuery but not return anything.
 * @param String $sql Query for create Table 
 */
public function createTable($sql){}
/**
 * Delete Table and all if its content from Database
 * @param String $tableName 
 * @example $mysql->dropTable('user');
 */
public function dropTable($tableName){}
/**
 * This function execute query and return true if record exist in database.
 * @param String $sql
 * @return boolean 
 */
public function isRecordExist($sql){}
/**
 * Fetch records from result of query in form of associative array.
 * @param resource $result
 * @return array one record of row 
 */
public function mysql_fetch_assoc($result){}
/**
 * Return Last Generated Automatic field number in database table on which insert query is executed. When you
 * insert a record in table then id field is auto generated a unique number to that record. You can find
 * auto number for your new inserted record
 * @return int 
 */
public function mysql_insert_id(){}

/**
 * You can save any type of data array,class object or variable into the file with the help of Cache Engine.
 * @param Object $data
 * @param String $filename File Path to save data cache in
 * @return boolean 
 */
public function saveToCache($data,$filename) {  }
/**
 * You can read any type of data from the file that is saved by Cache Engine. But You Should be aware of
 * data type. Cache Engine can not describe about the data type.
 * @param String $filename File Path to read cache data
 * @return Object
 */
public function getFromCache($filename) {}
/**
 * Check Cache File is expired or not
 * @param String $filename Cache File Name
 * @param int $ttl Cache Time
 * @return boolean 
 */
public function isCacheExpired($filename,$ttl){ }
/**
 * This Function Execute Query on Database like executeQuery() Function But it also use 
 * <b>Cache Engine</b> So it reduce load of database server hence handle more trafic.
 * You can use also more then one key for $key like id,aname,dob. 
 * @param String $sql Sequel Query Optional
 * @param int $ttl Cache Time in seconds Optional Default=0 mean no use of cache engine
 * @param String $filename Cache File Path Optional Dafult= auto generated by cache engine
 * @param String $keymap Unique key map data record, Default='id' Optional
 * @param boolean $issave Optional Default=false, if true it will update data into database which is changed in cache engine.
 * @return array 
 * @example $data = $mysql->fetchQuery("SELECT * FROM userID WHERE age=20");<br>
 * print_r($date);<br>
 * $data is a associative array which has complete data which is return by cache engine.<br>
 * $data['news'] menas records from databse<br>
 * $data['new'] menas new records in cache<br>
 * You can add new record to cache by insertCache(),deleteCache(),updateCache() Functions
 */
public function fetchQuery($sql="",$ttl=0,$filename='',$keymap='id',$issave=false) {}
/**
 * Insert new Record in Cache. $data associative array with field name and value pair. $tbls = hold table
 * name of database, need if you want insert $data also in database as new record. if you set $tbls then $sql
 * is auto generated with $data and $tbls variables but if you want create you own SQL then pass it into $sql
 * variable of function. if $sql is not given then it will auto generate with $data,$tbls. If $sql and $tbls
 * is not given then there are not any insert in database so it only insert in cache. 
 * @param String $filename Cache File Path
 * @param String $keymap Unique key value for each new record of database, normal use time stamp or any other if you need update cache later
 * @param array $data Optional one Row(Record) for Cache Engine or database
 * @param String $tbls Optional
 * @param String $sql Optional
 * @return boolean 
 */  
public function insertCache($filename,$keymap,$data=array(),$tbls='',$sql='') {}
/**
 * Delete all content of Cache.
 * @param String $filename Cache File Path 
 */
public function clearCache($filename) {}
/**
 * Update Data of Cache. Use $keymap as indentifier of record which you want to update and it should
 * be same as $keymap in fetch query otherwise you add separate record in cache and which is only
 * use if you want to process only update query on database. Assume data record in not find in cache but
 * you want to update a record which is not in cache then you will require a separate new $keymap to 
 * update that data. if $sql is not given then it will auto generate with $data,$tbls,$where. If $sql and $tbls
 * is not given then there are not any update in database so it only update in cache. 
 * @param String $filename
 * @param String $keymap
 * @param array $data Optional use if you want to update old data in cache
 * @param String $where Optional
 * @param String $tbls Optional
 * @param String $sql Optional
 * @return boolean 
 */
public function updateCache($filename,$keymap,$data=array(),$where='',$tbls='',$sql='') { }
/**
 * Delete Data of Cache. Use $keymap as indentifier of record which you want to delete and it should
 * be same as $keymap in fetch query otherwise this can not delete any record in cache and which is only
 * use if you want to process only delete query on database. Assume data record is not find in cache but
 * you want to delete a record which is not in cache then you will require a separate new $keymap to 
 * delete that data. if $sql is not given then it will auto generate with $tbls,$where. If $sql and $tbls
 * is not given then there are not any record delete in database so it only delete in cache. 
 * @param String $filename
 * @param String $keymap
 * @param String $where Optional
 * @param String $tbls Optional
 * @param String $sql Optional
 * @return boolean 
 */
public function deleteCache($filename,$keymap,$where='',$tbls='',$sql='') { }
/**
 * This function help to Cache SQL into Cache Engine. These SQL process later on database.
 * You can add,overwrite SQL statement with $keymap. $priority manage order to process SQL.
 * @param String $filename
 * @param String $keymap
 * @param String $sql
 * @param int $priority Optional Default=1
 * @return boolean 
 */
public function updateCacheSQL($filename,$keymap,$sql,$priority=1) { }
/**
 * This function process all SQL statement on the database.
 * @param String $filename
 * @return boolean 
 */
public function executeUpdateCacheSQL($filename) { }
/**
 * Convert Table Data into SQL statements
 * @param String $tablenl Table Name
 * @param String $where Optional
 * @return string 
 */
public function getTableSQL($tablenl,$where=""){}


}

?>