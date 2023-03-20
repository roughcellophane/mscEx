-- mga tables

CREATE TABLE Users (
    UserID int,
    LName varchar(255),
    FName varchar(255),
    Password varchar(255),
    Access varchar(255)
)

CREATE TABLE Menu (
    ProdID VARCHAR(255),
    ProdName varchar(255),
    AvailBool boolean,
    PriceValue int,
    PrepTime int
)

CREATE TABLE Orders (
    OrderID varchar(255),
    CurrentStatus varchar(255),
    UserID int,
    ProdID array,
    ProdNum array,
    CurrentTime int
)

-- data input
INSERT INTO Menu (ProdID, ProdName, AvailBool, PriceValue, PrepTime)
VALUES ROW("M2", "Fried Chicken", "TRUE", "70", "60"),
       ROW(,,,,),
       ;

INSERT INTO Users (UserID, LName, FName, Password, Access)
VALUES ROW("57647", "Italio", "Melody", "70", "60"),
       ROW(,,,,),
       ;

INSERT INTO Orders (OrderID, CurrentStatus, UserID, ProdID, ProdNum, CurrentTime)