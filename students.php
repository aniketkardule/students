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

$id;
$name;
echo $uri[1];
if(strpos($uri[1],"id")){
	$id = explode("id",$uri[1])[1];
	echo "id".explode("id",$uri[1]);
}else if(strpos($uri[1],"name")){
        $id = explode("name",$uri[1])[1];
	echo "name".explode("name",$uri[1]);
}
echo "id".$id;
echo "name".$name;
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
     width:75%;
     margin:30px auto;
     border-radius:7px;
     background:#f1f1f1;
      box-shadow:0 0 3px grey;
     padding-bottom:30px;
}
			.flex{
			    display:flex;
			}
			.btn{
     background:lightskyblue;
     color:#fff;
     padding:5px;
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
.fltr p{
	margin:10px;
}
.heading{
     display:inline-block;
     margin:10px auto 0 51px;
}
			.filter-box{
			 text-align:center;
     background:#fff;
     width:45%;
     border-radius:7px;
     align-items:center;
     margin:21px auto;
     height:340px;
			}			
 .fbn{
     
}
 input{
     text-align:center;
     border:1px solid orange;
}
.note{
     background:lightblue;
     padding:10px;
     border-radius:7px;
     margin:10px;
}
 .astd{
      position:absolute;
     top:100px;
     right:16.6%;
}
 .fbf{
    
}
 .sub-fbf{
     width:33.33%;
}
 .rslt{
     width:90%;
     margin:30px auto 30px auto;
     border-radius:7px;
      position:relative;
     padding:10px;
     background:#fff;
}
 ul{
     
}
 .s_lst{
     margin:0 auto;
     list-style:none;
      font-size:15px;
     width:80%;
}
 .s_info{
     max-height:200px;
      padding:10px;
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
     margin:auto 20px auto 0;
     border:1.37px solid #000;
}
 .s_info .u_img img{
     max-width:100px;
     display:block;
     margin:auto;
}
.s_info .u_dtl{
     margin:0;
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
      font-weight:bold;
     top:40%;
     right:20%;
}
 #delete{
     position:absolute;
     background:maroon;
     top:40%;
     right:10%;
}
.developer-note{
	float:right;
	position:absolute;
	bottom:-50px;
	right:10px;
	
}
 #filter{
     margin-bottom:30px;
}

@media only screen and (max-width: 1000px) {
     .result{
          width:100%;
     }
     .nav-area{
          display:none;
     }
}

@media only screen and (max-width: 700px) {
     .result{
          width:100%;
          margin-top:100px;
     }
     .astd{
          top:70px;
     }
     .fltr{
          display:block;
     }
     .fbn, .fbf{
    
     width:100%;
          
     
     height:auto;
}
     .rslt{
          margin-top:200px;
          width:100%;
     }
     .s_info .u_dtl{
          
     }
     .s_lst{
          width:100%;
     }
     .update{
          right:20%;
     }
     #delete{
          right:5%;
     }
     
     
}				
		</style>
      </head>
      <body>
        <?php include "header.php";    ?>
	<div class="result">
		<h2 class="heading">Student Diary Student Record System</h2>
		<div class="fltr">
			<div class="fbn filter-box">
				<p class="note">Find Student By Roll No</p>
				<input type="number" id="input" value="<?= $id;  ?>">
				<a class="btn" id="id-search"onclick="findById()" href="#">Search</a>
				<p>OR</p>
				<p class="note">Find Student By Name</p>
				<input type="text" id="input1" value="<?= $name;  ?>">
				<a class="btn" href="#" id="input-search" onclick="searchStudent()">Search</a>
				<a class="astd btn" href="add-student.php">Add Student</a><br>
                        </div>
			<div class="fbf filter-box">
				<p class="note">Find By Filter</p>
				<div class="flex">
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
				<p id="filter" style="margin-top:30px"><a class="btn" href="#">Find Students</a></p>
			</div>		
					
	</div>
		<div class="rslt">
	          <?php
			if($url != "https://studentdiary1.herokuapp.com/students.php"){   ?>   
			<p>Top results <?= sizeof($result);   ?>&gt;</p>
			<?php   }   ?>
			<ul class="s_lst">
    <?php     for($i=0; $i<sizeof($result);$i++){    ?>
				<li class="s_info flex">
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
					<a class="btn update" href="update-student.php?id=<?=  $result[$i]->_id  ?>">Update</a>
					<a class="btn" href="#" onclick="del(this,<?=  $result[$i]->_id;   ?>)" id="delete"	>Delete</a>										    </li>
                                  <?php      }      ?>
		</ul>
			<a class="developer-note" href="note.php">Note by Developer</a>
		</div>
	</div>
	<script>
		
								    //Delete Function
								function del(e, i){
								    e.parentNode.style.maxHeight = "0px";
								    
								    fetch('https://studentsappp.herokuapp.com/'+i,{ method:'DELETE' }).then(response=>{ return response.json() }).then(data=> console.log(data) );
									alert("Student with roll no "+i+" has been deleted");
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
		        alert("Please enter valid name");
		     }
		     
		     
		     
	     }else{
		     
	     alert("Please Enter Some Value");
	     }
}

        //find by id
		
function findById(){

   const value = document.getElementById('input').value;
	if(value){
		
		          document.location.href = "students.php?id="+value;
		     }else{
		        alert("Please enter valid roll no");
		     }
}
		
//Number Check Function
		
		function hasNumbers(myString) {
  return /\d/.test(myString);
}		
		
	</script>
	</body>
</html>
