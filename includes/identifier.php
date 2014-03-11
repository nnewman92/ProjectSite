<?php

$user_agent = getenv("HTTP_USER_AGENT");

$os = "";
if (strpos($user_agent, "Win") !== FALSE) {
    $os = "Windows"; 

}
else if(strpos($user_agent, "Mac") !== FALSE) {
    $os = "Mac";
}

?>