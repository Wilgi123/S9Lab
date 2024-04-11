USE Banking;
DELIMITER //
CREATE PROCEDURE calculate_sum()
BEGIN
    DECLARE sum_result INT;
    DECLARE counter INT;
    SET sum_result = 0;
    SET counter = 1;
    WHILE counter <= 10 DO
        SET sum_result = sum_result + counter;
        SET counter = counter + 1;
    END WHILE;
    -- Display the result
    SELECT sum_result AS result;
END //
DELIMITER ;
CALL calculate_sum();
