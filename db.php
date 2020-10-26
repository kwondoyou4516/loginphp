 <?php
  session_start();
  $db = new mysqli("localhost","root","123456789","eye", 3308);
  $db->set_charset("utf8");
  function mq($sql){
    global $db;
    return $db->query($sql);
  }
?>
