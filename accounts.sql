-- mga tables

CREATE TABLE Users (
    UserID int,
    LName varchar(255),
    FName varchar(255),
    Pass varchar(255)
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
    
INSERT INTO Users (UserID, LName, FName, Password, Access)
VALUES
	("57647", "Italio", "Melody", "MItalio", "60"),
	("39048", "Placido", "Ernell", "EPlacido", "60"),
	("93827", "Ramil", "Dianne", "DRamil", "60");

INSERT INTO Orders (OrderID, CurrentStatus, UserID, ProdID, ProdNum, CurrentTime)
VALUES
	("434893", "SENT", "57467", "2", "1", "2");

SELECT * FROM MENU;
SELECT * FROM USERS;
SELECT * FROM ORDERS;