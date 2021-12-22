const { MongoClient, ObjectID } = require("mongodb");

const Express = require("express");

const Cors = require("cors");

const BodyParser = require("body-parser");

const { request } = require("express");

const client = new MongoClient('mongodb+srv://Aniket99:nukGCejeGNGVpL53@techruins1.wodui.mongodb.net/students?retryWrites=true&w=majority',{ useNewUrlParser: true, useUnifiedTopology: true });

const app = Express();

app.use(BodyParser.json());

app.use(BodyParser.urlencoded({ extended: true }));

app.use(Cors());

var collection;

app.get("/students", async(req,res) => {

    const s = await collection.find({});

    res.send(s);

})

app.listen("3000", async () => {

    try {

        await client.connect();

        collection = client.db("mobiles").collection("students");

    } catch (e) {

        console.error(e);

    }

});

