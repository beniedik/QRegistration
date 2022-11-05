create table itemtype(
	itemtypeid serial primary key,
	itemtypedesc varchar(32) not null,
	is_discontinued boolean default false
);

--school provided list of equipment type
insert into itemtype(itemtypedesc) values('12 String Guitar');
insert into itemtype(itemtypedesc) values('Acoustic Guitar');
insert into itemtype(itemtypedesc) values('Bag');
insert into itemtype(itemtypedesc) values('Banduria');
insert into itemtype(itemtypedesc) values('Cajon');
insert into itemtype(itemtypedesc) values('Camera');
insert into itemtype(itemtypedesc) values('Camera Gimbal');
insert into itemtype(itemtypedesc) values('Cello');
insert into itemtype(itemtypedesc) values('Classical Guitar');
insert into itemtype(itemtypedesc) values('Classical Violin');
insert into itemtype(itemtypedesc) values('DVD Writer');
insert into itemtype(itemtypedesc) values('Globe Prepaid Wifi');
insert into itemtype(itemtypedesc) values('Graphic Tablet');
insert into itemtype(itemtypedesc) values('Guitar');
insert into itemtype(itemtypedesc) values('iPod');
insert into itemtype(itemtypedesc) values('Keyboard');
insert into itemtype(itemtypedesc) values('Laptop');
insert into itemtype(itemtypedesc) values('Lens');
insert into itemtype(itemtypedesc) values('Mouse');
insert into itemtype(itemtypedesc) values('Projector');
insert into itemtype(itemtypedesc) values('Tablet');
insert into itemtype(itemtypedesc) values('Tripod');
insert into itemtype(itemtypedesc) values('Ukulele');
insert into itemtype(itemtypedesc) values('Violin');

create table studentusers (
	userid serial primary key,
	studentname varchar(128) not null,
	studentidnumber varchar(32) not null,
	course varchar(32) not null,
	username varchar(32) not null,
	userpassword varchar(64) not null
);

--sample data
insert into studentusers(studentname, studentidnumber, course, username, userpassword) values('Jufel John B. Ellema', '2020-140249', 'BSCpE', 'jufeljohnbellema@gmail.com', 'password');
insert into studentusers(studentname, studentidnumber, course, username, userpassword) values('Drysdale Rhys C. Cabrera', '2020-141290', 'BSCpE', 'dryscabrera@gmail.com', 'password');
insert into studentusers(studentname, studentidnumber, course, username, userpassword) values('Millow J. Gapay', '2020-140851', 'BSCpE', 'gapaymillow256@gmail.com', 'password');


create table staffusers (
	userid serial primary key,
	staffname varchar(128) not null,
	staffidnumber varchar(32) not null,
	username varchar(32) not null,
	userpassword varchar(64) not null
);

--sample data
insert into staffusers(staffname, staffidnumber, username, userpassword) values('Beniedik V. Carreon', '2020-141244', 'beniedik051502@gmail.com', 'password');

create table useritems (
	useritemid serial primary key,
	userid integer references studentusers(userid) not null,
	itemtypeid integer references itemtype(itemtypeid) not null,
	brand varchar(64) default null,
	model varchar(64) default null,
	serialnumber varchar(64) default null,
	color varchar(64) default null,
	is_forapproval boolean default false,
	is_reviewed boolean default false,
	is_approved boolean default false,
	refusal_note text default null,
	approvaldate timestamptz default null,
	validuntil date default null,
	is_in boolean default null,
	is_indate timestamptz default null,
	is_outdate timestamptz default null,
	is_cancelled boolean default false,
	item_reg_date timestamptz default null
);

create table useritempix(
	itempixid serial primary key,
	useritemid integer references useritems(useritemid) not null,
	pixurl text not null
);
