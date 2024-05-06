/* create employee table */
create table employee (
	employeeId VARCHAR(10) not null,
    employeeName varchar(30) not null,
    dob date not null,
    contact varchar(10) not null,
    jobTitle varchar(30) not null,
    
    constraint employee_pk primary key(employeeId)
);

/* create user table */
CREATE TABLE user(
    userId INT AUTO_INCREMENT NOT NULL,
    firstName VARCHAR(20) NOT NULL,
    lastName VARCHAR(20) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    mobileNumber VARCHAR(10) NOT NULL,
    email VARCHAR(50) NOT NULL,
    address VARCHAR(150) NOT NULL,
    dob DATE NOT NULL,
    planId VARCHAR(10) NOT NULL,
    password VARCHAR(30) NOT NULL,

    CONSTRAINT user_pk PRIMARY KEY(userId)
);

/* insert values to user table */
INSERT INTO user 
VALUES ('1', 'Pavan', 'Uthsara', 'male', '0714169538', 'pavan@shieldplus.com', 'No.2, Welthera mawatha, Kothalawala', '2003-08-29', 'p1', 'uthsara');

/* insert values into user table */
INSERT INTO user 
VALUES ('2', 'Tharindu', 'Silva', 'male', '0771234567', 'tharindu@gmail.com', 'No.15, Devananda Mawatha, Colombo 05', '1995-05-12', 'p2', 'silva'),
        ('3', 'Samantha', 'Perera', 'female', '0762345678', 'samantha@yahoo.com', 'No.7, Anura Mawatha, Kandy', '1988-11-23', 'p3', 'perera'),
        ('4', 'Dilshan', 'Fernando', 'male', '0703456789', 'dilshan@hotmail.com', 'No.25, Senarath Mawatha, Negombo', '1979-03-17', 'p4', 'fernando'),
        ('5', 'Nadeesha', 'Bandara', 'female', '0724567890', 'nadeesha@outlook.com', 'No.9, Karunaratne Mawatha, Galle', '1992-09-30', 'p5', 'bandara'),
        ('6', 'Rangana', 'Jayawardena', 'male', '0785678901', 'rangana@gmail.com', 'No.33, Rathnayake Mawatha, Matara', '1983-06-14', 'p1', 'jayawardena'); 

/* create admin table */
CREATE TABLE admin(
    adminId varchar(6) NOT NULL,
    firstName varchar(20) NOT NULL,
    lastName varchar(20) NOT NULL,
    password varchar(30) NOT NULL,

    CONSTRAINT admin_pK PRIMARY KEY(adminId)
);


/* insert values to admin table */
INSERT INTO admin 
VALUES ('a1', 'Kasun', 'Herath', 'kasun1');

INSERT INTO admin 
VALUES ('a2', 'Saduni', 'Perera', 'saduni2');

/* create admin table */
CREATE TABLE plan(
    planId varchar(6) NOT NULL, 
    planName varchar(100) NOT NULL,
    planFee int, 
    planDescription varchar(200),
    duration varchar(20),

    CONSTRAINT plan_pk PRIMARY KEY(planId)
);

/* insert data into plan table */
INSERT INTO plan VALUES ('p1', 'Emergency Coverage', 150000, '', '1 Year'), 
                        ('p2', 'Complete Coverage', 240000, '', '1 Year'),
                        ('p3', 'Family All in One', 290000, '', '1 Year'),
                        ('p4', 'Elder Care', 120000, '', '1 Year'),
                        ('p5', "Children's plan", 130000, '', '1 Year');
/* alter plan description column */    

/* add foreign key as plan id in user table */
ALTER TABLE user 
ADD CONSTRAINT user_fk
    FOREIGN KEY(planId) REFERENCES plan(planId);

/* insert data in to employee table */
INSERT INTO employee VALUE ('e1', 'Saduni Geethma', '1997-05-12', '0758986524', 'Insurance Coordinator');
INSERT INTO employee VALUE ('e2', 'Malinda Sirinanda', '1988-10-25', '0774567890', 'Human Resources Manager');
INSERT INTO employee VALUE ('e3', 'Kumaraji Ihalagamage', '1990-03-18', '0712345678', 'IT specialist');
INSERT INTO employee VALUE ('e4', 'Suruduni Marisge', '1985-07-08', '0765432109', 'Data Analyst');
INSERT INTO employee VALUE ('e5', 'Anuwari Pieris', '1993-12-30', '0789012345', 'Finance Manager');
INSERT INTO employee VALUE ('e6', 'Perani Devadunug', '1982-09-15', '0723456789', 'Claim Processor');

/* Annual Fee Table */
CREATE Table annualFee(
    feeId VARCHAR(6) NOT NULL,
    userId int NOT NULL,
    amount FLOAT NOT NULL,
    paymentDate DATE NOT NULL,
    status VARCHAR(20),

    CONSTRAINT annualFee_pk PRIMARY KEY(feeId),
    CONSTRAINT annualFee_fk FOREIGN KEY (userId) REFERENCES user(userId)
);

CREATE TABLE planUpdate ( 
    planId VARCHAR(6) NOT NULL, 
    adminId VARCHAR(6) NOT NULL, 
    updateDate VARCHAR(20) NOT NULL, 
    
    CONSTRAINT planUpdate_pk PRIMARY KEY (planId, adminId), 
    CONSTRAINT planUpdate_fk1 FOREIGN KEY (planId) REFERENCES plan(planId), 
    CONSTRAINT planUpdate_fk2 FOREIGN KEY (adminId) REFERENCES admin(adminId) 
); 

create table claimRequest (
	claimId int AUTO_INCREMENT not null,
    userId int not null,
    fileName varchar(255) not null,
    note varchar(200) not null,
    date varchar(20) not null,
    status varchar(20)  not null,
    
    CONSTRAINT claimRequest_pk PRIMARY KEY (claimId),
    CONSTRAINT claimRequest_fk FOREIGN KEY (userId) REFERENCES user(userId)
);

CREATE TABLE complaint (
	complaintId int AUTO_INCREMENT not null,
    userId int NOT NULL,
    date VARCHAR(15) NOT NULL, 
    complaintType VARCHAR(25) NOT NULL, 
    description VARCHAR(255) NOT NULL,
    status VARCHAR(25) NOT NULL,
    
    CONSTRAINT complaint_pk PRIMARY KEY (complaintId),
    CONSTRAINT complaint_fk FOREIGN KEY (userId) REFERENCES user(userId)
);