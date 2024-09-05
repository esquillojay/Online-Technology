CREATE TABLE tblemployees (
    
	employeeid int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	firstname varchar(75) NOT NULL,
	lastname varchar(75) NOT NULL,
	sex varchar(6) NOT NULL,
	departmentid int(5) NOT NULL

)

CREATE TABLE tbldepartment (

	departmentid int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	department varchar(50) NOT NULL

)

-- INDEXING (KEY)

ALTER TABLE tblemployees
ADD CONSTRAINT tblemployees_ibfk_1 FOREIGN KEY (departmentid) 
REFERENCES tbldepartment (departmentid) ON UPDATE CASCADE

-- JOINING

SELECT * FROM tblemployees
INNER JOIN tbldepartment ON
tblemployees.departmentid = tbldepartment.departmentid