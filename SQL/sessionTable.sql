CREATE TABLE tblSession (
    pmkSessionId int NOT NULL AUTO_INCREMENT,
    fpkUsername varchar(50) NOT NULL,
    fldDifficulty varchar(50),
    fldLength int,
    PRIMARY KEY (pmkSessionId)
);