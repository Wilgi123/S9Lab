create database employeedb;
use employeedb;
CREATE TABLE emp (
    empno INT(4) PRIMARY KEY,
    ename CHAR(10),
    hiredate DATE,
    salary DECIMAL(8, 2),
    commission DECIMAL(8, 2)
);
truncate table emp;
select * from emp;
INSERT INTO emp (empno, ename, hiredate, salary, commission) VALUES
    (101, 'Ramesh', '1980-01-17', 5000.00, NULL),
    (102, 'Ajay', '1985-01-05', 5000.00, 500.00),
    (103, 'Ravi', '1981-08-12', 1500.00, NULL),
    (104, 'Nikesh', '1983-03-03', 3000.00, 700.00),
    (105, 'Ravi', '1985-07-05', 3000.00, NULL);
ALTER TABLE emp
ADD CONSTRAINT check_min_sal CHECK (salary >= 1500);
ALTER TABLE emp
ADD CONSTRAINT check_len_empno CHECK (length(empno <= 3));
ALTER TABLE emp
ADD COLUMN dept VARCHAR(5);
ALTER TABLE emp
CHANGE COLUMN dept department VARCHAR(5);
ALTER TABLE emp
MODIFY COLUMN department VARCHAR(10);
RENAME TABLE emp TO employee;
select * from employee;
show tables;
truncate table employee;
drop table employee;

