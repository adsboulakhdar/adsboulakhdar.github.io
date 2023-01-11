<?php
// Start the session
session_start();

//$_POST['range']= 0;
//$_POST['range']= 0;
// False because $b is NULL
if (isset($_POST['range'])) {


switch ($_POST['range']) {
  case '0':
    $_SESSION["range"] = 1;
	echo $_SESSION["range"];
    break;
  case '1':
    $_SESSION["range"] = 2;
	echo $_SESSION["range"];
    break;
  case 2:
    $_SESSION["range"] = 3;
	echo $_SESSION["range"];
    break;
  case 3:
    $_SESSION["range"] = 4;
	echo $_SESSION["range"];
    break;
  case 4:
   $_SESSION["range"] = 5;
   echo $_SESSION["range"];
    break;
  case 5:
    $_SESSION["range"] = 6;
	echo $_SESSION["range"];
    break;
  case 6:
    $_SESSION["range"] = 7;
	echo $_SESSION["range"];
    break;
  case 7:
    $_SESSION["range"] = 8;
	echo $_SESSION["range"];
    break;
  case 8:
    $_SESSION["range"] = 9;
	echo $_SESSION["range"];
    break;
  case 9:
    $_SESSION["range"] = 0;
	echo $_SESSION["range"];
  break;
      case NULL:
    $_SESSION["range"] = 0;
	echo $_SESSION["range"];
  break;
  default:
     $_SESSION["range"] = 0;
	 echo $_SESSION["range"];
}






}else
{

  $_SESSION["range"] = 0;
  echo $_SESSION["range"];

}

?>



<body onload="setTimeout(function() { document.frm1.submit() }, 10000)">

 <script>
  
   var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET', 'https://punchng.com/wp-json/wp/v2/posts');
    ourRequest.onload = function() {
      if (ourRequest.status >= 200 && ourRequest.status < 400) {
        var data = JSON.parse(ourRequest.responseText);
        console.log(data);

        data.map(function(timess){
            console.log(timess.date)
        })
        document.querySelector("#link").value=data[<?php echo $_SESSION["range"]; ?>].excerpt.rendered 
        document.querySelector("#linkk").value=data[<?php echo $_SESSION["range"]; ?>].content.rendered
        document.querySelector("#linkkk").value=data[<?php echo $_SESSION["range"]; ?>].slug
         document.querySelector("#titles").value=data[<?php echo $_SESSION["range"]; ?>].title.rendered
        document.querySelector("#categoriesz").value=data[<?php echo $_SESSION["range"]; ?>].x_categories
        document.querySelector("#imgMediaz").value=data[<?php echo $_SESSION["range"]; ?>].x_featured_media
         document.querySelector("#imgLargez").value=data[<?php echo $_SESSION["range"]; ?>].x_featured_media_large
          document.querySelector("#imgMediumz").value=data[<?php echo $_SESSION["range"]; ?>].x_featured_media_medium
        document.querySelector("#author").value=data[<?php echo $_SESSION["range"]; ?>].x_author
        document.querySelector("#datesmalls").value=data[<?php echo $_SESSION["range"]; ?>].x_date
        document.querySelector("#dateslong").value=data[<?php echo $_SESSION["range"]; ?>].date
		document.querySelector("#descriptionn").value=data[<?php echo $_SESSION["range"]; ?>].x_metadata._yoast_wpseo_metadesc

		

        



         }
    };
 ourRequest.send();
 

  
  </script>



   <form action=<?php echo $_SERVER['PHP_SELF']; ?> name="frm1" method="post">
      <input type="hidden" name="q" value="Hello world" />
	  
	  
	       <input type="text" name="contentlong" id="linkk" > <br>
     <textarea  name="contentsmalls" id="link"  rows="4" cols="50">HH </textarea><br>
     <input type="text" name="sluglink" id="linkkk" > <br>
     <input type="text" name="titlez" id="titles" > <br>
     <input type="text" name="categoriez" id="categoriesz" > <br>
     <input type="text" name="imgMedia" id="imgMediaz" > <br>
     <input type="text" name="imgLargez" id="imgLargez" > <br>
     <input type="text" name="imgMediumz" id="imgMediumz" > <br>
     <input type="text" name="author" id="author" > <br>
      <input type="text" name="datesmalls" id="datesmalls" > <br>
      <input type="text" name="dateslong" id="dateslong" > <br>
	    <input type="text" name="descriptionn" id="descriptionn" > <br>
	  <input type="text" name="range" id="range" value=<?php echo $_SESSION["range"]; ?>  > <br>
   </form>
</body>
<?php
if(isset($_POST['contentlong'])) 
{ 
   // $name = $_POST['name'];
   // echo "User Has submitted the form and entered this name : <b> $titlez </b>";
    echo "<br>You can use the following form again to enter a new name."; 
///////////////////////////////////////////////////////
// Create connection
$con = mysqli_connect("sql311.epizy.com","epiz_32994379","GVIi7k85HB","epiz_32994379_zwizli");
    // Check connection
$contentlong=$_POST['contentlong'];
$contentsmalls=$_POST['contentsmalls'];
$sluglink=$_POST['sluglink'];
$titlez=$_POST['titlez'];
$categoriez=$_POST['categoriez'];
$imgMedia=$_POST['imgMedia'];
$imgLargez=$_POST['imgLargez'];
$imgMediumz=$_POST['imgMediumz'];
$author=$_POST['author'];
$datesmalls=$_POST['datesmalls'];
$dateslong=$_POST['dateslong'];
$descriptionn=$_POST['descriptionn'];

//sleep for 3 seconds
//sleep(4);

$sql_u = "SELECT * FROM info WHERE titlez='$titlez'";
$res_u = mysqli_query($con, $sql_u);

if (mysqli_num_rows($res_u) > 0) {
    echo 'error!';
    $name_error = "Sorry... username already taken";
   }else{
       
    $query = "INSERT INTO info (contentlong, contentsmalls, sluglink, titlez, categoriez, imgMedia, imgLargez , imgMediumz,author, datesmalls, dateslong,descriptionn) 
    VALUES ('$contentlong', '$contentsmalls','$sluglink','$titlez','$categoriez','$imgMedia','$imgLargez','$imgMediumz','$author' ,'$datesmalls', '$dateslong','$descriptionn')";
$results = mysqli_query($con, $query);

echo 'Saved!';
/////////post faceb statr
$_message= rawurlencode($descriptionn);
$_domaine ="https://punchng.com/" ;
$_linkss=$_domaine.$sluglink ;
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://graph.facebook.com/107344908917497/feed?message=".$_message."n&link=".$_linkss."&access_token=EAAGzzZAtAK4UBAEerFOxXbuYYaQAWFZAjTqnAL3JPchwBARKDetiSrS1y8jyg1yXn0ZCRIhg84ZBnMCts3jkjqNRKpguCkQwdhDbiTbikIbpM8V1L9rAZAbYSyCB0ZCNE354X9HJyX2QZAh177gkJbIlIrv7C1eFeBHqUNN52XwP7izG6LSNZBKHbVK4zJqt4soZD",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",

]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}



/////////post faceb end




exit();
}

}
?>



