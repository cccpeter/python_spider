<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>print</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body style="margin-bottom:5px">
<form action="<?php echo U('Home/Login/index');?>" method="post">
 name <input type="text" name="user_name"></br>
  password<input type="password" name="user_password"></br>
  <input type="submit" value="提交"></br>
  </form>
  </body>
</html>