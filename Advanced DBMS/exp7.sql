use Banking;
SELECT bname
FROM DEPOSIT
GROUP BY bname
HAVING SUM(AMOUNT) > 50000;
select bname from deposit  where bname in(
select bname from branch  where branch.city='MUMBAI')  
group by bname having sum(amount) >5000;
SELECT cname
FROM Deposit
WHERE AMOUNT = (SELECT MAX(AMOUNT) FROM Deposit);
SELECT cname FROM Deposit  WHERE bname IN (
    SELECT bname FROM Deposit GROUP BY bname HAVING AVG(amount) > 5000);
SELECT bname FROM Branch 
WHERE bname IN (
    SELECT bname FROM Deposit GROUP BY bname
    ORDER BY COUNT(cname) DESC);
SELECT COUNT(cname) AS depositor_count
FROM Deposit
WHERE cname IN (
    SELECT cname FROM Customer WHERE city = 'DELHI');
SELECT city
FROM Branch
GROUP BY city
ORDER BY count(bname) DESC;
SELECT COUNT(cname) AS customer_count
FROM Customer
WHERE city IN (
    SELECT city
    FROM Branch
);



