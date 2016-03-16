
<?php 
//print_r($_POST);

if($_SERVER['REQUEST_METHOD']=='POST') {
$to  = "naisadibookhouse@gmail.com";
$subject = 'Enquiry';
$message = '
<html>
<head>
 <title> Contact Us</title>
</head>
<body>
 
 <table>
   
   <tr>
     <td colspan=2>Hi Admin,</td>
   </tr>
   
   <tr>
     <td height=10 colspan=2>&nbsp;</td>
   </tr>
   
    <tr>
     <td  colspan=2>'.$_POST['name'].' has been Contact to you. The full information is given below:</td>
   </tr>
    <tr>
     <td height=10 colspan=2>&nbsp;</td>
   </tr>
   <tr>
    <td>Name: </td>
     <td>'.$_POST['name'].'</td>
   </tr>
    <tr>
    <td>Email: </td>
     <td>'.$_POST['email'].'</td>
   </tr>
    
<tr>
   <td>Phone No.: </td>
     <td colspan=1>'.$_POST['phone'].'</td>
   </tr>
   <tr>
   <td>Website: </td>
     <td colspan=1>'.$_POST['website'].'</td>
   </tr>
   <tr>
   <tr>
   <td>Address: </td>
     <td colspan=1>'.$_POST['address'].'</td>
   </tr>
   
   
   
   <tr>
   <td>Enquiry: </td>
     <td colspan=1>'.$_POST['enquiry'].'</td>
   </tr>
   
 </table>
</body>
</html>
';
//echo $message; die;
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:<naisadibookhouse@gmail.com>'. "\r\n";
$m= mail($to, $subject, $message, $headers);
}
if($m){
$msg="Your query has been successfully post.";
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8 " />
<meta http-equiv="Content-Type" content="text/html; charset=utf-16 " />
<title>School</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/flexdropdown.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript" src="js/flexdropdown.js">

/***********************************************
* Flex Level Drop Down Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>


<script type="text/javascript" src="fadeslideshow.js">

/***********************************************
* Ultimate Fade In Slideshow v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>

<script type="text/javascript">

var mygallery=new fadeSlideShow({
	wrapperid: "fadeshow1", //ID of blank DIV on page to house Slideshow
	dimensions: [1010, 340], //width/height of gallery in pixels. Should reflect dimensions of largest image
	imagearray: [
		["images/book_banner.png", "", "", ""],
		["images/book_banner1.png", "", "", ""],
		["images/book_banner.png"],
		["images/book_banner2.png", "", "", ""] //<--no trailing comma after very last image element!
	],
	displaymode: {type:'auto', pause:2500, cycles:0, wraparound:false},
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	descreveal: "ondemand",
	togglerid: ""
})


</script>



</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" bgcolor="#B076CD"><table width="980" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="107" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="1%">&nbsp;</td>
            <td width="47%"><img src="images/logo.png" /></td>
            <td width="51%" height="107" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="27">&nbsp;</td>
                <td width="8%" rowspan="3"><img src="images/phone_icone.png" height="57" /></td>
                <td class="phone_icone">&nbsp;</td>
              </tr>
              <tr>
                <td width="23%" height="27">&nbsp;</td>
                <td colspan="2" width="69%" class="phone_icone" valign="top">011-27658461 - 62 ,27652700, </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td width="69%" class="phone_icone"><strong>Fax: </strong>011 - 27658461</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="center" colspan="2" width="69%"  class="phone_icone">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/fb.png" alt="" height="26" />&nbsp;&nbsp;&nbsp;<img src="images/twit.png" alt="" height="26" />&nbsp;&nbsp;&nbsp;<img src="images/in.png" alt="" height="24" /></td>    </tr>
              
              
            </table></td>
            <td width="1%">&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td bgcolor="#FFFFFF" colspan="3"><div id="menu">
              <ul>
                <li class="a1"><a href="index.html" class="active" > Home </a></li>
                <li class="a2"><a href="about_us.html" > About Us</a></li>
                <li class="a3"> <a href="new_release.html" >New Release </a></li>
                 <li class="a3"> <a href="new_arrival.html" >New Arrival </a></li>
                <li class="a4"><a href="#" data-flexmenu="flexmenu1">Book1</a></li>
                <li class="a5"> <a href="#" data-flexmenu="flexmenu2">Book2</a></li>
                <li class="a6"> <a href="gallery.html">Gallery</a></li>
                <li class="a7"> <a href="contact.html" >Contact Us</a></li>
              </ul>
            </div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><img src="images/speacer.png" width="1" height="4" /></td>
      </tr>
      
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="71%" colspan="3"><div id="fadeshow1"></div></td>
                
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      
      
      
      <tr>
        <td bgcolor="#FFFFFF"  style="margin:1px;"><img src="images/line.jpg" alt="" width="1008" height="5" /></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="1%">&nbsp;</td>
            <td width="98%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="671" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="39" class="heading" style=" border-bottom:2px dotted #FFA8FF;">Welcome to Nai Sadi Book House</td>
                  </tr><tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><p class="text"><strong>Nai Sadi Prakashan Pvt. Ltd.</strong> established by Mr. Satish Verma has been publishing books in Hindi and English for the past more than one and a half decades on around three hundred topics reflecting true spirit of India besides rendering wisdom, knowledge and intelligence to our readers from all walks of life finding place among best sellers at home and abroad.
The company is also engaged in publishing various magazines such as Madhur Kathayen, Mahanagar Kahaniyan, Crime & Detective, Cricket Bharati, Sujeevan and Nai Sadi systematically streamlined by Senior Editor Mr. Shailabh Rawat since inception.
 </p></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center"><img src="images/step.png" /></td>
                  </tr>
                </table></td>
                <td width="15">&nbsp;</td>
                <td width="275" valign="top" class="right_image1"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="4%" height="42">&nbsp;</td>
                    <td width="91%" class="heading1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enquiry Form</td>
                    <td width="5%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="42">&nbsp;</td>
                    <td valign="top"><div class="text">
                      
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr><td colspan="3">&nbsp;</td></tr>
  <tr>
    <td colspan="3"><?php echo $msg; ?></td>
  </tr>
  
</table>

                      
                      
                      
                      
                      
                    </div></td>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
            <td width="1%">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><img src="images/line.jpg" alt="" width="1008" height="5" /></td>
      </tr>
      
      
      <tr>
        <td bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
          <tr>
          <td bgcolor="#292929">&nbsp;</td>          
          </tr>
          
           
            <tr>
              <td class="footer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.html"><font color="#FFFFFF">Home</font></a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="about_us.html"><font color="#FFFFFF">About Us</font></a> &nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;<a href="new_arrival.html"><font color="#FFFFFF">New Arrival</font></a> &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;<a href="new_release.html"><font color="#FFFFFF">New Release</font></a> &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp; <a href="gallery.html"><font color="#FFFFFF">Gallery</font></a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp; <a href="contact.html"><font color="#FFFFFF">Contact Us</font></a>  </td>
            </tr>
            <tr>
              <td height="2" bgcolor="#292929"></td>
            </tr>
            <tr>
              <td class="footer"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;© Nai Sadi Prakashan Pvt .Ltd</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Website Designed By - <a href="http://starwebmaker.com" target="_blank"><font color="#fff">Star Web Maker</font></a></strong></td>
            </tr>
              <tr>
          <td bgcolor="#292929">&nbsp;</td>          
          </tr>
          </tbody>
        </table></td>
      </tr>
    
    </table></td>
  </tr>
</table>
</body>
</html>

<ul id="flexmenu1" class="flexdropdownmenu">
<li><a href="tantra_mantra.html"><strong>तंत्र-मंत्र एवं ज्योतिष</strong> </a></li>
<li><a href="vastu.html"><strong>वास्तु सम्बन्धी पुस्तकें</strong> </a></li>
<li><a href="utkrast.html"><strong>उत्कृष्ट साहित्य</strong> </a></li>
<li><a href="rogopchar.html"><strong>रोगोंपचार सीरीज </strong> </a></li>
<li><a href="vichar.html"><strong>विचारोतेजक खोजपूर्ण साहित्य</strong> </a></li>
<li><a href="aatmvikas.html"><strong>आत्मविकास</strong> </a></li>

</ul>


<ul id="flexmenu2" class="flexdropdownmenu"><li><a href="dhrm.html"><strong>धर्म दर्शन</strong> </a></li>
<li><a href="nitisahitya.html"><strong>नीति साहित्य</strong> </a></li>
<li><a href="banaiye.html"><strong>बनाइए-खाइए</strong> </a></li>
<li><a href="hasy.html"><strong>हास्य-व्यंग्य</strong> </a></li>
<li><a href="yaunsamdandhi.html"><strong>यौन विज्ञान सम्बन्धी पुस्तकें</strong> </a></li>
</ul>