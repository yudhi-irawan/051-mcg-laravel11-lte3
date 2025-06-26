-- Last Edited : 2025-06-25
-- File name   : ~merge_*.sql


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

-- database: mcg_db
-- hostname: localhost
-- Character set: utf8 (UTF-8 Unicode)
-- Collation: utf8_general_ci

-- CREATE DATABASE `mcg_db`
--     CHARACTER SET 'utf8'
--     COLLATE 'utf8_general_ci';

-- Sample----------------------------------------------------------

-- two-687
CREATE TABLE sex
(
	id integer not null auto_increment primary key
	,`desc` varchar(255) COMMENT 'desc is Reserved Keywords, change to another word!'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- two-687
CREATE TABLE edu
(
	id integer not null auto_increment primary key
	,code varchar(255)
	,`desc` varchar(255) COMMENT 'desc is Reserved Keywords, change to another word!'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- two-687
CREATE TABLE emp
(
	id integer not null auto_increment primary key
	,name varchar(255)
	,bday date
	,sex_id integer
	,edu_code varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- two-775
ALTER TABLE sex
	ADD UNIQUE KEY uk_sex_desc (`desc`)
;

-- two-775
ALTER TABLE edu
	ADD UNIQUE KEY uk_edu_code (code)
;

-- two-775
ALTER TABLE emp
	ADD CONSTRAINT fk_emp_sex_id_sex FOREIGN KEY (sex_id) REFERENCES sex(id)
	,ADD CONSTRAINT fk_emp_edu_code_edu FOREIGN KEY (edu_code) REFERENCES edu(code)
;

