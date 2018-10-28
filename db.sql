drop table booking;
create table booking(
id number(5) primary key,
name varchar(25),
email varchar(30),
phone number(10),
booking_source varchar(30),
booking_destination varchar(30),
booking_date date
);
Create sequence booking_sequence start with 1
increment by 1
minvalue 1
maxvalue 10000;

create table loginuser(
id number(5) primary key,
email varchar(25),
password varchar(25)
);
Create sequence loginuser_sequence start with 1
increment by 1
minvalue 1
maxvalue 10000;

create table logindriver(
id number(5) primary key,
email varchar(25),
password varchar(25)
);
Create sequence logindriver_sequence start with 1
increment by 1
minvalue 1
maxvalue 10000;

create table user1(
	id number(5) primary key,
	name varchar(25),
	email varchar(30),
	phone number(10),
	password varchar(25),
	confirm_password varchar(25)
);

Create sequence user_sequence start with 1
increment by 1
minvalue 1
maxvalue 10000;

create table driver(
	id number(5) primary key,
	name varchar(25),
	email varchar(30),
	phone number(10),
	password varchar(25),
	confirm_password varchar(25)
);

Create sequence driver_sequence start with 1
increment by 1
minvalue 1
maxvalue 10000;
