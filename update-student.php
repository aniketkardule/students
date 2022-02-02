<?php  

$api = "https://studentsappp.herokuapp.com/";
$url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$uri = explode("?",$url);
$fetch = file_get_contents($api.'search?'.$uri[1]);
$result = json_decode($fetch);
    ?>


<!DOCTYPE html>
<html>
          <link rel="stylesheet" href="styles/style.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Murecho:wght@300&display=swap" rel="stylesheet">
<style>

.dashboard{
  position:absolute;
  top:10px;
  right:11%;
  color:yellow;
}
.nav-area{
  display:none;
}
input[type=text],input, select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color:lightblue;
  color: ;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.form{
  width:80%;
  margin:0 auto;
}
h3{
  margin:0 auto 10px 10%;
}
label{
  padding-top:10px;
  padding-bottom:10px;
  text-align:center;
  display:inline-block;
  width:100%;
  background:lightblue;
  border: none;
  border-radius: 4px;
}

.c {
  width:75%;
  margin:0 auto;
  position:relative;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
@media (max-width:600px){
  .c{
    width:100%;
  }
}


</style>
<body>
<?php include "header.php";    ?>



<div class="c">
	<h3>Enter Student Details</h3>
	<p class="dashboard"><a href="/students.php">Go to dashboard</a></p>
  <div class="form">
      <label>Roll no</label>
       <input type="text" id="rn" value="<?=  $result->_id;  ?>" placeholder="Enter roll no">
    <label>Name</label>
    <input type="text" id="name" value="<?=  $result->name;  ?>" placeholder="Your name..">

    <label>Branch</label>
       <select id="branch" name="branch">
		<?php
	    $l = array("Computer","IT","AI","Mechanical","Civil","E & TC");
	    
	    for($i=0;$i<sizeof($l);$i++){
		    if($l[$i] !== $result->branch){
			    ?>
	    <option value="<?= $l[$i];   ?>"><?= $l[$i];   ?></option>
	    
	    <?php
	    }else{   ?>
	    
	    <option value="<?=  $l[$i];   ?>" selected><?=  $l[$i];   ?></option>
	    
	    
	    <?php
		    
		    }
	    
	    }     ?>																									
      </select>
     <label>Class</label>
    <select id="class" name="class">
	    <?php
	    $m = array("FE","SE","TE","BE");
	    
	    for($i=0;$i<sizeof($m);$i++){
		    if($l[$i] !== $result->class){
			    ?>
	    <option value="<?= $m[$i];   ?>"><?= $m[$i];   ?></option>
	    
	    <?php
	    }else{   ?>
	    
	    <option value="<?=  $m[$i];   ?>" selected><?=  $m[$i];   ?></option>
	    
	    
	    <?php
		    
		    }
	    
	    }     ?>
</select>
<label>Gender</label>
<select id="gen" name="gen">
     <?php
	    $n = array("M","F");
	    for($i=0;$i<sizeof($n);$i++){
		    if($l[$i] !== $result->gen){
			    ?>
	    <option value="<?= $n[$i];   ?>"><?= $n[$i];   ?></option>
	    
	    <?php
	    }else{   ?>
	    
	    <option value="<?=  $n[$i];   ?>" selected><?=  $n[$i];   ?></option>
	    
	    
	    <?php
		    
		    }
	    
	    }     ?>
   </select>
    <label>Date Of Birth</label>
    <input value="<?=  $result->dob;  ?>" id="dob" type="text" placeholder="Enter DOB">
  <label>Profile photo url</label>
   <input value="<?=  $result->purl;  ?>" id="purl" type="text" placeholder="Enter Profile">
    <input id="submit" type="submit" value="Submit">
  </div>
</div>
     <script>

 const id = document.getElementById('rn'),
            na = document.getElementById('name'),
            br = document.getElementById('branch'),
            cl = document.getElementById('class'),
            ge = document.getElementById('gen'),
            db = document.getElementById('dob'),
            pu = document.getElementById('purl');
      

document.getElementById('submit').addEventListener('click', function(){

    
  fetch('https://studentsappp.herokuapp.com/'+id.value, {
  method: "PATCH",
  body: JSON.stringify({

        name:na.value,
        branch:br.value,
        class:cl.value,
        gen:ge.value,
        dob:db.value,
        purl:pu.value
   }),
  headers: {"Content-type": "application/json; charset=UTF-8"}
})
.then(response => response.json()) 
.then(json => { alert("Student with roll no "+id.value+" has been updated")})
.catch(err => console.log(err));

            });

	</script>
</body>
</html>
