USE Banking;
DELIMITER //
CREATE PROCEDURE find_minimum(IN a INT, IN b INT)
BEGIN
    DECLARE min_value INT;
    
    IF a < b THEN
        SET min_value = a;
    ELSE
        SET min_value = b;
    END IF;
    
    SELECT min_value AS result;
END //
DELIMITER ;

CALL find_minimum(10, 5);
