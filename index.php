<?php

/**
 * @file
 * The PHP Page that serves all the pages from this (sub-)domain.
 *
 * The routines called here call the appropriate handlers and their 
 * corresponding pages.
 */
 
/*
 * Root directory of CMSEngine
 */
define('CMSENGINE_ROOT', getcwd());
//require_once(CMSENGINE_ROOT."/_lib/_base/basics.php");

//Process the URL requested
#remove the directory path we don't want 
/*
    $requestURI = explode('/', $_SERVER['REQUEST_URI']);
    $scriptName = explode('/',$_SERVER['SCRIPT_NAME']);
//To resolve non-absolute paths    
    for($i= 0;$i < sizeof($scriptName);$i++)
    {
        if ($requestURI[$i]     == $scriptName[$i])
        {
            unset($requestURI[$i]);
        }
    }
    $uri_test = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['REQUEST_URI']);
    
$command = array_values($requestURI);
  echo '<pre>';
  print_r($command);
  echo '</pre>';
  //check installation status
require_once(CMSENGINE_ROOT."/_lib/_base/basics.php");

//Render the rest of the website
//header("Location: ".BASE_URL."/site");
//die();
switch($command[0])
{
    case 'core':
    case 'login':
        header('Location: /core/index.php');
    default:
        header('Location: /site'.$uri_test);
}
*/

//Process incoming URL
$incoming_url = parse_url($_SERVER['REQUEST_URI']);
//Incoming Path: Determines the directory requested
$path = $incoming_url['path'];
//Split the path into separate variables
$path_array= explode('/',$path);
//All links will henceforth be relative, remove root if it exists
if(empty($path_array[0]))
{
    unset($path_array[0]);
}
//Save any incoming GET query
if(isset($incoming_url['query'])&& !empty($incoming_url['query']))
    $query = $incoming_url['query'];

else
    $query = '';

//Now, feed it to the stage 1 router engine
//If a script was requested, serve a similar script from /site
$request = array_values($path_array);
//It is sufficient to check the 0th entry of this to determine where the request
// must be routed
$full_path='';
switch($request[0])
{
    case 'core':
    case 'login':
        header('Location: /core'.$full_path);
        die();
    case 'site':
        foreach($request as $path_fragment)
        {
            $full_path .= '/'.$path_fragment;
        }
        header('Location: /site'.$full_path.$query);
        die();
    default:
        foreach($request as $path_fragment)
        {
            if(!empty($path_fragment))
            $full_path .= '/'.$path_fragment;
        }
        if(!empty($query))
        {
            $full_path .= '?'.$query;
        }
        header('Location: /site'.$full_path);
        die();
}