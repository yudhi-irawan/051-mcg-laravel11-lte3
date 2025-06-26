-- Last Edited       : 2025-06-25
-- File name         : edu.sql

-- Modul Description : Table Education Level
-- Date              : 2022-01-20
-- Created by.       : yudhi irawan
-- Contact person    : IG: @iam.yudhi_irawan


-- MCG - Massive CRUD Generator Laravel-AdminLTE3-MySQL for Laravel 11 ver. May 2025-Free Version

-- Private message at Telegram        : @yudhi_irawan
-- Private activity feeds at Instagram: @iam.yudhi_irawan

-- Download Massive CRUD Generator on telegram and github link
-- MCG Application: https://t.me/MCGFreeVersion
-- Documentation  : https://yudhi-irawan.github.io/mcg-documentation/tutorial.html
-- Testing        : 
-- Template       : 

-- Donation and Support link
-- Ko-fi   : https://ko-fi.com/MassiveCrudGenerator
-- Trakteer: https://trakteer.id/MassiveCrudGenerator

-- Please follow us for information about new releases

-- Sample----------------------------------------------------------
-- call edu_one_add(0,'TK','TAMAN KANAK-KANAK');
-- call edu_one_add(0,'SD','SEKOLAH DASAR');
-- call edu_one_add(0,'SMP','SEKOLAH MENENGAH PERTAMA');
-- call edu_one_add(0,'SMU','SEKOLAH MENENGAH UMUM');
-- call edu_one_add(0,'SMK','SEKOLAH MENENGAH KEJURUAN');
-- call edu_one_add(0,'D1','DIPLOMA 1');
-- call edu_one_add(0,'D2','DIPLOMA 2');
-- call edu_one_add(0,'D3','DIPLOMA 3');
-- call edu_one_add(0,'D4','DIPLOMA 4');
-- call edu_one_add(0,'S1','STRATA 1');
-- call edu_one_add(0,'S2','STRATA 2');
-- call edu_one_add(0,'S3','STRATA 3');

-- select * from edu_one_view
-- select * from edu_one_view where id=1

-- call edu_one_add(0,'SMU','SEKOLAH MENENGAH UMUM');
-- Sample----------------------------------------------------------

DROP VIEW IF EXISTS edu_one_view;
CREATE VIEW edu_one_view AS
	-- empty(SELECT Script)

	-- two-109
	SELECT
		edu.id
		,edu.code
		,edu.desc
	FROM edu
	ORDER BY 1 ASC
;

DROP PROCEDURE IF EXISTS edu_one_add;
DELIMITER $$
CREATE PROCEDURE edu_one_add(
	-- two-241)
	IN _id integer
	,IN _code varchar(255)
	,IN _desc varchar(255)
	)
BEGIN
	DECLARE result varchar (6);
	DECLARE last_insert_id integer DEFAULT 0;
	DECLARE period varchar (4) default "2306";
	DECLARE _docnum varchar(5);
	DECLARE _fulldocnum varchar(100);
	DECLARE nCount integer;

	SET nCount =
    (
		SELECT count(*)
		FROM edu
		WHERE 1=1
			 and CONVERT(code USING utf8mb4)=CONVERT(_code USING utf8mb4)
    );
	IF (nCount IS NOT NULL AND nCount > 0) THEN
		SET result = "DOUBLE";
	ELSE
		SET result = "OK";
		-- two-351
		INSERT INTO edu(
			code
			,`desc`
		) values(
			upper(_code)
			,upper(_desc)
		);
		SET last_insert_id = LAST_INSERT_ID();
	END IF;
	SELECT result
		,last_insert_id
		;
END;
$$
DELIMITER ; -- two-410

DROP PROCEDURE IF EXISTS edu_one_edit;
DELIMITER $$
CREATE PROCEDURE edu_one_edit(
	IN _id integer
	,IN _code varchar(255)
	,IN _desc varchar(255)
	)
BEGIN
	DECLARE result varchar (6);
	-- two-468
	UPDATE edu SET
		code=upper(_code)
		,`desc`=upper(_desc)
	WHERE 
		id=_id
	;

	SET result = "OK";
	SELECT result;
END;
$$
DELIMITER ; -- two-527

DROP PROCEDURE IF EXISTS edu_one_delete;
DELIMITER $$
CREATE PROCEDURE edu_one_delete(
	IN _id integer
	)
BEGIN
	DECLARE result varchar (6);

	DELETE FROM edu
	WHERE 
		id=_id
	;

	SET result = "OK";
	SELECT result;
END;
$$
DELIMITER ; -- two-646




