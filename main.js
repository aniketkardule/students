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


	const l = parseInt(req.query.lim);

	const c = parseInt(req.query.cat);

	if(s && !c){

	const a = await Mobiles.find({name:{$regex:s,$options:'$i'}},{_id:1,name:1,dpimg:1}).sort({_id:-1}).limit(l);

	res.send(a);

	}else if(s && c){

   const a = await Mobiles.find({name:{$regex:s,$options:'$i'},cat:c},{_id:1,name:1,dpimg:1}).sort({_id:-1}).limit(l);

   res.send(a);

	}

	else{

	res.send([]);

	}

	}catch(e){

		res.send(e);

	}

});

app.get("/product", async (req,res) =>{

	try{

		const n = req.query.q;

		const b = req.query.brand;

		const c = parseInt(req.query.cat);

	 const l = parseInt(req.query.lim);

if(c && b){

    	const s = await Mobiles.find({cat:Cat,brand:Brand}).sort({_id:-1}).limit(l);

	res.send(s);

}else if(n && c && b){

    const s = await Mobiles.find({name:{$regex:n,$options:'i'},cat:c,brand:b}).sort({_id:-1}).limit(l);

	res.send(s);

}else{

				res.send([]);

}

	}catch(e){

		res.status(500).send({ message: e.message });

	}

});

app.get("/autocomplete/:id", async (req, res) =>{

	try{

	const i = req.params.id;

	const m = await Mobiles.findById(i,{name:1,cat:1,slug:1,mrp:1,dpimg:1}).sort({_id:-1});

	res.send(m);

	}catch(e){

		res.status(500).send({ message: e.message });

	}

});

app.get("/", async (req,res) =>{

   const result = await Mobiles.find({},{name:1,cat:1,slug:1,mrp:1}).sort({_id:-1});

	res.send(result);

});

app.listen(port, () => {

	console.log(`app is listining on ${port}`);

});




