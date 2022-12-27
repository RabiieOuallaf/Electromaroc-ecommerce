DROP DATABASE electromaroc;


CREATE DATABASE electromaroc;

USE electromaroc;

create table users(
	user_id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(55) NOT NULL ,
    password VARCHAR(55) NOT NULL, 
    email VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL DEFAULT 'client',
    primary key(user_id),
    UNIQUE KEY username(username),
    UNIQUE KEY email(email),
    CHECK(role in ('admin', 'client', 'guest'))
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO users(username, password, email, role) VALUES ("Rabie", "Rabieouallaf123", "Rabie@gmail.com", "admin");

SELECT * FROM users;

CREATE TABLE client(
	client_id INT NOT NULL AUTO_INCREMENT,
    client_nomcomplet VARCHAR(255) NOT NULL,
    client_telephone INT NOT NULL,
    client_email VARCHAR(255) NOT NULL,
    client_adresse VARCHAR(255) NOT NULL,
    client_ville VARCHAR(100) NOT NULL,
    client_codepostal INT NOT NULL,
    client_pays VARCHAR(100) NOT NULL,
    PRIMARY KEY (client_id),
    UNIQUE KEY (client_email),
    FOREIGN KEY(client_email) references users(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE admins(
	admin_id INT NOT NULL AUTO_INCREMENT,
    admin_username VARCHAR(55) NOT NULL,
    admin_email VARCHAR(255) NOT NULL,
    admin_password VARCHAR(155) NOT NULL,
    role VARCHAR(55) NOT NULL DEFAULT ("admin"),
    primary key(admin_id),
    UNIQUE KEY (admin_email),
    UNIQUE KEY (admin_username)
    
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE produits(

	produit_id INT NOT NULL AUTO_INCREMENT,
    produit_name VARCHAR(255) NOT NULL,
    produit_codebar INT NOT NULL ,
    produit_refernce VARCHAR(255) NOT NULL,
    prix_achat float(11) NOT NULL,
    prix_final float(11) NOT NULL,
    prix_offer float(11) NOT NULL,
    produit_quantite int(11) NOT NULL,
    produit_description varchar(255) NOT NULL,
    produit_image varchar(255) NOT NULL,
    PRIMARY KEY (produit_id)

);	

CREATE TABLE cart ( 
    cart_id int(11) NOT NULL AUTO_INCREMENT,
    produit_id int(11) NOT NULL,
    bought int(11) NOT NULL default 0,
    client_id int(11) NOT NULL,
    produit_quantity int(11) NOT NULL,
    Foreign Key (produit_id) REFERENCES produits(produit_id),
    Foreign Key (client_id) REFERENCES Client(client_id),
    PRIMARY KEY (cart_id )
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
