drop table booking;
create table booking(
id number(5) primary key,
name varchar(25),
email varchar(30),
phone number(10),
booking_source varchar(30),
booking_destination varchar(30),
booking_date date,
login_id number(5)
);
Create sequence booking_sequence start with 1
increment by 1
minvalue 1
maxvalue 10000;

create table loginuser(
id number(5) primary key,
email varchar(25),
password varchar(25),
signup_id number(5)
);

Create sequence loginuser_sequence start with 1
increment by 1
minvalue 1
maxvalue 10000;

create table logindriver(
id number(5) primary key,
email varchar(25),
password varchar(25),
signup_id number(5)
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

CREATE OR REPLACE TRIGGER free_rides 
BEFORE DELETE OR INSERT OR UPDATE ON booking 
FOR EACH ROW 
WHEN (NEW.ID > 0) 
DECLARE 
    n booking.name%type;
   cur cursor is select name from booking group by login_id having count(login_id) = 2; 
BEGIN 
    open cur;
    fetch cur into n;
   dbms_output.put_line('Your Ride is free today ' || n)
    close cur;
END; 
/

create table vehicle(
id number(5) primary key,
name varchar(25) foreign key,
driver_id number(5)
);

Create sequence vehicle_sequence start with 1
increment by 1
minvalue 1
maxvalue 10000;

create table slot(
id number(5) primary key,
booking_id number(5),
vehicle_name varchar(25),
driver_id number(5),
login_id number(5) 
);

Create sequence slot_sequence start with 1
increment by 1
minvalue 1
maxvalue 10000;

create table feedback(
id number(5),
name varchar(5),
subject varchar(10),
message varchar(100),
login_id number(5)
);

Create sequence feedback_sequence start with 1
increment by 1
minvalue 1
maxvalue 10000;