use Banking;
alter table Deposit 
rename column name to cname;
insert into Deposit(actno, cname, bname, amount, adate)values 
('D901267', 'Alice Brown', 'BranchC', 6500.25, '2024-02-12');
select cname from Deposit where cname  not in (select cname from Borrow);
select cname from Deposit where cname in(select cname from Borrow);
update  Deposit set bname='BranchD' where actno='D123456';
select cname from customer where city="NAGPUR" and cname in(
   select cname from deposit where bname in (
	 select bname FROM branch
	   WHERE city in("MUMBAI","DELHI")));

SELECT cname FROM Customer WHERE cname IN (
    SELECT cname FROM Deposit WHERE amount > 1000)AND cname IN (
    SELECT cname FROM Borrow WHERE amount < 10000);
SELECT cname
FROM Deposit 
WHERE amount < 8000 
  AND cname IN (
    SELECT cname
    FROM Customer 
    WHERE city = (SELECT city FROM Customer WHERE cname = 'Alice Brown')
  );
  



