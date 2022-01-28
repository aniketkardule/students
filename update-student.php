<?php  

$api = "https://studentsappp.herokuapp.com/";
$url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$uri = explode("?",$url);
$fetch = file_get_contents($api.'search?'.$uri[1]);
$result = json_decode($fetch);
    ?>


<!DOCTYPE html>
<html>
          <link rel="styles/stylesheet" href="styles/style.css" />
<style>
input[type=text], select {
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
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.c {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
	.to-dash{
	    position:absolute;
		top:100px;
		right:80px;
		font-size:18px;
	}
</style>
<body>
<?php include "header.php";    ?>

<h3 style="margin-top:70px">Enter Student Details</h3>
	<a class="to-dash" href="students.php">Back to dashboard</a>

<div class="c">
  <div>
      <label>Roll no</label>
       <input type="text" id="rn" value="<?=  $result->_id;  ?>" placeholder="Enter roll no">
    <label>Name</label>
    <input type="text" id="name" value="<?=  $result->name;  ?>" placeholder="Your name..">

    <label>Branch</label>
       <select id="branch" value="<?=  $result->branch;  ?>" >
            <option value="Computer">Computer</option>
																												<option value="IT">IT</option>
																												<option value="Mechanical">Mechanical</option>
																												<option value="Civil">Civil</option>
																												<option value="AI">AI</option>
																												<option value="E &TC">E & TC</option>
      </select>
     <label>Class</label>
    <select id="class" name="class" value="<?=  $result->class;  ?>">
<option value="FE">FE</option>
<option value="SE">SE</option>
<option value="TE">TE</option>
<option value="BE">BE</option>
</select>
<label for="lname">Gender</label>
<select id="gen" value="<?=  $result->gen;  ?>">
     <option value="M">M</option>
      <option value="F">F</option>
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
