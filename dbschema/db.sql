create table itemclass(
	itemclassid
	itemclassdesc
);

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
