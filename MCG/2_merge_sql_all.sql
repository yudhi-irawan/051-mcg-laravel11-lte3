-- Last Edited : 2025-06-25
-- File name   : ~merge_*.sql


-- Last Edited       : 2025-06-25
-- File name         : sex.sql

-- Modul Description : Tabel Sex
-- Date              : 2022-01-20
-- Created by.       : yudhi irawan
-- Contact person    : IG: @iam.yudhi_irawan


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




-- Last Edited       : 2025-06-25
-- File name         : edu.sql

-- Modul Description : Table Education Level
-- Date              : 2022-01-20
-- Created by.       : yudhi irawan
-- Contact person    : IG: @iam.yudhi_irawan


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




-- Last Edited       : 2025-06-25
-- File name         : emp.sql

-- Modul Description : Employee
-- Date              : 2022-01-20
-- Created by.       : yudhi irawan
-- Contact person    : IG: @iam.yudhi_irawan


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




