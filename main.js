

  

        let student = await Students.findById(parseInt(req.params.id)) 
  
	
        const b = req.body;
	    for(var x in b){
		    
	          student[x] = b[x];
		    
	    } 

	
	
        await student.save()

        .then(result => {

      console.log(result);

      res.status(201).json({

        message: "Handling POST requests to /products",

        createdProduct: result

      });

    })

    .catch(err => {

      console.log(err);

      res.status(500).json({

        error: err

      });

    });


});



app.delete('/:id', async(req,res,next)=> {

    try{

       await Students.findByIdAndDelete(parseInt(req.params.id)) 

  }catch(e){
      
	  res.send(e)
  
  }
});
	

        

      

      app.get("/search", (req,res) => {

      const n = req.query.name;

      const i = req.query.id;

      const c = req.query.class;

      const b = req.query.branch;

      const g = req.query.gen;

      

      

      try{
          if(i != undefined){
      		const		s = Students.findById(parseInt(i));

      				res.send(s);

      }else if(n != undefined){

      			const 	s = Students.find({name:{$regex:s,$options:'$i'}}).sort({_id:-1});

      			res.send(s);

      }else{

      	const			s = Students.find({class:c,branch:b,gen:g}).sort({_id:-1});

      	res.send(s);

      }

      

      

      

    }catch(e){

    				res.send(e);

    }

   			 

   });

      

      

   

	

app.get("/", async (req,res) =>{

   const result = await Students.find({});

	res.send(result);

});

app.listen(port, () => {

	console.log(`app is listining on ${port}`);

});



 
      }

      

      

      

      

    }catch(e){

    				res.send(e);

    }

   			 

   }); 


	

app.get("/", async (req,res) =>{

   const result = await Students.find({});

	res.send(result);

});

app.listen(port, () => {

	console.log(`app is listining on ${port}`);

});




