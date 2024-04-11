use Banking;
select * from Customer;
select * from Branch;
CREATE VIEW DelhiCustomers AS
SELECT *
FROM Customer
WHERE city = 'DELHI';
SELECT * FROM DelhiCustomers;
select * from Deposit;
CREATE VIEW HighValueDeposits AS
SELECT *
FROM Deposit
WHERE amount > 5000.00;
SELECT * from HighValueDeposits;