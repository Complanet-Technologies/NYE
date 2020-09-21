<?php
$bus_status = 'approved';
$get_business = $conn->prepare("SELECT* FROM businessnye WHERE `bus_status`=?");
$get_business->bind_param('s',$bus_status);
$get_business->execute();
$business_result = $get_business->get_result();

$get_blog = $conn->prepare("SELECT* FROM blog_postsnye");
$get_blog->execute();
$blog_result = $get_blog->get_result();

?>