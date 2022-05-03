<html>
<head>
<title>
  Local File Inclusion
</title>
<style>
html {
  background: #1c2841;
  color: white;
  font-family: "Courier New";
}
a {
  color: white;
}
.lecture {
  margin: auto;
  width: 850px;
}
</style>
</head>
<body>
<?php

$file = $_GET['page'];

if( isset( $file ) )
  include( $file );
else {
  header( 'Location:?page=include.php' );
  exit;
}

?>
</body>
<html>
