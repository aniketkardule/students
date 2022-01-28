<?php  

$api = "https://studentsappp.herokuapp.com/";
$url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$uri = explode("?",$url);
$result;
if($url != "https://studentdiary1.herokuapp.com/students.php"){
     $fetch = file_get_contents($api.'search?'.$uri[1]);

if(strpos($uri[1],"id") !== false){
    $result = json_decode('['.$fetch.']');
}else{
       $result = json_decode($fetch);
}

}else{$result = [];}
    ?>


<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="styles/style.css"/>
		<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Murecho:wght@300&display=swap" rel="stylesheet">
		<style>

















input[type=text], select,input[type=number]{
     width:90%;
     padding:10px;
     margin:0 auto 20px auto;
     display: inline-block;
     border: 1px solid black;
     border-radius: 4px;
     box-sizing: border-box;
}
 .result{
     margin-top:60px;
     width:95%;
     margin:30px auto;
     border-radius:7px;
     background:lightgrey;
     padding-bottom:30px;
}
 p{
     margin:20px;
}
 .result a{
     background:green;
     color:#fff;
     padding:10px;
     font-weight:bold;
     text-decoration:none;
     border-radius:4px;
}
 .fltr{
     width:95%;
     display:flex;
     height:370px;
     margin:0 auto;
}
 .fbn{
     text-align:center;
     background:#fff;
     width:45%;
     border-radius:7px;
     align-items:center;
     margin:60px auto;
     height:370px;
}
 input{
     text-align:center;
     border:1px solid orange;
}
.note{
     background:lightblue;
     padding:10px;
     border-radius:7px;
}
 .astd{
      position:absolute;
     top:120px;
     right:110px;
}
 .fbf{
     text-align:center;
     background:#fff;
     width:45%;
     margin:60px auto ;
     border-radius:7px;
     height:370px;
}
 .sfbf{
     display:flex;
}
 .sub-fbf{
     width:33.33%;
}
 .rslt{
     width:90%;
     margin:100px auto 30px;
     border-radius:7px;
     padding:10px;
     background:#fff;
}
 ul{
     list-style:none;
}
 .s_lst{
     margin:0 auto;
     width:80%;
}
 .s_info{
     max-height:200px;
     display:flex;
     overflow:hidden;
     left:0;
     -webkit-transition: 0.6s;
     -moz-transition: 0.6s;
     -o-transition: 0.6s;
     transition: 0.6s;
     position:relative;
     border-bottom:1px solid #000;
}
 .s_info .u_img{
     width:100px;
     height:100px;
     margin-top:50px;
     border:1.37px solid #000;
}
 .s_info .u_img img{
     max-width:91%;
     display:block;
     margin:auto;
}
 .s_info .u_dtl{
     margin:0 120px;
     height:100%;
     width:300px;
}
 .s_info .u_dtl p{
     padding:0;
}
 .name{
     font-size:18px;
}
 .update{
     position:absolute;
     top:40%;
     right:20%;
}
 #delete{
     position:absolute;
     background:maroon;
     top:40%;
     right:10%;
}
 #filter{
     margin-bottom:30px;
}

								
								
		

								
								
		</style>
      </head>
      <body>
        <?php include "header.php";    ?>
	<div class="result">
		<div class="fltr">
			<div class="fbn">
				<p class="note">Find Student By Roll No</p>
				<input type="number" id="input">
				<a id="id-search"onclick="findById()" href="#">Search</a>
				<p>OR</p>
				<p class="note">Find Student By Name</p>
				<input type="text" id="input1">
				<a href="#" id="input-search" onclick="findStudents()">Search</a>
				<a class="astd" href="add-student.php">Add Student</a><br>
                        </div>
			<div class="fbf">
				<p class="note">Find By Filter</p>
				<div class="sfbf">
					<div class="sub-fbf">			
						<p class="note">Select Class</p>
						<select id="class">
						    <option>ALL</option>
						    <option>FE</option>
						    <option>SE</option>
						    <option>TE</option>
						    <option>BE</option>
						</select>
					</div>
					<div class="sub-fbf">
						<p class="note">Select Branch</p>
						<select id="branch">
						  <option>ALL</option>																					
						  <option>Computer</option>	
					          <option>IT</option>
						  <option>Mechanical</option>																						
						  <option>Civil</option>																						
					          <option>AI</option>																						
					          <option>E & TC</option>																					
						</select>
					</div>
					<div class="sub-fbf">
						<p class="note">Select Gender</p>
						<select id="gen">
							<option>ALL</option>
							<option>M</option>
							<option>F</option>
						</select>
					</div>
				</div>
					<p id="filter" style="margin-top:30px"><a href="#">Find Students</a></p>
			</div>		
					
	</div>
		<div class="rslt">
			<p>Top results ></p>
			<ul class="s_lst">
    <?php     for($i=0; $i<sizeof($result);$i++){    ?>
				<li class="s_info">
			        <div class="u_img">
					<img src="images/userimg.png" />
				</div>
				<div class="u_dtl">
					<p class="name">Name:<?= $result[$i]->name;   ?></p>	
					<p class="r_no">Roll no:<?= $result[$i]->_id;   ?></p>
					<p class="branch">Date Of Birth:<?= $result[$i]->dob;   ?></p>
					<p class="class">Class: <?= $result[$i]->class;   ?></p>
					<p class="branch">Branch:<?= $result[$i]->branch;   ?></p>
					<p class="gen">Gender:<?= $result[$i]->gen;   ?></p>
				</div>
					<a href="update-student.php?id=<?=  $result[$i]->_id  ?>"	class="update">Update</a>
					<a href="#" onclick="del(this,<?=  $result[$i]->_id;   ?>)" id="delete"	>Delete</a>										    </li>
                                  <?php      }      ?>
		</ul>
		</div>
	</div>
	<script>
								    //Delete Function
								function del(e, i){
								    e.parentNode.style.maxHeight = "0px";
								    
								    fetch('https://studentsappp.herokuapp.com/'+i,{ method:'DELETE' }).then(response=>{ return response.json() }).then(data=>  console.log(data) );
								}
								    
								    //Filter
     document.getElementById('filter').addEventListener('click', function(){
     				
     				const branch = document.getElementById('branch'),
     				clas = document.getElementById('class'),
     		  gen = document.getElementById('gen');
     				var url = "";
     				
     				
     				if(branch.value != "ALL" & clas.value != "ALL" & gen.value != "ALL"){
     								url = "?branch="+branch.value+"&class="+clas.value+"&gen="+gen.value;
     				}else if(branch.value === "ALL" & clas.value === "ALL" & gen.value === "ALL"){
     								url = "?filter=ALL";
     				}else if(branch.value != "ALL" & clas.value === "ALL" & gen.value != "ALL"){
     								url = "?branch="+branch.value+"&gen="+gen.value;
     				}else if(branch.value === "ALL" & clas.value != "ALL" & gen.value != "ALL"){
     								url = "?class="+clas.value+"&gen="+gen.value;
     				}else if(branch.value != "ALL" & clas.value != "ALL" & gen.value === "ALL"){
     								url = "?branch="+branch.value+"&class="+clas.value;
     				}else if(branch.value != "ALL" & clas.value === "ALL" & gen.value === "ALL"){
     								url = "?branch="+branch.value;
     				}else if(branch.value === "ALL" & clas.value != "ALL" & gen.value === "ALL"){
     								url = "?class="+clas.value;
     				}else if(branch.value === "ALL" & clas.value === "ALL" & gen.value != "ALL"){
     								url = "?gen="+gen.value;
     				}
     		
     	if(url !== ""){			
     			document.location.href = "students.php"+url;
     			}
     			
     			
     })
		
		//find student
 function searchStudent(){

   const value = document.getElementById('input1').value;
	     if(value){
		     
		         if(!hasNumbers(value)){
		          document.location.href = "students.php?name="+value;
		     }else{
		        aleart("Please enter valid name");
		     }
		     
		     
		     
	     }else{
		     
	     alert("Please Enter Some Value");
	     }
}

        //find by id
		
function findById(){

   const value = document.getElementById('input').value;
	if(value){
		if(!isNaN(value)){
		          document.location.href = "students.php?id="+value;
		     }else{
		        aleart("Please enter valid roll no");
		     }
        
	}
}
	</script>
	</body>
</html>
