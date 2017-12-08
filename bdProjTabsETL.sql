CREATE DATABASE  IF NOT EXISTS `CE2016CO`;
USE CE2016CO;

DROP TABLE IF EXISTS TURMA;
DROP TABLE IF EXISTS DOCENTE;
DROP TABLE IF EXISTS MATRICULA;
DROP TABLE IF EXISTS ESCOLA;
DROP TABLE IF EXISTS DOCACS1;
DROP TABLE IF EXISTS DOCACS2;
DROP TABLE IF EXISTS DOCACS3;
DROP TABLE IF EXISTS DOCTURMA;
DROP TABLE IF EXISTS DOCESCOLA;

CREATE TABLE  TURMA
	(codTurma INTEGER UNSIGNED PRIMARY KEY,
	 durTurma INTEGER,
	 nuMats INTEGER,
	 etEns INTEGER,
	 codEsc	INTEGER UNSIGNED references ESCOLA(codEsc));


CREATE TABLE  DOCENTE
	(codDoc	BIGINT UNSIGNED PRIMARY KEY,
	 idade 	INTEGER NOT NULL,
	 sexo ENUM('1', '2') NOT NULL,
	 corRaca ENUM('0', '1', '2', '3', '4', '5') NOT NULL,
	 nacio ENUM('1', '2', '3') NOT NULL);


CREATE TABLE MATRICULA
	(codMat	INTEGER UNSIGNED PRIMARY KEY,
	 idade INTEGER NOT NULL,
	 sexo ENUM('1', '2') NOT NULL,
	 corRaca ENUM('0', '1', '2', '3', '4', '5') NOT NULL,
	 nacio ENUM('1', '2', '3') NOT NULL,
	 codTurma INTEGER UNSIGNED references TURMA(codTurma),
	 codEsc	INTEGER UNSIGNED references ESCOLA(codEsc));


CREATE TABLE ESCOLA
	(codEsc	INTEGER UNSIGNED PRIMARY KEY,
	 noEsc varchar(100),
	 codORE	varchar(5),
	 sitFun	ENUM('1', '2', '3', '4') NOT NULL,
	 depAdm	ENUM('1', '2', '3', '4') NOT NULL,
	 locali	ENUM('1', '2') NOT NULL);
	 
	 
CREATE TABLE DOCTURMA
	(codDoc	BIGINT UNSIGNED references DOCENTE(codDoc),
	 codTurma INTEGER UNSIGNED references TURMA(codTurma),
	 tpAten	INTEGER,
	 PRIMARY KEY (codDoc, codTurma));

	 
CREATE TABLE DOCACS1
	(codDoc	BIGINT UNSIGNED references DOCENTE(codDoc),
	 codACS1 INTEGER,
	 codC1 varchar(6),
	 posLic1 INTEGER,
	 posPed1 INTEGER,
	 PRIMARY KEY (codDoc, codACS1));


CREATE TABLE DOCACS2
	(codDoc BIGINT UNSIGNED references DOCENTE(codDoc),
	 codACS2 INTEGER,
	 codC2 varchar(6),
	 posLic2 INTEGER,
	 posPed2 INTEGER,
	 PRIMARY KEY (codDoc, codACS2));	 
	 
	 
CREATE TABLE DOCACS3
	(codDoc	BIGINT UNSIGNED references DOCENTE(codDoc),
	 codACS3 INTEGER,
	 codC3 varchar(6),
	 posLic3 INTEGER,
	 posPed3 INTEGER,
	 PRIMARY KEY (codDoc, codACS3));	 
	 
	 
CREATE TABLE DOCESCOLA
	(codDoc	BIGINT UNSIGNED references DOCENTE(codDoc),
	 codEsc	INTEGER UNSIGNED references ESCOLA(codEsc),
	 PRIMARY KEY (codDoc, codEsc));		 
	
    
LOAD DATA LOCAL INFILE 'C:/Users/alexandre.teixeira/Downloads/micro_censo_escolar_2016/micro_censo_escolar_2016/DADOS/MODI//TURMAS.csv' INTO TABLE TURMA
CHARACTER SET latin1
FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n'  
IGNORE 1 LINES
(@col1,@col2,@col3,@col4,@col5,@col6,@col7,@col8,@col9,@col10,@col11,@col12,@col13,@col14,@col15,@col16,@col17,@col18,@col19,@col20,
@col21,@col22,@col23,@col24,@col25,@col26,@col27,@col28,@col29,@col30,@col31,@col32,@col33,@col34,@col35,@col36,@col37,@col38,@col39,
@col40,@col41,@col42,@col43,@col44,@col45,@col46,@col47,@col48,@col49,@col50,@col51,@col52,@col53,@col54,@col55,@col56,@col57,@col58,
@col59,@col60,@col61,@col62,@col63,@col64,@col65,@col66,@col67,@col68,@col69,@col70,@col71,@col72,@col73,@col74,@col75,@col76,@col77,
@col78,@col79,@col80,@col81,@col82,@col83,@col84,@col85,@col86,@col87,@col88) 
set codTurma = @col2, durTurma = @col6, nuMats =  @col7, etEns = @col13, codEsc = @col69;
	 
	 
LOAD DATA LOCAL INFILE 'C:/Users/alexandre.teixeira/Downloads/micro_censo_escolar_2016/micro_censo_escolar_2016/DADOS/MODI//DOCENTES_CO.csv' INTO TABLE DOCENTE 
FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n'  
IGNORE 1 LINES
(@col1,@col2,@col3,@col4,@col5,@col6,@col7,@col8,@col9,@col10,@col11,@col12,@col13,@col14,@col15,@col16,@col17,@col18,@col19,@col20,
@col21,@col22,@col23,@col24,@col25,@col26,@col27,@col28,@col29,@col30,@col31,@col32,@col33,@col34,@col35,@col36,@col37,@col38,@col39,
@col40,@col41,@col42,@col43,@col44,@col45,@col46,@col47,@col48,@col49,@col50,@col51,@col52,@col53,@col54,@col55,@col56,@col57,@col58,
@col59,@col60,@col61,@col62,@col63,@col64,@col65,@col66,@col67,@col68,@col69,@col70,@col71,@col72,@col73,@col74,@col75,@col76,@col77,
@col78,@col79,@col80,@col81,@col82,@col83,@col84,@col85,@col86,@col87,@col88,@col89,@col90,@col91,@col92,@col93,@col94,@col95,@col96,
@col97,@col98,@col99,@col100,@col101,@col102,@col103,@col104,@col105,@col106,@col107,@col108,@col109,@col110,@col111,@col112,@col113,
@col114,@col115,@col116,@col117,@col118,@col119,@col120,@col121,@col122,@col123,@col124,@col125,@col126,@col127,@col128,@col129,@col130,
@col131,@col132) 
set codDoc = @col2, idade = @col7, sexo =  @col8, corRaca = @col9, nacio = @col10;


LOAD DATA LOCAL INFILE 'C:/Users/alexandre.teixeira/Downloads/micro_censo_escolar_2016/micro_censo_escolar_2016/DADOS/MODI//DOCENTES_CO.csv' INTO TABLE DOCTURMA 
FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n'  
IGNORE 1 LINES
(@col1,@col2,@col3,@col4,@col5,@col6,@col7,@col8,@col9,@col10,@col11,@col12,@col13,@col14,@col15,@col16,@col17,@col18,@col19,@col20,
@col21,@col22,@col23,@col24,@col25,@col26,@col27,@col28,@col29,@col30,@col31,@col32,@col33,@col34,@col35,@col36,@col37,@col38,@col39,
@col40,@col41,@col42,@col43,@col44,@col45,@col46,@col47,@col48,@col49,@col50,@col51,@col52,@col53,@col54,@col55,@col56,@col57,@col58,
@col59,@col60,@col61,@col62,@col63,@col64,@col65,@col66,@col67,@col68,@col69,@col70,@col71,@col72,@col73,@col74,@col75,@col76,@col77,
@col78,@col79,@col80,@col81,@col82,@col83,@col84,@col85,@col86,@col87,@col88,@col89,@col90,@col91,@col92,@col93,@col94,@col95,@col96,
@col97,@col98,@col99,@col100,@col101,@col102,@col103,@col104,@col105,@col106,@col107,@col108,@col109,@col110,@col111,@col112,@col113,
@col114,@col115,@col116,@col117,@col118,@col119,@col120,@col121,@col122,@col123,@col124,@col125,@col126,@col127,@col128,@col129,@col130,
@col131,@col132) 
set codDoc = @col2, codTurma = @col104, tpAten = @col105;


LOAD DATA LOCAL INFILE 'C:/Users/alexandre.teixeira/Downloads/micro_censo_escolar_2016/micro_censo_escolar_2016/DADOS/MODI//DOCENTES_CO.csv' INTO TABLE DOCESCOLA 
FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n'  
IGNORE 1 LINES
(@col1,@col2,@col3,@col4,@col5,@col6,@col7,@col8,@col9,@col10,@col11,@col12,@col13,@col14,@col15,@col16,@col17,@col18,@col19,@col20,
@col21,@col22,@col23,@col24,@col25,@col26,@col27,@col28,@col29,@col30,@col31,@col32,@col33,@col34,@col35,@col36,@col37,@col38,@col39,
@col40,@col41,@col42,@col43,@col44,@col45,@col46,@col47,@col48,@col49,@col50,@col51,@col52,@col53,@col54,@col55,@col56,@col57,@col58,
@col59,@col60,@col61,@col62,@col63,@col64,@col65,@col66,@col67,@col68,@col69,@col70,@col71,@col72,@col73,@col74,@col75,@col76,@col77,
@col78,@col79,@col80,@col81,@col82,@col83,@col84,@col85,@col86,@col87,@col88,@col89,@col90,@col91,@col92,@col93,@col94,@col95,@col96,
@col97,@col98,@col99,@col100,@col101,@col102,@col103,@col104,@col105,@col106,@col107,@col108,@col109,@col110,@col111,@col112,@col113,
@col114,@col115,@col116,@col117,@col118,@col119,@col120,@col121,@col122,@col123,@col124,@col125,@col126,@col127,@col128,@col129,@col130,
@col131,@col132) 
set codDoc = @col2, codEsc = @col113;


LOAD DATA LOCAL INFILE 'C:/Users/alexandre.teixeira/Downloads/micro_censo_escolar_2016/micro_censo_escolar_2016/DADOS/MODI//DOCENTES_CO.csv' INTO TABLE DOCACS1 
FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n'  
IGNORE 1 LINES
(@col1,@col2,@col3,@col4,@col5,@col6,@col7,@col8,@col9,@col10,@col11,@col12,@col13,@col14,@col15,@col16,@col17,@col18,@col19,@col20,
@col21,@col22,@col23,@col24,@col25,@col26,@col27,@col28,@col29,@col30,@col31,@col32,@col33,@col34,@col35,@col36,@col37,@col38,@col39,
@col40,@col41,@col42,@col43,@col44,@col45,@col46,@col47,@col48,@col49,@col50,@col51,@col52,@col53,@col54,@col55,@col56,@col57,@col58,
@col59,@col60,@col61,@col62,@col63,@col64,@col65,@col66,@col67,@col68,@col69,@col70,@col71,@col72,@col73,@col74,@col75,@col76,@col77,
@col78,@col79,@col80,@col81,@col82,@col83,@col84,@col85,@col86,@col87,@col88,@col89,@col90,@col91,@col92,@col93,@col94,@col95,@col96,
@col97,@col98,@col99,@col100,@col101,@col102,@col103,@col104,@col105,@col106,@col107,@col108,@col109,@col110,@col111,@col112,@col113,
@col114,@col115,@col116,@col117,@col118,@col119,@col120,@col121,@col122,@col123,@col124,@col125,@col126,@col127,@col128,@col129,@col130,
@col131,@col132) 
set codDoc = @col2, codACS1 = @col29, codC1 =  @col30, posLic1 = @col31, posPed1 = @col32;


LOAD DATA LOCAL INFILE 'C:/Users/alexandre.teixeira/Downloads/micro_censo_escolar_2016/micro_censo_escolar_2016/DADOS/MODI//DOCENTES_CO.csv' INTO TABLE DOCACS2 
FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n'  
IGNORE 1 LINES
(@col1,@col2,@col3,@col4,@col5,@col6,@col7,@col8,@col9,@col10,@col11,@col12,@col13,@col14,@col15,@col16,@col17,@col18,@col19,@col20,
@col21,@col22,@col23,@col24,@col25,@col26,@col27,@col28,@col29,@col30,@col31,@col32,@col33,@col34,@col35,@col36,@col37,@col38,@col39,
@col40,@col41,@col42,@col43,@col44,@col45,@col46,@col47,@col48,@col49,@col50,@col51,@col52,@col53,@col54,@col55,@col56,@col57,@col58,
@col59,@col60,@col61,@col62,@col63,@col64,@col65,@col66,@col67,@col68,@col69,@col70,@col71,@col72,@col73,@col74,@col75,@col76,@col77,
@col78,@col79,@col80,@col81,@col82,@col83,@col84,@col85,@col86,@col87,@col88,@col89,@col90,@col91,@col92,@col93,@col94,@col95,@col96,
@col97,@col98,@col99,@col100,@col101,@col102,@col103,@col104,@col105,@col106,@col107,@col108,@col109,@col110,@col111,@col112,@col113,
@col114,@col115,@col116,@col117,@col118,@col119,@col120,@col121,@col122,@col123,@col124,@col125,@col126,@col127,@col128,@col129,@col130,
@col131,@col132) 
set codDoc = @col2, codACS2 = @col38, codC2 =  @col39, posLic2 = @col40, posPed2 = @col41;


LOAD DATA LOCAL INFILE 'C:/Users/alexandre.teixeira/Downloads/micro_censo_escolar_2016/micro_censo_escolar_2016/DADOS/MODI//DOCENTES_CO.csv' INTO TABLE DOCACS3 
FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n'  
IGNORE 1 LINES
(@col1,@col2,@col3,@col4,@col5,@col6,@col7,@col8,@col9,@col10,@col11,@col12,@col13,@col14,@col15,@col16,@col17,@col18,@col19,@col20,
@col21,@col22,@col23,@col24,@col25,@col26,@col27,@col28,@col29,@col30,@col31,@col32,@col33,@col34,@col35,@col36,@col37,@col38,@col39,
@col40,@col41,@col42,@col43,@col44,@col45,@col46,@col47,@col48,@col49,@col50,@col51,@col52,@col53,@col54,@col55,@col56,@col57,@col58,
@col59,@col60,@col61,@col62,@col63,@col64,@col65,@col66,@col67,@col68,@col69,@col70,@col71,@col72,@col73,@col74,@col75,@col76,@col77,
@col78,@col79,@col80,@col81,@col82,@col83,@col84,@col85,@col86,@col87,@col88,@col89,@col90,@col91,@col92,@col93,@col94,@col95,@col96,
@col97,@col98,@col99,@col100,@col101,@col102,@col103,@col104,@col105,@col106,@col107,@col108,@col109,@col110,@col111,@col112,@col113,
@col114,@col115,@col116,@col117,@col118,@col119,@col120,@col121,@col122,@col123,@col124,@col125,@col126,@col127,@col128,@col129,@col130,
@col131,@col132) 
set codDoc = @col2, codACS3 = @col47, codC3 =  @col48, posLic3 = @col49, posPed3 = @col50;


LOAD DATA LOCAL INFILE 'C:/Users/alexandre.teixeira/Downloads/micro_censo_escolar_2016/micro_censo_escolar_2016/DADOS/MODI/MATRICULA_CO.csv' INTO TABLE MATRICULA 
FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n'  
IGNORE 1 LINES
(@col1,@col2,@col3,@col4,@col5,@col6,@col7,@col8,@col9,@col10,@col11,@col12,@col13,@col14,@col15,@col16,@col17,@col18,@col19,@col20,
@col21,@col22,@col23,@col24,@col25,@col26,@col27,@col28,@col29,@col30,@col31,@col32,@col33,@col34,@col35,@col36,@col37,@col38,@col39,
@col40,@col41,@col42,@col43,@col44,@col45,@col46,@col47,@col48,@col49,@col50,@col51,@col52,@col53,@col54,@col55,@col56,@col57,@col58,
@col59,@col60,@col61,@col62,@col63,@col64,@col65,@col66,@col67,@col68,@col69,@col70,@col71,@col72,@col73,@col74,@col75,@col76,@col77,
@col78,@col79,@col80,@col81,@col82,@col83,@col84,@col85,@col86,@col87,@col88,@col89,@col90,@col91,@col92) 
set codMat = @col2, idade = @col8, sexo =  @col15, corRaca = @col16, nacio = @col17, codTurma = @col69, codEsc = @col73;


LOAD DATA LOCAL INFILE 'C:/Users/alexandre.teixeira/Downloads/micro_censo_escolar_2016/micro_censo_escolar_2016/DADOS/ESCOLAS.csv' INTO TABLE ESCOLA 
CHARACTER SET latin1
FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n'  
IGNORE 1 LINES
(@col1,@col2,@col3,@col4,@col5,@col6,@col7,@col8,@col9,@col10,@col11,@col12,@col13,@col14,@col15,@col16,@col17,@col18,@col19,@col20,
@col21,@col22,@col23,@col24,@col25,@col26,@col27,@col28,@col29,@col30,@col31,@col32,@col33,@col34,@col35,@col36,@col37,@col38,@col39,
@col40,@col41,@col42,@col43,@col44,@col45,@col46,@col47,@col48,@col49,@col50,@col51,@col52,@col53,@col54,@col55,@col56,@col57,@col58,
@col59,@col60,@col61,@col62,@col63,@col64,@col65,@col66,@col67,@col68,@col69,@col70,@col71,@col72,@col73,@col74,@col75,@col76,@col77,
@col78,@col79,@col80,@col81,@col82,@col83,@col84,@col85,@col86,@col87,@col88,@col89,@col90,@col91,@col92,@col93,@col94,@col95,@col96,
@col97,@col98,@col99,@col100,@col101,@col102,@col103,@col104,@col105,@col106,@col107,@col108,@col109,@col110,@col111,@col112,@col113,
@col114,@col115,@col116,@col117,@col118,@col119,@col120,@col121,@col122,@col123,@col124,@col125,@col126,@col127,@col128,@col129,@col130,
@col131,@col132,@col133,@col134,@col135,@col136,@col137,@col138,@col139,@col140,@col141,@col142,@col143,@col144,@col145,@col146,@col147,
@col148,@col149,@col150,@col151,@col152,@col153,@col154,@col155,@col156,@col157,@col158,@col159,@col160,@col161,@col162,@col163,@col164,
@col165,@col166) 
set codEsc = @col2, noEsc = @col3, codORE =  @col4, sitFun = @col5, depAdm = @col14, locali = @col15;