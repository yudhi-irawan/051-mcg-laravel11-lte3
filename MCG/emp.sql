-- Last Edited       : 2025-06-25
-- File name         : emp.sql

-- Modul Description : Employee
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

DROP VIEW IF EXISTS emp_one_view;
CREATE VIEW emp_one_view AS
	-- empty(SELECT Script)

	-- two-109
	SELECT
		emp.id
		,emp.name
		,emp.bday
		,emp.sex_id
		,sex.desc AS sex_desc
		,emp.edu_code
		,edu.desc AS edu_desc
	FROM emp
	LEFT JOIN edu AS edu ON edu.code = emp.edu_code
	LEFT JOIN sex AS sex ON sex.id = emp.sex_id
	ORDER BY 1 ASC
;

DROP PROCEDURE IF EXISTS emp_one_add;
DELIMITER $$
CREATE PROCEDURE emp_one_add(
	-- two-241)
	IN _id integer
	,IN _name varchar(255)
	,IN _bday date
	,IN _sex_id integer
	,IN _edu_code varchar(255)
	)
BEGIN
	DECLARE result varchar (6);
	DECLARE last_insert_id integer DEFAULT 0;
	DECLARE period varchar (4) default "2306";
	DECLARE _docnum varchar(5);
	DECLARE _fulldocnum varchar(100);

		SET result = "OK";
		-- two-351
		INSERT INTO emp(
			name
			,bday
			,sex_id
			,edu_code
		) values(
			upper(_name)
			,_bday
			,_sex_id
			,_edu_code
		);
		SET last_insert_id = LAST_INSERT_ID();

	SELECT result
		,last_insert_id
		;
END;
$$
DELIMITER ; -- two-410

DROP PROCEDURE IF EXISTS emp_one_edit;
DELIMITER $$
CREATE PROCEDURE emp_one_edit(
	IN _id integer
	,IN _name varchar(255)
	,IN _bday date
	,IN _sex_id integer
	,IN _edu_code varchar(255)
	)
BEGIN
	DECLARE result varchar (6);
	-- two-468
	UPDATE emp SET
		name=upper(_name)
		,bday=_bday
		,sex_id=_sex_id
		,edu_code=_edu_code
	WHERE 
		id=_id
	;

	SET result = "OK";
	SELECT result;
END;
$$
DELIMITER ; -- two-527

DROP PROCEDURE IF EXISTS emp_one_delete;
DELIMITER $$
CREATE PROCEDURE emp_one_delete(
	IN _id integer
	)
BEGIN
	DECLARE result varchar (6);

	DELETE FROM emp
	WHERE 
		id=_id
	;

	SET result = "OK";
	SELECT result;
END;
$$
DELIMITER ; -- two-646




