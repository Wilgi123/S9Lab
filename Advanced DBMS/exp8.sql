SELECT Customer.cname
FROM Customer
JOIN Deposit ON Customer.cname = Deposit.cname
JOIN Branch ON Deposit.bname = Branch.bname
WHERE Branch.city = 'DELHI';
SELECT  Deposit.cname
FROM Deposit 
JOIN Borrow  ON Deposit.cname = Borrow.cname;
SELECT Deposit.bname
FROM Deposit
JOIN Borrow ON Borrow.Bname = Deposit.bname
GROUP BY Borrow.bname
HAVING SUM(Borrow.AMOUNT) > SUM(Deposit.AMOUNT);
SELECT Deposit.cname
FROM Deposit
JOIN Borrow ON Borrow.cname = Deposit.cname
WHERE Deposit.amount = (SELECT MAX(AMOUNT) FROM Deposit)
  AND Borrow.amount = (SELECT MAX(AMOUNT) FROM Borrow);
SELECT Borrow.bname
FROM Borrow
JOIN Deposit  ON Deposit.bname = Borrow.bname
GROUP BY Borrow.bname
HAVING SUM(Deposit.amount) > SUM(Borrow.amount);
SELECT Customer.cname
FROM Customer
JOIN Borrow ON Customer.cname = Borrow.cname
WHERE Borrow.amount > (SELECT AVG(amount) FROM Borrow);




