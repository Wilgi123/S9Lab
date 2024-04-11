USE Banking;
DELIMITER //
CREATE PROCEDURE CheckArmstrong(IN num INT)
BEGIN
    DECLARE orinum INT;
    DECLARE sum INT DEFAULT 0;
    DECLARE digit INT;
    DECLARE numlen INT;
    SET orinum = num;
    SET numlen= LENGTH(num);
    WHILE num > 0 DO
        SET digit = num % 10;
        SET sum = sum + POW(digit, numlen);
        SET num = FLOOR(num / 10);
    END WHILE;
    IF orinum = sum THEN
        SELECT CONCAT(orinum, ' is an Armstrong number.') AS result;
    ELSE
        SELECT CONCAT(orinum, ' is not an Armstrong number.') AS result;
    END IF;
END //
DELIMITER ;
CALL CheckArmstrong(153);
