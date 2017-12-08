CREATE TABLE escNaChange (
    id			INTEGER auto_increment primary key,
    codEsc		INTEGER UNSIGNED,
	oldNoEsc	varchar(100),
    newNoEsc	varchar(100),
    changeTim 	DATETIME DEFAULT NULL
);

DELIMITER //
CREATE TRIGGER EscNameChanged 
    BEFORE UPDATE ON escola
    FOR EACH ROW 
BEGIN
    if old.noesc != new.noesc then
		INSERT INTO escNaChange(oldNoEsc, newnoEsc, changetim) 
        values(old.noEsc, NEW.noEsc, NOW());
    end if;  
END//
DELIMITER ;