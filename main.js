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

app.use(function(req, res, next) {

  res.header("Access-Control-Allow-Origin", "https://techruins.com"); 

  res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");

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

	

app.get("/", async (req,res) =>{

   const result = await Students.find({});

	res.send(result);

});

app.listen(port, () => {

	console.log(`app is listining on ${port}`);

});




