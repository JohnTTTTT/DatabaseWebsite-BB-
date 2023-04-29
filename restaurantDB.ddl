drop database if exists restaurantDB;
create database restaurantDB;
use restaurantDB;

create table food(
foodName varchar(50) not null,
primary key(foodName));

create table restaurant(
street varchar(50) not null,
city varchar(50) not null,
zip varchar(6) not null,
name varchar(50) not null,
URL varchar(50) not null,
foodPrice integer not null,
foodName varchar(50) not null,
primary key(name, foodName),
foreign key(foodName) references food(foodName));

create table manager(
managerID integer not null,
firstName varchar(50) not null,
lastName varchar(50) not null,
employeeEmail varchar(50) not null,
customerRelationship char(10),
restaurantName varchar(50) not null,
primary key(managerID),
foreign key(restaurantName) references restaurant(name));

create table waiter(
waiterID integer not null,
firstName varchar(50) not null,
lastName varchar(50) not null,
employeeEmail varchar(50) not null,
customerRelationship char(10),
restaurantName varchar(50) not null,
primary key(waiterID),
foreign key(restaurantName) references restaurant(name));

create table chef(
chefID integer not null,
firstName varchar(50) not null,
lastName varchar(50) not null,
employeeEmail varchar(50) not null,
customerRelationship char(10),
restaurantName varchar(50) not null,
primary key(chefID),
foreign key(restaurantName) references restaurant(name));

create table deliveryEmployee(
deliveryID integer not null,
firstName varchar(50) not null,
lastName varchar(50) not null,
employeeEmail varchar(50) not null,
customerRelationship char(10),
restaurantName varchar(50) not null,
primary key(deliveryID),
foreign key(restaurantName) references restaurant(name));

create table credentialChef (
chefID integer not null,
credentials char(4) not null,
primary key(chefID, credentials),
foreign key(chefID) references chef(chefID) on delete cascade);

create table customerAccount(
customerEmail varchar(50) not null,
firstName varchar(50) not null,
lastName varchar(50) not null,
cellNumber integer(10) not null,
creditAmount integer not null,
street varchar(50) not null,
city varchar(50) not null,
zip varchar(6) not null,
managerRelationship char(10),
waiterRelationship char(10),
chefRelationship char(10),
deliveryRelationship char(10),
primary key(customerEmail));

create table shift(
shiftDay char(5) not null,
shiftStart time,
shiftEnd time,
managerID integer not null,
waiterID integer not null,
chefID integer not null,
deliveryID integer not null,
primary key(shiftDay, managerID, waiterID, chefID, deliveryID),
foreign key(managerID) references manager(managerID) on delete cascade,
foreign key(waiterID) references waiter(waiterID) on delete cascade,
foreign key(chefID) references chef(chefID) on delete cascade,
foreign key(deliveryID) references deliveryEmployee(deliveryID) on delete cascade);

create table payment(
paymentDate char(5) not null,
paymentAmount integer not null,
customerEmail varchar(50) not null,
primary key(paymentDate, customerEmail),
foreign key(customerEmail) references customerAccount(customerEmail) on delete cascade);

create table orders(
orderID integer not null,
totalPrice integer not null,
tip integer,
orderPlaced time not null,
orderDelivered time,
customerEmail varchar(50) not null,
restaurantName varchar(50) not null,
deliveryID integer not null,
foodName varchar(50) not null,
orderDay char(4) not null,
orderMonth char(4) not null,
orderYear int(4) not null,
primary key(orderID, foodName, orderDay, orderMonth, orderYear),
foreign key(customerEmail) references customerAccount(customerEmail),
foreign key(restaurantName) references restaurant(name),
foreign key(deliveryID) references deliveryEmployee(deliveryID) on delete cascade,
foreign key(foodName) references food(foodName));

insert into food values
('Steak'),
('Pasta'),
('Apple Pie'),
('Chicken and Rice'),
('Pizza'),
('Sushi'),
('Eggs Benedict'),
('Peanut Butter and Jelly Sandwhich'),
('Croissant'),
('Bagel and Cream Cheese'),
('Burger');

insert into restaurant values
('Brock', 'Kingston', 'K7L1B5', 'ShakeShack', 'http://ShakeShack.com', '25', 'Burger'),
('Rideau', 'Ottawa', 'K2A1A5', 'SenseiSushi', 'http://SenseiSushi.com', '30', 'Sushi'),
('Bank', 'Ottawa', 'K3A1B5', 'PapasPasta', 'http://PapasPasta.com', '20', 'Pasta'),
('Frontenac', 'Quebec', 'K3Z8G5', 'GoodFood', 'http://GoodFood.com', '15', 'Eggs Benedict');

insert into manager values 
('100', 'John', 'Turnbull', '20jjt@queensu.ca', 'Friendly', 'ShakeShack'),
('101', 'Tim', 'Turner', '19tt@queensu.ca', 'Neutral', 'SenseiSushi'),
('102', 'Ben', 'Dover', '18bd@queensu.ca', 'Rude', 'PapasPasta'),
('103', 'Jake', 'Jones', '17jj@queensu.ca', 'Friendly', 'GoodFood');

insert into waiter values
('200', 'Raj', 'Rage', '20rr@queensu.ca', 'Neutral', 'ShakeShack'),
('201', 'Noah', 'Lee', '19nl@queensu.ca', 'Neutral', 'SenseiSushi'),
('202', 'Aidan', 'Dude', '18ad@queensu.ca', 'Rude', 'PapasPasta'),
('203', 'Aleksi', 'Zimzo', '17az@queensu.ca', 'Rude', 'GoodFood');

insert into chef values
('300', 'James', 'God', '20jg@queensu.ca', 'NULL', 'ShakeShack'),
('301', 'Pablo', 'Escobar', '19pe@queensu.ca', 'NULL', 'SenseiSushi'),
('302', 'Rohan', 'Pain', '18rp@queensu.ca', 'NULL', 'PapasPasta'),
('303', 'Lucy', 'Williams', '17lw@queensu.ca', 'Friendly', 'GoodFood');

insert into deliveryEmployee values
('400', 'Jessie', 'Pinkman', '20jp@queensu.ca', 'Friendly', 'ShakeShack'),
('401', 'Walter', 'White', '19ww@queensu.ca', 'Rude', 'SenseiSushi'),
('402', 'Gus', 'Fring', '18gf@queensu.ca', 'Rude', 'PapasPasta'),
('403', 'Saul', 'Goodman', '17sg@queensu.ca', 'Friendly', 'GoodFood');

insert into credentialChef values
('300', 'CFSP'),
('300', 'MCFE'),
('300', 'CCC'),
('301', 'CPC'),
('301', 'CEC'),
('302', 'CMC'),
('302', 'CWPC'),
('303', 'CSC'),
('303', 'CD'),
('303', 'CCE');

insert into customerAccount values
('19sssj@queensu.ca', 'Sarah', 'Poo', '6134159595', '50', 'Brock', 'Kingston', 'K7l1T5', 'Friendly', 'Neutral', 'NULL', 'Friendly'),
('19yop@queensu.ca', 'Yasmine', 'OBrienPie', '6134772325', '100', 'Rideau', 'Ottawa', 'K2A2T5', 'Neutral', 'Neutral', 'NULL', 'Rude'),
('21cce@queensu.ca', 'Ceecee', 'Ethereal', '6132123242', '125', 'Ottawa', 'K3A1B5', 'K7l1W3', 'Rude', 'Rude', 'NULL', 'Rude'),
('22oop@queensu.ca', 'Oneal', 'Prince', '6134111125', '30', 'Frontenac', 'Quebec', 'K3W8G5', 'Friendly', 'Rude', 'Friendly', 'Friendly');

insert into shift values
('Sun', 'NULL', 'NULL', '100', '200', '300', '400'),
('Mon', '9:00', '20:00', '100', '200', '300', '400'),
('Tues', '9:00', '20:00', '100', '200', '300', '400'),
('Wed', '9:00', '20:00', '100', '200', '300', '400'),
('Thurs', '9:00', '20:00', '100', '200', '300', '400'),
('Fri', '9:00', '22:00', '100', '200', '300', '400'),
('Sat', '12:00', '22:00', '100', '200', '300', '400'),
('Sun', '12:00', '20:00', '101', '201', '301', '401'),
('Mon', 'NULL', 'NULL', '101', '201', '301', '401'),
('Tues', '9:00', '20:00', '101', '201', '301', '401'),
('Wed', '9:00', '20:00', '101', '201', '301', '401'),
('Thurs', '9:00', '20:00', '101', '201', '301', '401'),
('Fri', '9:00', '22:00', '101', '201', '301', '401'),
('Sat', '12:00', '22:00', '101', '201', '301', '401'),
('Sun', 'NULL', 'NULL', '102', '202', '302', '402'),
('Mon', '9:00', '20:00', '102', '202', '302', '402'),
('Tues', '9:00', '20:00', '102', '202', '302', '402'),
('Wed', '9:00', '20:00', '102', '202', '302', '402'),
('Thurs', '9:00', '20:00', '102', '202', '302', '402'),
('Fri', '9:00', '22:00', '102', '202', '302', '402'),
('Sat', 'NULL', 'NULL', '102', '202', '302', '402'),
('Sun', '12:00', '20:00', '103', '203', '303', '403'),
('Mon', '9:00', '20:00', '103', '203', '303', '403'),
('Tues', '9:00', '20:00', '103', '203', '303', '403'),
('Wed', 'NULL', 'NULL', '103', '203', '303', '403'),
('Thurs', '9:00', '20:00', '103', '203', '303', '403'),
('Fri', '9:00', '22:00', '103', '203', '303', '403'),
('Sat', '12:00', '22:00', '103', '203', '303', '403');

insert into payment values
('Mon', '27', '19sssj@queensu.ca'),
('Thurs', '32', '19yop@queensu.ca'),
('Fri', '20', '21cce@queensu.ca'),
('Sat', '20', '22oop@queensu.ca');

insert into orders values
('3490', '27', '2', '13:00', '13:30', '19sssj@queensu.ca', 'ShakeShack', '400', 'Burger', 'Mon', 'Mar', '2023'),
('2533', '32', '2', '9:00', '9:15', '19yop@queensu.ca', 'SenseiSushi', '401', 'Sushi', 'Tues', 'Nov', '2022'),
('4440', '20', '0', '21:00', '21:45', '21cce@queensu.ca', 'PapasPasta', '402', 'Burger', 'Thu', 'Dec', '2021'),
('1220', '20', '5', '12:00', '12:30', '22oop@queensu.ca', 'GoodFood', '403', 'Eggs Benedict', 'Fri', 'Oct', '2020');