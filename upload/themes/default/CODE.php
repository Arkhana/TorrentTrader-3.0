
<!-- START INFOBAR -->
<?php
                    if (!$CURUSER){
                        echo "[<a href=\"account-login.php\">".T_("LOGIN")."</a>]<B> ".T_("OR")." </B>[<a href=\"account-signup.php\">".T_("SIGNUP")."</a>]";
        
        }else{
        
            print (T_("LOGGED_IN_AS").": ".$CURUSER["username"]. "");
            $userdownloaded = mksize($CURUSER["downloaded"]);
            $useruploaded = mksize($CURUSER["uploaded"]);
            
            if ($CURUSER["uploaded"] > 0 && $CURUSER["downloaded"] == 0)
            $userratio = "Inf.";
            elseif ($CURUSER["downloaded"] > 0)
            $userratio = number_format($CURUSER["uploaded"] / $CURUSER["downloaded"], 2);
            else
            $userratio = "---";
            
            print (",  <img src='themes/NB-TT/images/downloaded.png' border='none' height='20' width='20' alt='Downloaded' title='Downloaded'> <font color='#CC0000'>$userdownloaded </font> <img src='themes/NB-TT/images/Uploaded.png' border='none' height='20' width='20' alt='Uploaded' title='Uploaded'> <font color='#009900'>$useruploaded</font> <img src='themes/NB-TT/images/ratio.png' border='none' height='20' width='20' alt='Ratio' title='Ratio'> $userratio");
        
            echo " <a class='profile' href='account.php'><img src='themes/NB-TT/images/blank.gif' border='none' height='20' width='20' alt='Your account' title='Your account'></a> <a class='account' href='account-details.php?id=$CURUSER[id]'><img src='themes/NB-TT/images/blank.gif' border='none' height='20' width='20' alt='Profile' title='Profile'></a> <a class='logout' href=\"account-logout.php\"><img src='themes/NB-TT/images/blank.gif' border='none' height='20' width='20' alt='Logout' title='Logout'></a> ";
        
            if ($CURUSER["control_panel"]=="yes") {
        
                print("<a class='admincp' href=admincp.php><img src='themes/NB-TT/images/blank.gif' border='none' height='20' width='20' alt='Admincp' title='Admin CP'></a> ");
        
            }
        
            //check for new pm's
        
            $res = mysql_query("SELECT COUNT(*) FROM messages WHERE receiver=" . $CURUSER["id"] . " and unread='yes' AND location IN ('in','both')") or print(mysql_error());
        
            $arr = mysql_fetch_row($res);
        
            $unreadmail = $arr[0];
        
            if ($unreadmail){
        
                print("<a class='mail_n' href=mailbox.php?inbox><img src='themes/NB-TT/images/blank.gif' border='none' height='20' width='20' alt='New PM' title='($unreadmail) New PM'S'></a></a>&nbsp;");
        
            }else{
        
                print("<a class='mail' href=mailbox.php><img src='themes/NB-TT/images/blank.gif' border='none' height='20' width='20' alt='My Messages' title='My Messages'></a>&nbsp;");
        
            }
        
            //end check for pm's
        
        }
        
        ?>
<!-- END INFOBAR -->

<!-- START NAVIGATION -->
<ul>
  <li><a href="index.php"><?php echo T_("HOME");?></a></li>
  <li><a href="forums.php"><?php echo T_("FORUMS");?></a></li>
  <li><a href="torrents-upload.php"><?php echo T_("UPLOAD_TORRENT");?></a></li>
  <li><a href="torrents.php"><?php echo T_("BROWSE_TORRENTS");?></a></li>
  <li><a href="torrents-today.php"><?php echo T_("TODAYS_TORRENTS");?></a></li>
  <li><a href="torrents-search.php"><?php echo T_("SEARCH_TORRENTS");?></a></li>
</ul>
<!-- END NAVIGATION -->

<!-- START LEFT COLUM -->
<?php if ($site_config["LEFTNAV"]){?>
<?php leftblocks();?>
<?php } //LEFTNAV ON/OFF END?>
<!-- END LEFT COLUM -->

<!-- START MAIN COLUM -->
<?php
if ($site_config["MIDDLENAV"]){
	middleblocks();
} //MIDDLENAV ON/OFF END
?>
<!-- END MAIN COLUM -->

<!-- START RIGHT COLUMN -->
<?php if ($site_config["RIGHTNAV"]){ ?>
<?php rightblocks(); ?>
<?php } ?>
<!-- END RIGHT COLUMN -->

<!-- START FOOTER CODE -->
<?php
//
// *************************************************************************************************************************************
//			PLEASE DO NOT REMOVE THE POWERED BY LINE, SHOW SOME SUPPORT! WE WILL NOT SUPPORT ANYONE WHO HAS THIS LINE EDITED OR REMOVED!
// *************************************************************************************************************************************
print ("<CENTER>Powered by <a href=\"http://www.torrenttrader.org\" target=\"_blank\">TorrentTrader v".$site_config["ttversion"]."</a> - ");
$totaltime = array_sum(explode(" ", microtime())) - $GLOBALS['tstart'];
printf("Page generated in %f", $totaltime);
print (" - <a href='rss.php'><img src='".$site_config["SITEURL"]."/images/icon_rss.gif' border='0' width='13' height='13' alt='' /> - <a href=rss.php?custom=1>Feed Info</a> - Theme By: <a href=\"http://nikkbu.info\" target=\"_blank\">Nikkbu</a></CENTER>");
//
// *************************************************************************************************************************************
//			PLEASE DO NOT REMOVE THE POWERED BY LINE, SHOW SOME SUPPORT! WE WILL NOT SUPPORT ANYONE WHO HAS THIS LINE EDITED OR REMOVED!
// *************************************************************************************************************************************
//
?>
<!-- END FOOTER CODE -->
