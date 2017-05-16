@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    </head>
    <body>
        @section('content')
        <?php 
        if (Auth::check()){
            echo "<h1 class='text-center'>Palmeiras não tem Mundial :D</h1>";
        }else{
            echo "<h1 class='text-center'>Faça o login para ver o Easter Egg!</h1>";
        }
        ?>
        @endsection
    </body>
</html>