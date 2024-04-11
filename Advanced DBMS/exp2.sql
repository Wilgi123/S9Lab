use Banking;
INSERT INTO Customer (cname, city) VALUES
    ('John Doe', 'NAGPUR'),
    ('Jane Smith', 'DELHI'),
    ('Bob Johnson', 'BANGALORE'),
    ('Alice Brown', 'MUMBAI');
 INSERT INTO Branch (bname, city) VALUES
    ('BranchA', 'NAGPUR'),
    ('BranchB', 'DELHI'),
    ('BranchC', 'BANGALORE'),
    ('BranchD', 'MUMBAI');
 INSERT INTO Deposit (actno, name, bname, amount, adate) VALUES
    ('D123456', 'John Doe', 'BranchA', 1500.00, '2024-01-09'),
    ('D789012', 'Jane Smith', 'BranchB', 2000.50, '2024-01-10'),
    ('D345678', 'Bob Johnson', 'BranchC', 1000.75, '2024-01-11'),
    ('D901234', 'Alice Brown', 'BranchD', 2500.25, '2024-01-12');  
 INSERT INTO Borrow (loanno, cname, bname, amount) VALUES
    ('L987654', 'John Doe', 'BranchA', 5000.00),
    ('L543210', 'Jane Smith', 'BranchB', 3000.50),
    ('L123456', 'Bob Johnson', 'BranchC', 2000.75),
    ('L789012', 'Alice Brown', 'BranchD', 10000.25);   
select * from Borrow;
