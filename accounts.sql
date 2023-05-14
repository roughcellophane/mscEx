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
    ProdName varchar(255),
    PriceValue int
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
	("M1", "Tonkatsu with Rice", "1", "65", "50"),
	("M2", "Fried Chicken with Rice", "1", "70", "30"),
	("M3", "Dinuguan with Rice", "1", "70", "30"),
	("M4", "Bopis with Rice", "1", "65", "30"),
	("M5", "Adobong Pusit with Rice", "1", "65", "30"),
	("M6", "Sinigang na Baboy with Rice", "1", "70", "30"),
	("M7", "Sisig with Rice", "1", "65", "30"),
	("M8", "Bicol Express with Rice", "1", "70", "30"),
	("A1", "Tonkatsu A la Carte", "1", "55", "50"),
	("A2", "Fried Chicken A la Carte", "1", "60", "30"),
	("A3", "Dinuguan A la Carte", "1", "60", "30"),
	("A4", "Bopis A la Carte", "1", "55", "30"),
	("A5", "Adobong Pusit A la Carte", "1", "55", "30"),
	("A6", "Sinigang na Baboy A la Carte", "1", "60", "30"),
	("A7", "Sisig A la Carte", "1", "55", "30"),
	("A8", "Bicol Express A la Carte", "1", "60", "30"),	
	("A9", "Spaghetti", "1", "25", "50"),
	("A10", "Carbonara", "1", "25", "30"),
	("A11", "Baked Mac", "1", "25", "30"),
	("A12", "Egg Omelette", "1", "25", "30"),
	("A13", "Ginisang Upo", "1", "25", "30"),
	("A14", "Ginisang Monggo", "1", "25", "30"),
	("E1", "Rice", "1", "10", "50"),
	("E2", "Egg", "1", "10", "30"),
	("E3", "Ham", "1", "25", "30"),
	("E4", "Hotdog", "1", "25", "30"),
	("E5", "Siomai", "1", "5", "30"),
	("E6", "Salad", "1", "25", "30"),
	("D1", "Lemonade Small", "1", "10", "50"),
	("D2", "Lemonade Medium", "1", "20", "30"),
	("D3", "Blue Lemonade Small", "1", "10", "30"),
	("D4", "Blue Lemonade Medium", "1", "20", "30"),
	("D5", "Iced Tea Small", "1", "10", "30"),
	("D6", "Iced Tea Medium", "1", "20", "30"),
	("D7", "Red Iced Tea Small", "1", "10", "30"),
	("D8", "Red Iced Tea Medium", "1", "20", "30"),	
	("D9", "Cucumber Iced Tea Small", "1", "10", "50"),
	("D10", "Cucumber Iced Tea Medium", "1", "20", "30"),	
	("D11", "Mango Iced Tea Small", "1", "10", "50"),
	("D12", "Mango Iced Tea Medium", "1", "20", "30"),
	("D13", "Guyabano Iced Tea Small", "1", "10", "30"),
	("D14", "Guyabano Iced Tea Medium", "1", "20", "30"),
	("D15", "Melon Juice Small", "1", "10", "30"),
	("D16", "Melon Juice Medium", "1", "20", "30"),
	("D17", "Gulaman Small", "1", "10", "30"),	
	("D18", "Gulaman Medium", "1", "20", "30"),	
	("D19", "Milo Small", "1", "10", "50"),
	("D20", "Milo Medium", "1", "20", "30");
    
INSERT INTO Users (UserID, LName, FName, Pass, Access)
VALUES
	("57647", "Italio", "Melody", "MItalio","customer"),
	("39048", "Placido", "Ernell", "EPlacido","customer"),
	("93827", "Ramil", "Dianne", "DRamil","customer"),
    ("10000","sal","upan","slowpan","admin");


