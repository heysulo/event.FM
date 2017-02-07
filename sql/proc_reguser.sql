DROP PROCEDURE reguser;
DELIMITER //
 
CREATE PROCEDURE reguser (IN mid INT, IN fn VARCHAR(50), IN mn VARCHAR(50), IN ln VARCHAR(50), IN nm VARCHAR(200), IN gen VARCHAR(10) , IN mail VARCHAR(512))
BEGIN
    DECLARE counter int; 
    SELECT count(*) INTO counter
    FROM member
    WHERE member_id = mid;
    IF counter=0 THEN
		INSERT INTO member VALUES (mid,fn,mn,ln,nm,gen,mail);
        SELECT 1;
	else
		SELECT 0;
    END IF;
END//
DELIMITER ;