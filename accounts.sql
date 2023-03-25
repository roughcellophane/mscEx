-- mga tables

CREATE TABLE Users (
    UserID int,
    LName varchar(255),
    FName varchar(255),
    Pass varchar(255),
    Access varchar(255)
    );

CREATE TABLE Menu (
    ProdID VARCHAR(255),
    ProdName varchar(255),
    AvailBool boolean,
    PriceValue int,
    PrepTime int
);

CREATE TABLE Orders (
    OrderID varchar(255),
    CurrentStatus varchar(255),
    UserID int,
    ProdID varchar(255),
    ProdNum varchar(255),
    CurrentTime int
);


INSERT INTO Menu (ProdID, ProdName, AvailBool, PriceValue, PrepTime)
VALUES ROW ("M2", "Fried Chicken", "1", "70", "60");

INSERT INTO Users (UserID, LName, FName, Pass, Access)
VALUES ROW ("57647", "Italio", "Melody", "MItalio", "60");

INSERT INTO Orders (OrderID, CurrentStatus, UserID, ProdID, ProdNum, CurrentTime)
VALUES ROW ("434893", "SENT", "57467", "2", "1", "2");