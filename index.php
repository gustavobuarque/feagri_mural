<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>promise demo</title>
  <style>
  div {
    height: 50px;
    width: 50px;
    float: left;
    margin-right: 10px;
    display: none;
    background-color: #090;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<button>Go</button>
<p>Ready...</p>
<div></div>
<div></div>
<div></div>
<div></div>
 
<script>
$( "button" ).on( "click", function() {
  $( "p" ).append( "Started..." );
 
 
  $( "div" ).each(function( i ) {
    $( this ).fadeIn().fadeOut( 1000 * ( i + 1 ) );
  });
 
  $( "div" ).promise().done(function() {
    $( "p" ).append( " Finished! " );
  });
});
</script>
 
</body>
</html>