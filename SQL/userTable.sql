CREATE TABLE tblUser (
    pmkUsername varchar(50) NOT NULL,
    fldFirstName varchar(50) NOT NULL,
    fldLastName varchar(50) NOT NULL,
    fldEmail varchar(50) NOT NULL,
    fldPassword varchar(50) NOT NULL,
    fldAge int,
    fldWeight float,
    fldExpeirence int,
    fldVGrade int,
    fldSportGrade float,
    PRIMARY KEY(pmkUsername)
);