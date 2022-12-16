CREATE TABLE admins(
	Username varchar(25) not null,
    Password varchar(100) not null
)

ALTER table admins add id int not null primary key auto_increment;

CREATE TABLE clients(

	Id int primary key not null auto_increment ,
	Fullname varchar(150) not null , 
    PhoneNumber int(14) not null,
    FullAdresse varchar(255) not null,
    email varchar(150) not null,
    password varchar(100) not null
    

)

create table products(
	
    ProductId int not null primary key auto_increment ,
    CodeBar int not null ,
    ProductName varchar(155) not null,
    ProductCategorie varchar(55) not null ,
    ProductDescription varchar(255) not null ,
    ProductPrice int not null ,
    client_id int not null,
    foreign key (client_id) references clients(Id) 
    

);