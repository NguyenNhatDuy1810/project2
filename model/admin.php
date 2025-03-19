<?php
    
function logAction($adminName, $action){
    $query = "SELECT * FROM admin_logs ORDER BY timestamp DESC LIMIT 5";
  return  pdo_excute($query);
}

?>