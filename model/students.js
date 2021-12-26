mongoose = require("mongoose");

const MobileData = new mongoose.Schema({
	_id: Number,
    name: String,
	

	
branch:String,
class:String,
gen:String,
dob:String,
purl:String
	

	

	


	
})
module.exports = mongoose.model('Student', MobileData);

