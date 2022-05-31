create table itemclass(
	itemclassid
	itemclassdesc
);

//12 String Guitar
//Acoustic Guitar
//Bag
//Banduria
//Cajon
//Camera
//Camera Gimbal
//Cello
//Classical Guitar
//Classical Violin
//DVD Writer
//Globe Prepaid Wifi
//Graphic Tablet
//Guitar
//iPod
//Keyboard
//Laptop
//Lens
//Mouse
//Projector
//Tablet
//Tripod
//Ukulele
//Violin


create table users (
	userid
	name
	studentidnumber
	course
	username
	password
);

create table useritems (
	useritemid
	userid
	itemclassid
	brand
	model
	serialnumber
	color
	is_approved
	approvedby
	is_in
	is_inby
	is_out
	is_outby

);
