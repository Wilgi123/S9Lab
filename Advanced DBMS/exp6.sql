use Banking;
SELECT SUM(amount) AS total_loan
FROM Borrow;
SELECT SUM(amount) AS total_deposit
FROM Deposit;
SELECT SUM(amount) AS total_loan
FROM Borrow
WHERE bname = 'BranchD';
SELECT SUM(amount) AS total_deposit
FROM Deposit
WHERE adate > '1996-01-01';
SELECT SUM(amount) AS total_deposit
FROM Deposit
WHERE cname IN (
    SELECT cname
    FROM Customer
    WHERE city = 'NAGPUR'
);
SELECT MAX(amount) AS max_deposit FROM Deposit WHERE cname IN (
    SELECT cname FROM Customer WHERE city = 'NAGPUR'
);
SELECT SUM(amount) AS total_deposit FROM Deposit WHERE bname IN (
    SELECT bname FROM Branch WHERE city = 'MUMBAI'
);
SELECT COUNT(DISTINCT city) AS total_branch_cities
FROM Branch;
SELECT COUNT(DISTINCT city) AS total_customer_cities
FROM Customer;






