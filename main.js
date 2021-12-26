const express = require("express");

const mongoose = require("mongoose");

const app = express();

const port = process.env.PORT || 3000;

const { mongoClient } = require("mongodb");

const { MongoClient, ObjectID } = require("mongodb");

const dotenv = require("dotenv").config();



const Students = require("./model/students");

mongoose.connect(process.env.URI, {

	useNewUrlParser:true,	useCreateIndex:true,

	useUnifiedTopology:true

}).then(() => {

	console.log("connection successful");

})

app.use(express.json());

app.use(express.urlencoded({"extended":true}));

app.use(function (req, res, next) {

    // Website you wish to allow to connect
    res.setHeader('Access-Control-Allow-Origin', 'https://zealstudentsrecord.000webhostapp.com');

    // Request methods you wish to allow
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');

    // Request headers you wish to allow
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');

    // Set to true if you need the website to include cookies in the requests sent
    // to the API (e.g. in case you use sessions)
    res.setHeader('Access-Control-Allow-Credentials', true);

    // Pass to next layer of middleware
    next();
});
	
app.post("/", (req, res, next) => {

  const product = new Students({

    _id:req.body._id,

    name: req.body.name



  });

  product

    .save()

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







app.patch('/:id', async(req,res,next)=> {

    

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
	

        
   app.get("/search", async(req, res) => {

	const n = req.query.name;

	const i = req.query.id;

	const c = req.query.class;

	const b = req.query.branch;

	const g = req.query.gen;

	try {

		if (i != undefined) {

			const ab = await Students.findById(parseInt(i));

			res.send(ab);

		} else if (n != undefined) {

			const ac = await Students.find({

				name: {

					$regex: n,

					$options: '$i'

				}

			}).sort({

				_id: -1

			});

			res.send(ac);

		} else {

			const ad = await Students.find({

				class: c,

				branch: b,

				gen: g

			}).sort({

				_id: -1

			});

			res.send(ad);

		}

	} catch (e) {

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

  

        
   

	
