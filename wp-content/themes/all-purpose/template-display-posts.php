<?php 
/*
Template Name: full-width layout
Template Post Type: post, page, event
*/
$images = usp_get_post_images(); 
foreach ($images as $image) echo $image;
?>
