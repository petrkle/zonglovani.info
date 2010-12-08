<?php
    include_once "fbmain.php";
    if (isset($_REQUEST['ids'])){
        echo "Invitation Successfully Sent";
        echo '<pre>';
        print_r($_REQUEST);
        echo '</pre>';
        echo "<b>If you need to save these user ids then save these to database <br />then redirect user to the apps.facebook.com/yourapp url</b>";
        $string = "<script type='text/javascript'>top.location.href='{$fbconfig['appBaseUrl']}';</script>";
        echo "Use the following javascript code to redirect user <br />";
        echo htmlentities($string, ENT_QUOTES);
    }
    else {
?>
<fb:serverFbml style="width: 400px;">
    <script type="text/fbml">
      <fb:fbml>
          <fb:request-form
                    action="<?=$fbconfig['baseUrl']?>/invite.php"
                    target="_top"
                    method="POST"
                    invite="true"
                    type="Žonglérův slabikář"
                    content="Nauč se žonglovat se třemi míčky. <fb:req-choice url='<?=$fbconfig['appBaseUrl']?>' label='Ano' />"
                    >

                    <fb:multi-friend-selector
                    showborder="false"
                    actiontext="Nauč se žonglovat se třemi míčky.">
        </fb:request-form>
      </fb:fbml>
    </script>
  </fb:serverFbml>
<?php } ?>
