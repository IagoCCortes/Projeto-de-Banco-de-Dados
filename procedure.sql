DELIMITER //
 CREATE PROCEDURE urbrur(IN num int)
   BEGIN
	if num = 1 then
		SELECT noEsc,codEsc  FROM escola where locali = 1 limit 20;
	end if; 
    if num = 2 then
		select noEsc,codEsc  FROM escola where locali = 2 limit 20;
    end if;    
	END //
 DELIMITER ;