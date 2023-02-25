CREATE TABLE Users (
    UserID INT,
    LName varchar(255),
    FName varchar(255),
    Password varchar(255),
    Access varchar(255)
)

-- nasa accounts file tayo but lipat ko na lang ito after meeting 
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
    PrepTime int
)

INSERT INTO hi idol

