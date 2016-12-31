<?php 
############################################################## 
## MakeDir - Andrew Heebner - Elite@LibAir.com - 10/03/1999 ## 
##                                                          ## 
##               NAME THIS FILE - tests.php3                ## 
############################################################## 

// START MAIN MAKEDIR FUNCTION 
if ($makedir ==  "MakeDir") { 
   $content = "$direct"; 
   $dirmake = mkdir("$content", 0777); 

// DISPLAY LINK TO DIRECTORY AFTER MAKING IT 
PRINT    "<center>\n"; 
PRINT    "<a href=\"$content\">CLICK HERE TO VIEW YOUR NEW DIRECTORY</a>\n"; 
PRINT    "</center>\n"; 

} 

// MAIN FORM TO INPUT INFORMATION 
PRINT    "<form action=\"tests.php3?action=direct\">\n"; 
PRINT    "<INPUT TYPE=\"text\" NAME=\"direct\" SIZE=\"15\">\n"; 
PRINT    "<br>\n"; 
PRINT    "<INPUT TYPE=\"submit\" NAME=\"makedir\" VALUE=\"MakeDir\">\n"; 
PRINT    "</FORM>\n"; 

?>
