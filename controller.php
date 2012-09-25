<?php
ini_set('display_errors',1);
/*
*  Soli Deo Gloria
*  Copyright (c) Tim Holum, distributed
*  as-is and without warranty under the MIT License. See 
*  [root]/license.txt for more. This information must remain intact.
*/
require_once('../../config.php');
//require_once('class.grepfind.php');

class grepfind{
    var $path;
    var $searchstring;
    function __construct($request){
        $this->path =  $request['path'];
        $this->searchstring = $request['searchstring'];
    }
    function error($error){
        $error = array();
        $error['status'] = 'error';
        $error['data'] = array('error' => $error);
        echo json_encode($error);
    }
    function __call($name , $args){
        $this->error( $name . 'is not a valid function');
    }
    function search(){
        $input = $this->searchstring;//base64_decode($searchstring);
        //Might need to find a better way to do this, but for now it will have to work
        chdir(WORKSPACE);
        if($this->path[0] == "/"){
            $path = substr($this->path,1);
        } else {
            $path = $this->path;
        }
        $input = str_replace('"' , '', $input);
        $output = shell_exec('grep -i -I -n -R "' . $input . '" ' . $path . '/* ');
        $output_arr = explode("\n" , $output );
        $return = array();
       // $return[] = $path;
        foreach( $output_arr as $line){
            $data = explode(":", $line);
            $da = array();
            if( count($data) > 2 ){
                $da['line'] = $data[1];
                
                $da['file'] = '/' . $data[0];
                $da['string'] = str_replace($data[0] . ":" . $data[1] . ':' , '', $line);
                $return[] = $da;
            }
        }
        echo json_encode($return);
    }
}

$grepfind = new grepfind($_REQUEST);
$action = $_REQUEST['action'];
$grepfind->$action();


?>
