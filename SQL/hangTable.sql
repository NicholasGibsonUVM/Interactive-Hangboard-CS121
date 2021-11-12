CREATE TABLE tblHang (
    pmkHangId int NOT NULL AUTO_INCREMENT,
    fpkSessionId int NOT NULL,
    fldHold varchar(50) NOT NULL,
    fldTime float NOT NULL,
    PRIMARY KEY (pmkHangId)
);