<!DOCTYPE html>
<html>
          <link rel="stylesheet" href="styles/style.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
form{
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
  <form action="https://studentsappp.herokuapp.com/" method="POST">
      <label>Roll no</label>
       <input type="text" id="fname" name="_id" placeholder="Enter roll no" required>
    <label for="fname">Name</label>
    <input type="text" id="fname" name="name" placeholder="Your name..">

    <label>Branch</label>
       <select name="branch" required>
            <option value="Computer">Computer</option>
																												<option value="IT">IT</option>
																												<option value="Mechanical">Mechanical</option>
																												<option value="Civil">Civil</option>
																												<option value="AI">AI</option>
																												<option value="E & TC">E & TC</option>
      </select>
     <label for="lname">Class</label>
    <select name="class" required>
<option value="FE">FE</option>
<option value="SE">SE</option>
<option value="TE">TE</option>
<option value="BE">BE</option>
</select>
<label>Gender</label>
<select name="gen" required>
     <option value="M">M</option>
      <option value="F">F</option>
   </select>
    <label>Date Of Birth</label>
    <input name="dob" id="" type="date" placeholder="Enter DOB" required>
  <label for="country">Profile photo url</label>
   <input name="purl" id="" type="media" placeholder="Enter Profile" required>
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
