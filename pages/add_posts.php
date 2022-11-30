<?php

require_once "../app/database/connection.php";
// require_once "app/database/functions.php";
require_once "../path.php";
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


    <link rel="stylesheet" href="../assets/styles.css?v=2.09">

    <title>Add New Post - CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    
<div class="main-container">
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

<?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
        
<div class="main">
    <div class="page-header mx-auto">
        <p class="page_title">Add New Post</p>
    </div>

    <div class="main-content">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas commodo lacus eget neque rutrum, vel consectetur ligula eleifend. Nam gravida, ligula sit amet malesuada rhoncus, metus elit maximus ipsum, at vehicula lectus orci vitae felis. Sed vel risus rutrum, auctor velit id, varius felis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales quam sed lobortis scelerisque. Duis quis sodales orci, sed vestibulum nisl. Quisque ipsum ex, auctor ut massa a, dictum dictum leo. Morbi auctor consequat bibendum.

Mauris elit erat, volutpat quis ipsum sed, ullamcorper vestibulum enim. Nullam ut massa libero. Duis scelerisque maximus pretium. Vestibulum vel eros fermentum, iaculis arcu et, commodo libero. Nulla non interdum elit. Pellentesque ante nisl, aliquet vitae suscipit eget, accumsan ac enim. Donec eu pulvinar augue, vel ultricies velit. Maecenas metus lorem, semper quis euismod vel, pharetra in risus. Morbi malesuada ultrices tincidunt. Proin et varius elit. Duis odio dui, interdum ut euismod quis, hendrerit sit amet sem. Donec finibus vehicula quam vel imperdiet. Quisque semper faucibus ipsum, a pretium risus blandit non. Pellentesque ac lacus nunc.

Ut nec metus maximus, gravida justo eu, consequat justo. Vivamus hendrerit placerat purus, non tincidunt nisl posuere et. Suspendisse laoreet ornare faucibus. Duis viverra pharetra mauris non convallis. Cras ullamcorper non tortor non malesuada. Nulla facilisi. Vivamus ut mauris in nisl commodo hendrerit vehicula non purus. Quisque id gravida ligula, quis porta justo. Duis luctus lectus vel rhoncus pellentesque. Nam vulputate elit ac massa dictum hendrerit. Pellentesque consequat mi non felis porttitor, et mattis leo euismod. Nam auctor tristique dapibus. Duis porta erat eget nisi semper, id rutrum libero scelerisque. Integer ac ligula id leo hendrerit pulvinar ac id magna. Curabitur mollis, magna nec blandit pellentesque, nibh dui iaculis nisl, sit amet imperdiet lectus nisi id risus. Phasellus pharetra mauris vel iaculis ullamcorper.

Morbi cursus, purus ac venenatis tempus, dui felis malesuada magna, nec dapibus neque mauris ut ante. Proin sed est velit. Donec sit amet mi diam. Donec semper magna et pretium efficitur. Quisque pulvinar, orci id rhoncus suscipit, elit lorem euismod libero, a convallis mauris lectus et lectus. Quisque vestibulum dignissim nisi nec mattis. In ullamcorper risus suscipit ex luctus pharetra. Ut tristique tortor dui, in feugiat neque finibus ac. Nullam ultricies porttitor justo, facilisis finibus urna accumsan vulputate. Phasellus a eros turpis.

Praesent odio magna, tristique id aliquet vitae, lobortis ac metus. Nam laoreet nibh ut tellus maximus, quis viverra quam aliquet. Nullam metus mi, euismod ut erat in, accumsan consequat massa. Aliquam quis mauris nec velit elementum molestie luctus sit amet diam. Morbi sit amet elit sit amet ante feugiat dictum. Praesent interdum imperdiet tempus. Aliquam blandit erat eget vehicula condimentum. Etiam vulputate finibus augue, ac consequat dui vulputate in. Nunc ac aliquam purus. Quisque euismod, ex nec consectetur sollicitudin, tortor dolor mattis urna, sit amet gravida orci ex vel elit. Nullam consectetur dui sit amet massa hendrerit molestie. Nulla auctor sem in odio vestibulum, a dictum lorem mattis.

In id accumsan erat, vel malesuada nunc. Fusce eu lobortis odio. Nam ipsum arcu, vulputate vel magna iaculis, bibendum elementum leo. Sed eu leo ut arcu tincidunt porta. Etiam tincidunt tortor in leo luctus tempus. Morbi in ante dui. Aliquam tincidunt mauris sapien, et aliquam dolor molestie non. In pharetra porta justo non faucibus. Duis a accumsan nibh, vel vehicula augue. Duis venenatis dui tortor, eget pharetra augue hendrerit at. Nam iaculis bibendum molestie. Ut non sem ac turpis sagittis dictum. Proin elit risus, sagittis in nibh et, volutpat egestas metus. Nullam non eros pellentesque, aliquam lacus nec, finibus risus. Aenean lacinia finibus lacus at dictum.

Integer quis condimentum felis. Duis sit amet laoreet ex, quis elementum dui. Duis et mi efficitur, vulputate dolor vitae, convallis nulla. Aliquam placerat rutrum finibus. Donec bibendum sem sed arcu vulputate malesuada. Aenean sit amet lacus at tellus tempus blandit vel ut urna. Phasellus mi mi, laoreet sit amet tincidunt sed, gravida vitae nibh.

Proin bibendum nunc vel arcu pellentesque cursus. Aenean consequat odio metus, et laoreet neque tincidunt in. Suspendisse tincidunt massa metus, sed elementum arcu auctor luctus. Cras eget orci non orci fringilla pretium ac at risus. Phasellus sodales libero quis diam aliquam pulvinar. Vivamus fermentum massa sed egestas elementum. Donec vel tellus sed lectus viverra imperdiet eget eu enim. Integer eu consectetur odio, eget elementum purus.

Pellentesque id elit ac lorem dictum ornare. Nunc vitae consequat nibh. Nam interdum fringilla ullamcorper. Mauris ligula nisl, facilisis eget ligula sit amet, ullamcorper aliquam nunc. Proin ornare ante sit amet neque sagittis rhoncus et eu massa. Ut pellentesque, tellus eget porta elementum, neque mi convallis lorem, vitae eleifend lacus erat in ex. Etiam nec elementum mauris, vitae fringilla eros. Nulla ullamcorper lacinia libero, eget dignissim diam bibendum vitae. Suspendisse id quam ac dui tincidunt ultrices nec ac augue. Suspendisse facilisis porta convallis. Morbi at nibh sed eros mollis dapibus. In at quam eget elit pulvinar auctor. Etiam libero nulla, tincidunt ut mi bibendum, ullamcorper ornare leo. Aenean congue, dolor porta efficitur rutrum, mi diam aliquam erat, in bibendum nisi risus a velit. Nulla facilisi. Nam rutrum sit amet mauris quis varius.

Fusce ut magna aliquet, rhoncus nibh non, sagittis lorem. Fusce eleifend, felis quis molestie porta, lorem nisi tincidunt massa, eget congue mauris leo ut nulla. Aliquam imperdiet consequat rutrum. Aliquam justo arcu, pharetra nec mattis sit amet, porttitor vel justo. Maecenas vel viverra mi. Nulla posuere, ex vitae varius sollicitudin, ex ligula mattis turpis, luctus aliquam dolor elit ut quam. Curabitur facilisis aliquam libero vel bibendum. Nulla bibendum erat purus, ut commodo magna dictum et. Quisque laoreet imperdiet porta. Suspendisse sit amet pharetra ante, vel venenatis diam. Praesent fringilla est nisi, vel volutpat purus blandit quis.

Duis bibendum diam eget odio mollis, sit amet facilisis quam convallis. Duis in ultrices purus. Aliquam erat volutpat. Suspendisse ac lacus ullamcorper, accumsan diam eu, vulputate sem. Phasellus nunc ex, suscipit et porta et, porttitor quis leo. Nam in sapien laoreet, ornare justo sit amet, hendrerit ex. Nullam urna augue, lacinia bibendum interdum lacinia, vestibulum nec orci. Vestibulum non maximus lacus. Suspendisse feugiat blandit lacinia. Nam eu porta ipsum. Proin tristique lobortis sem at malesuada. Cras condimentum nisl id nibh lacinia ullamcorper nec non urna. Sed at posuere metus.

Suspendisse consectetur risus quis sagittis eleifend. Nam velit quam, pulvinar eu sodales non, elementum ut arcu. Ut nec massa a justo fermentum auctor. Vivamus quis ipsum congue, tincidunt ligula id, rutrum elit. Sed accumsan sem sem, nec sollicitudin eros rhoncus ac. Nulla nec ex id nunc mollis blandit. Nullam ut aliquam nisi. Cras id accumsan lectus. Aliquam quis sagittis massa, nec laoreet ipsum. Morbi dictum efficitur lacus, luctus porttitor elit pellentesque ac.
    </div>
    
    
</div>



<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
  $(document).on('click', 'a', function() {
    $(this).addClass('active').siblings().removeClass('active')
  })
  $(document).on('click', 'ul li a', function() {
    $(this).removeClass('active')
  })
</script>


    <script src="../assets/js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>