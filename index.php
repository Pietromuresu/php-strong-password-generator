<?php


$pattern_special= "! ? & % $ < > ^ + - * / ( ) [ ] { } @ # _ = ";
$pattern_numbers= range(0, 9);
$min = 33;
$max = 126;
$max_length = $_GET['maxLength'] ?? null;
function createPassword( $min, $max, $max_length, $pattern_special, $pattern_numbers){
  $random_password = '';
//   for ($i= 0; $i == $max_length - 1; $i++) {
//     $random_password .= chr(rand($min, $max));
//   }

//  if(strlen($random_password) == $max_length ){
//   foreach($pattern_numbers as $num){

//   }
//  } 
  
//   return $random_password;
    
  do{
    $random_password = '';
    for ($i= 0; $i <= $max_length - 1; $i++) {
    $random_password .= chr(rand($min, $max));
    }
  }while(str_contains($random_password, $pattern_numbers) && str_contains($random_password, $pattern_special) && strtoupper($random_password) == $random_password );

  return $random_password;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Strong Password Generator</title>
</head>
<body>
  <div class="container vh-100 d-flex align-items-center justify-content-center">


  <?php if(isset($max_length)):?>
    
    <h1 class="w-100">Your Password is: </h1> <br>

    <h3><?php echo createPassword( $min , $max, $max_length, $pattern_numbers,$pattern_special )?></h3>
  <?php else:?>
    <form action="index.php" method='GET'>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Type a length for your password</label>
        <input type="number" class="form-control" id="maxLength" name="maxLength">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    
    </form>
  <?php endif?>  


  </div>

</body>
</html>