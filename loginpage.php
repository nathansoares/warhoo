<?php
include "conn.php";
?><form style="width:100%; margin-top:-15px;" name="loginform" method="post" action="loginconfig.php">
  <font face="Trebuchet MS, Arial, Helvetica, sans-serif" color="#fff">E-mail:</font>
  <input type="text" name="email" />
 <font face="Trebuchet MS, Arial, Helvetica, sans-serif" color="#fff">Password:</font>
 <input type="password" name="password" />
<input style="float:right; background-color:#06F; border:0px; margin-top:-4px;" class="btn btn-primary" type="submit" value="Login"/>

</form><a style="text-decoration:none; float:right" href="forgetpass.php"><h5 style="color:#fff">Forget your passoword?</h5></a>