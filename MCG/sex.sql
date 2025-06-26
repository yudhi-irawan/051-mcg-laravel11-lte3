-- Last Edited       : 2025-06-25
-- File name         : sex.sql

-- Modul Description : Tabel Sex
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
-- call sex_one_add(0,'LAKI-LAKI');
-- call sex_one_add(0,'PEREMPUAN');

-- select * from sex_one_view
-- select * from sex_one_view where id=1

-- call sex_one_add(0,'PEREMPUAN');
-- Sample----------------------------------------------------------

DROP VIEW IF EXISTS sex_one_view;
CREATE VIEW sex_one_view AS
	-- empty(SELECT Script)

	-- two-109
	SELECT
		sex.id
		,sex.desc
	FROM sex
	ORDER BY 1 ASC
;

DROP PROCEDURE IF EXISTS sex_one_add;
DELIMITER $$
CREATE PROCEDURE sex_one_add(
	-- two-241)
	IN _id integer
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
		FROM sex
		WHERE 1=1
			 and CONVERT(`desc` USING utf8mb4)=CONVERT(_desc USING utf8mb4)
    );
	IF (nCount IS NOT NULL AND nCount > 0) THEN
		SET result = "DOUBLE";
	ELSE
		SET result = "OK";
		-- two-351
		INSERT INTO sex(
			`desc`
		) values(
			upper(_desc)
		);
		SET last_insert_id = LAST_INSERT_ID();
	END IF;
	SELECT result
		,last_insert_id
		;
END;
$$
DELIMITER ; -- two-410

DROP PROCEDURE IF EXISTS sex_one_edit;
DELIMITER $$
CREATE PROCEDURE sex_one_edit(
	IN _id integer
	,IN _desc varchar(255)
	)
BEGIN
	DECLARE result varchar (6);
	-- two-468
	UPDATE sex SET
		`desc`=upper(_desc)
	WHERE 
		id=_id
	;

	SET result = "OK";
	SELECT result;
END;
$$
DELIMITER ; -- two-527

DROP PROCEDURE IF EXISTS sex_one_delete;
DELIMITER $$
CREATE PROCEDURE sex_one_delete(
	IN _id integer
	)
BEGIN
	DECLARE result varchar (6);

	DELETE FROM sex
	WHERE 
		id=_id
	;

	SET result = "OK";
	SELECT result;
END;
$$
DELIMITER ; -- two-646




