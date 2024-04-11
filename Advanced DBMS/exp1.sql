create database Banking;
use Banking;
CREATE TABLE Customer (
    cname VARCHAR(100) PRIMARY KEY,
    city VARCHAR(50) NOT NULL
);
CREATE TABLE Branch (
    bname VARCHAR(100) PRIMARY KEY,
    city VARCHAR(50) CHECK(city IN ('NAGPUR', 'DELHI', 'BANGALORE', 'MUMBAI')) NOT NULL
);
CREATE TABLE Deposit (
    actno VARCHAR(20) PRIMARY KEY CHECK (actno LIKE 'D%'),
    name VARCHAR(100),
    bname VARCHAR(100),
    amount DECIMAL(8, 2) CHECK (amount > 0) NOT NULL,
    adate DATE,
    FOREIGN KEY (name) REFERENCES Customer(cname),
    FOREIGN KEY (bname) REFERENCES Branch(bname)
);
CREATE TABLE Borrow (
    loanno VARCHAR(20) PRIMARY KEY CHECK (loanno LIKE 'L%'),
    cname VARCHAR(100),
    bname VARCHAR(100),
    amount DECIMAL(8, 2) CHECK (amount > 0) NOT NULL,
    FOREIGN KEY (cname) REFERENCES Customer(cname),
    FOREIGN KEY (bname) REFERENCES Branch(bname)
);