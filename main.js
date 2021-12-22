const express = require("express");

const mongoose = require("mongoose");

const app = express();

const port = process.env.PORT || 3000;

const { mongoClient } = require("mongodb");

const { MongoClient, ObjectID } = require("mongodb");

const dotenv = require("dotenv").config();

/*'mongodb+srv://Aniket99:nukGCejeGNGVpL53@techruins1.wodui.mongodb.net/mobiles?retryWrites=true&w=majority'; */

const Mobiles = require("./model/students");

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


	

		
	

app.get("/", async (req,res) =>{

   const result = await Mobiles.find({},{name:1,cat:1,slug:1,mrp:1}).sort({_id:-1});

	res.send(result);

});

app.listen(port, () => {

	console.log(`app is listining on ${port}`);

});




