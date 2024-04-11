USE Banking;
DELIMITER //
CREATE PROCEDURE FindEvenNumbers()
BEGIN
    DECLARE orinum INT DEFAULT 1;
    DECLARE even VARCHAR(1000) DEFAULT '';
    WHILE orinum <= 10 DO
        IF MOD(orinum, 2) = 0 THEN
            SET even = CONCAT(even, 'Even Number: ', orinum, '\n');
        END IF;
        SET orinum = orinum + 1;
    END WHILE;
    SELECT even AS result;
END //
DELIMITER ;
CALL FindEvenNumbers();
