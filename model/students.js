mongoose = require("mongoose");

const MobileData = new mongoose.Schema({
	_id: Number,
    name: String,
	:Number,
	cat:Number,
	dpimg:String
})
module.exports = mongoose.model('Student', MobileData);

