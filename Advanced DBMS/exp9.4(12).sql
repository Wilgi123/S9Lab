USE Banking;
DELIMITER //

CREATE PROCEDURE CheckPalindrome(IN num INT)
BEGIN
    DECLARE orinum INT;
    DECLARE rev INT DEFAULT 0;
    DECLARE rem INT;
    SET orinum = num;
    WHILE num > 0 DO
        SET rem = num % 10;
        SET rev = rev * 10 + rem;
        SET num = FLOOR(num / 10);
    END WHILE;
    IF orinum = rev THEN
        SELECT CONCAT(orinum, ' is a palindrome.') AS result;
    ELSE
        SELECT CONCAT(orinum, ' is not a palindrome.') AS result;
    END IF;
END //
DELIMITER ;
CALL CheckPalindrome(121);

