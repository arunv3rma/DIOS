<?php

/**
 * ==============================================================================
 * title           :ldap.php
 * description     :This will create a header for a php script.
 * author          :"Arun Verma"
 * copyright       :"Copyright 2016, The Department Internal Online System(DIOS) Project"
 * credits         :["Arun Verma",]
 * date            :21/6/16 12:43 AM
 * license         :"Apache License Version 2.0"
 * version         :0.1.0
 * php_version     :PHP 7.0.4
 * maintainer      :"Arun Verma"
 * email           :"v.arun@iitb.ac.in"
 * status          :"D" ["Development(D) or Production(P)"]
 * last_update     :21/6/16 by Arun Verma
 * ==============================================================================
 */

/**
 * ldap_auth used to authentication of user
 * @param $ldap_id
 * @param $ldap_password
 * @return string
 */
function ldap_auth($ldap_id, $ldap_password){
    $ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
    if($ldap_id=='') die("You have not entered any LDAP ID. Please go back and fill it up.");
    if($ldap_password=='') die("You have not entered any password. Please go back and fill it up.");
    $sr = ldap_search($ds,"dc=iitb,dc=ac,dc=in","(uid=$ldap_id)");
    $info = ldap_get_entries($ds, $sr);
    $roll = $info[0]["employeenumber"][0];

    //print_r($info);
    $ldap_id = $info[0]['dn'];
    if(@ldap_bind($ds,$ldap_id,$ldap_password)){
        return $roll."|".$ldap_id;
    }
    else
    {
        return "NONE";
    }

}

echo ldap_auth($_POST['user'], $_POST['pass']);
