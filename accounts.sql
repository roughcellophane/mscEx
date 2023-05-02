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
    CurrentTime int,
    ProdName varchar(255)
);

CREATE TABLE TStamps(
    OrderID varchar(255),
    UserID int,
    OrderSent varchar(255),
    OrderReceived varchar(255),
    OrderUp varchar(255)
);

CREATE TABLE Timers(
    UserID int,
    TimeLeft int,
    InitTime int,
    StartTime int
);


INSERT INTO Menu (ProdID, ProdName, AvailBool, PriceValue, PrepTime)
VALUES
	("M1", "Tonkatsu", "1", "50", "50"),
	("M2", "Fried Chicken", "1", "70", "30"),
	("M3", "Dinuguan", "1", "70", "30"),
	("M4", "Bopis", "1", "70", "30"),
	("M5", "Adobong Pusit", "1", "70", "30"),
	("M6", "Sinigang na Baboy", "1", "70", "30"),
	("M7", "Sisig", "1", "70", "30"),
	("M8", "Adobong Pusit", "1", "70", "30"),
	("A1", "Spaghetti", "1", "70", "30"),
	("A2", "Carbonara", "1", "70", "30");
    
INSERT INTO Users (UserID, LName, FName, Pass, Access)
VALUES
	("57647", "Italio", "Melody", "MItalio","customer"),
	("39048", "Placido", "Ernell", "EPlacido","customer"),
	("93827", "Ramil", "Dianne", "DRamil","customer"),
    ("10000","sal","upan","slowpan","admin");


