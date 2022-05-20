<?php
 include_once "helpers.php";

 $task = "encode";
 if(isset($_GET['task']) && $_GET['task'] != ''){
   $task = $_GET['task'];
 }
 $key_data = "abcdefghijklmnopqrstuvwxyz1234567890";

 if('key' == $task){
  //Convert string to array
   $key_original = str_split($key_data);
   shuffle($key_original);
    
   //array to string 
   $key_data = join('',$key_original);
 }else if (isset($_POST['key']) && $_POST['key'] !=''){
      $key_data = $_POST['key'];
 }

 $scrambledData = '';
 if('encode' == $task){
    $data = $_POST['data']?? '';
    if($data != ''){
      $scrambledData = scrambleData($data,$key_data);
    }
 }


 if('decode' == $task){
    $data = $_POST['data']?? '';
    if($data != ''){
      $scrambledData = decodeData($data,$key_data);
    }
 }
echo $task;
 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Simple Data Scrambler Project</title>
  </head>
  <body>
    
        <div class="container">
            <div class="row">
                <a href="/data_scrambler.php?task=encode"></a>
                <a href="/data_scrambler.php?task=decode"></a>
                <a href="/data_scrambler.php?task=key"></a>
            </div>
            <br>
            <div class="row mx-5 my-3">
            <div class="text-center mb-3">
                <p>Data Scrambler Form:</p>
                <a href="/data_scrambler.php?task=encode" class="btn btn-primary btn-floating mx-1">
                Encode
                </a>

                <a href="/data_scrambler.php?task=decode" class="btn btn-primary btn-floating mx-1">
                Decode
                </a> 
                
                <a href="/data_scrambler.php?task=key" class="btn btn-primary btn-floating mx-1">
                Generate Key
                </a>
            </div>
                <form method="POST" action="data_scrambler.php<?php if('decode'==$task){ echo "/?task=decode"; } ?>">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example1">key</label>
                    <input type="text" id="form4Example1" name="key" class="form-control" <?php getKey($key_data); ?>  /> 
                    </div> 

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example3">Data</label>
                    <textarea class="form-control" id="form4Example3" name="data" rows="4"><?php if(isset($_POST['data'])){ echo $_POST['data']; } ?></textarea> 
                    </div> 

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example3">Output</label>
                    <textarea class="form-control" id="form4Example3" rows="4"><?php echo $scrambledData; ?></textarea> 
                    </div> 

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
              </form>
            </div>
        </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
