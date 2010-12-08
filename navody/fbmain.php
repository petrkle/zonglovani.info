<?php
    //facebook application
    //set facebook application id, secret key and api key here
    $fbconfig['appid' ] = "181040748578128";
    $fbconfig['secret'] = "fe6ce8297a69b51b82ebbe4b7618e33f";

    //set application urls here
    $fbconfig['baseUrl']    =   "http://zonglovani.info/navody";
    $fbconfig['appBaseUrl'] =   "http://apps.facebook.com/zonglovani";

    $uid            =   null; //facebook user id

    try{
        include_once "../lib/facebook.php";
    }
    catch(Exception $o){
        echo '<pre>';
        print_r($o);
        echo '</pre>';
    }
    // Create our Application instance.
    $facebook = new Facebook(array(
      'appId'  => $fbconfig['appid'],
      'secret' => $fbconfig['secret'],
      'cookie' => true,
    ));

    //Facebook Authentication part
    $session = $facebook->getSession();
    $loginUrl = $facebook->getLoginUrl(
            array(
            'canvas'    => 1,
            'fbconnect' => 0,
            'req_perms' => 'email,publish_stream,status_update,user_location'
            )
    );

    $fbme = null;

    if (!$session) {
        echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
        exit;
    }
    else {
        try {
            $uid      =   $facebook->getUser();
            $fbme     =   $facebook->api('/me');

        } catch (FacebookApiException $e) {
            echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
            exit;
        }
    }

    function d($d){
        echo '<pre>';
        print_r($d);
        echo '</pre>';
    }
?>
