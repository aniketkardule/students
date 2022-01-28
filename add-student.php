<!DOCTYPE html>
<html>
          <link rel="stylesheet" href="styles/style.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Murecho:wght@300&display=swap" rel="stylesheet">
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
</style>
<body>
<?php include "header.php";    ?>

<h3 style="margin-top:70px">Enter Student Details</h3>

<div class="c">
  <form action="https://studentsappp.herokuapp.com/" method="POST">
      <label for="lname">Roll no</label>
       <input type="text" id="fname" name="_id" placeholder="Enter roll no">
    <label for="fname">Name</label>
    <input type="text" id="fname" name="name" placeholder="Your name..">

    <label for="lname">Branch</label>
       <select name="branch" >
            <option value="COMPUTER">Computer</option>
																												<option value="IT">IT</option>
																												<option value="MECHANICAL">Mechanical</option>
																												<option value="CIVIL">Civil</option>
																												<option value="AI">AI</option>
																												<option value="E &TC">E & TC</option>
      </select>
     <label for="lname">Class</label>
    <select name="class">
<option value="FE">FE</option>
<option value="SE">SE</option>
<option value="TE">TE</option>
<option value="BE">BE</option>
</select>
<label for="lname">Gender</label>
<select name="gen">
     <option value="M">M</option>
      <option value="F">F</option>
   </select>
    <label for="country">Date Of Birth</label>
    <input name="dob" id="" type="text" placeholder="Enter DOB">
  <label for="country">Profile photo url</label>
   <input name="purl" id="" type="text" placeholder="Enter Profile">
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
