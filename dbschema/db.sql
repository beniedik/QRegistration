create table itemtype(
	itemtypeid serial primary key,
	itemtypedesc varchar(32) not null
);

insert into itemtype(itemtypedesc) values("12 String Guitar")
insert into itemtype(itemtypedesc) values("Acoustic Guitar")
insert into itemtype(itemtypedesc) values("Bag")
insert into itemtype(itemtypedesc) values("Banduria")
insert into itemtype(itemtypedesc) values("Cajon")
insert into itemtype(itemtypedesc) values("Camera")
insert into itemtype(itemtypedesc) values("Camera Gimbal")
insert into itemtype(itemtypedesc) values("Cello")
insert into itemtype(itemtypedesc) values("Classical Guitar")
insert into itemtype(itemtypedesc) values("Classical Violin")
insert into itemtype(itemtypedesc) values("DVD Writer")
insert into itemtype(itemtypedesc) values("Globe Prepaid Wifi")
insert into itemtype(itemtypedesc) values("Graphic Tablet")
insert into itemtype(itemtypedesc) values("Guitar")
insert into itemtype(itemtypedesc) values("iPod")
insert into itemtype(itemtypedesc) values("Keyboard")
insert into itemtype(itemtypedesc) values("Laptop")
insert into itemtype(itemtypedesc) values("Lens")
insert into itemtype(itemtypedesc) values("Mouse")
insert into itemtype(itemtypedesc) values("Projector")
insert into itemtype(itemtypedesc) values("Tablet")
insert into itemtype(itemtypedesc) values("Tripod")
insert into itemtype(itemtypedesc) values("Ukulele")
insert into itemtype(itemtypedesc) values("Violin")

create table studentusers (
	userid serial primary key,
	studentname varchar(128) not null
	studentidnumber varchar(32) not null,
	course varchar(32) not null,
	username varchar(32) not null,
	userpassword varchar(64) not null
);

create table staffusers (
	userid serial primary key,
	staffname varchar(128) not null
	staffidnumber varchar(32) not null,
	username varchar(32) not null,
	userpassword varchar(64) not null
);

create table useritems (
	useritemid serial primary key,
	userid integer references users(userid) not null,
	itemtypeid integer references itemtype(itemtypeid) not null,
	brand varchar(64) default null,
	model varchar(64) default null,
	serialnumber varchar(64) default null,
	color varchar(64) default null,
	is_approved boolean default false,
	approvedby integer references staffusers(userid) default null,
	approvaldate timestamptz default null,
	is_in boolean default null,
	is_inby integer references staffusers(userid) default null,
	is_indate timestamptz default null,
	is_out boolean default null,
	is_outby integer references staffusers(userid) default null,
	is_outdate timestamptz default null
);
