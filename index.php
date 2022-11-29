<?php

// require_once "app/database/connection.php";
// require_once "app/database/functions.php";
// require_once "path.php";
// session_start();

// if(isLoggedIn()){
//   header('location: '. BASE_URL . '/pages/dashboard.php');
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <link rel="stylesheet" href="assets/styles.css">

    <title>CacheUp Blog</title>


    <style>
.accordion .card {
	color: #424e5d;
	border: 1px solid #dddddd;
}
.accordion .card a {
	color: #424e5d;
	text-decoration: none;				
}
.accordion .card-header {
	background: linear-gradient(#fff, #f1f1f1);
	padding: .75rem 1rem;
	position: relative;
}
.accordion .card-header:hover {
	background: linear-gradient(#f1f1f1, #e8e8e8);
}
.accordion .card-header h2 {
	font-size: 1rem;
}
.accordion .fa {
	width: 20px;
	margin-right: .25rem;
}
.accordion .card-header a {
	float: left;
	width: 100%;
	cursor: pointer;
}
.accordion .toggle {
	font-size: .8rem;
	line-height: .8rem;
	cursor: pointer;
	opacity: 0.7;
	position: absolute;
	right: 16px;
	top: 16px;
	width: 14px;
	margin: 0;
}
.accordion .toggle:hover {
	opacity: 1;
}
.accordion .card-body {
	padding: 0;
}
.accordion .list-group-item {				
	border-radius: 0;
	border-width: 1px 0 1px 0;
	padding-left: 30px;
	background: #d6dbe0;
	font-weight: 500;
}
.accordion .list-group-item:hover {
	background: #007bff;
}
.accordion .list-group-item:hover a {
	color: #fff !important;
}
.accordion .list-group-item:hover .badge{
	background: #fff;
	color: #007bff;
}
.accordion .list-group-item a {
	color: #61656b;
	display: block;
}
.accordion .list-group-item .badge {
	float: right;
	min-width: 36px;
}
.accordion .rotate{
	transform: rotate(180deg); 
}
</style>
<script>
$(document).ready(function(){			
	// Toggle plus minus icon on show hide of collapse element
	$(".collapse").on('show.bs.collapse', function(){
		$(this).parent(".card").find(".toggle").addClass("rotate");
	}).on('hide.bs.collapse', function(){
		$(this).parent(".card").find(".toggle").removeClass("rotate");
	});
});
</script>




</head>
<body>
    
    <?php include("app/includes/header.php"); ?>
    <?php include("app/includes/sidebar.php"); ?>

        

    
    <p>
        testing again new update
    </p>


    

    <!-- <script src="assets/js/dropdown.js"></script> -->
    /<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>