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
    userId VARCHAR(10) NOT NULL,
    firstName VARCHAR() NOT NULL,
    lastName VARCHAR() NOT NULL,

    CONSTRAINT user_pk PRIMARY KEY(userId)
);

/* alter user table */
ALTER TABLE user 
ALTER COLUMN gender VARCHAR(10) NOT NULL,
ALTER COLUMN mobileNumber VARCHAR(10) NOT NULL,
ALTER COLUMN email VARCHAR(10) NOT NULL,
ALTER COLUMN address VARCHAR(150) NOT NULL,
ALTER COLUMN dob DATE NOT NULL,
ALTER COLUMN planId VARCHAR(10) NOT NULL,
ALTER COLUMN password VARCHAR(30) NOT NULL;

/* insert values to user table */
INSERT INTO user 
VALUES ('u1', 'Pavan', 'Uthsara', 'male', '0714169538', 'pavan@shieldplus.com', 'No.2, Welthera mawatha, Kothalawala', '2003-08-29', 'p1', 'uthsara');

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
