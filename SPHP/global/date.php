<?php
/**
 * Return Week Start Date and End Date for given Date
 * @param String $date1 Date in d/m/Y Format
 * @return array 
 */
function getWeekDates($date1){}
/**
 * Return Month Start Date and End Date for given Date
 * @param String $date1 Date in d/m/Y Format
 * @return array 
 */
function getMonthDates($date1){  }
/**
 * Return Difference in Days
 * @param String $beginDate Date in MySQL (Y-m-d) Format
 * @param String $endDate Date in MySQL (Y-m-d) Format
 * @return int 
 */
 function dayDiff($beginDate, $endDate){    }
/**
 * Return Time Difference From Current Time
 * @param String $date Date in MySQL (Y-m-d) Format
 * @return string 
 */
function getTimeDiff($date){}
/**
 * Return Time Left From Current Time
 * @param String $date Date in MySQL (Y-m-d) Format
 * @return string 
 */
function getTimeLeft($date){}
/**
 * Create Date from specified date
 * @param String $beginDate Date in MySQL (Y-m-d) Format
 * @param int $offsetd
 * @param int $offsetm
 * @param int $offsety
 * @return Date 
 * @example Date after 42 days: echo createDate(date('Y-m-d',42,0,0));
 */
    function createDate($beginDate,$offsetd, $offsetm, $offsety){ }
/**
 * Convert MySQL Date Format into d/m/Y Format
 * @param String $df date in format d/m/Y
 * @return Date 
 */
    function mysqlToDate($df){}
/**
 * Convert Date Format d/m/Y to MySQL Format
 * @param String $df date in format Y-m-d
 * @return Date 
 */
    function dateToMysql($df){    }

?>