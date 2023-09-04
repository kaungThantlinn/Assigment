<?php

include('./connection.php');


// $create = "CREATE TABLE Pitchs (
//     PitchID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     PitchName Varchar(30)
// )";

// $result = mysqli_query($connect, $create);

// if ($result) {
//     echo "Pitchs Table Set Up Successfully";
// } else {
//     echo "Error in Pitchs Table";
// }

// $create = "CREATE TABLE Booking (
//     BookingCodeNo INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     BookingDate DATE,
//     PackageID INT,
//     Status VARCHAR(50),
//     Price INT,
//     Subtotal INT,
//     Tax INT,
//     CustomerEmail VARCHAR(100),
//     BookingQty INT,
//     PaymentType VARCHAR(50),
//     FOREIGN KEY (PackageID) REFERENCES Packages(PackageID)
// )";

// $result = mysqli_query($connect, $create);

// if ($result) {
//     echo "Booking Table Set Up Successfully";
// } else {
//     echo "Error in Booking Table";
// }



$create = "CREATE TABLE Pitchs (
    PackageID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    PackageName VARCHAR(30),
    Packageimage VARCHAR(255),
    Location VARCHAR(30),
    FacilitiesName1 VARCHAR(30),
    FacilitiesName2 VARCHAR(30),
    FacilitiesName3 VARCHAR(30),
    Localname1 VARCHAR(30),
    Localname2 VARCHAR(30),
    Localname3 VARCHAR(30),
    localimg1 VARCHAR(255),
    localimg2 VARCHAR(255),
    localimg3 VARCHAR(255),
    Price DECIMAL(10,2),
    Description TEXT,
    Status VARCHAR(20),
    CampsiteID INT,
    PitchTypeID INT,
    FOREIGN KEY (CampsiteID) REFERENCES Campsite(CampsiteID),
    FOREIGN KEY (PitchTypeID) REFERENCES PitchType(PitchTypeID)
)";

$result = mysqli_query($connect, $create);

if ($result) {
    echo "Pitchs Table Set Up Successfully";
} else {
    echo "Error in Pitchs Table";
}

// $create = "CREATE TABLE IF NOT EXISTS Reviews (
//     ReviewID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     CustomerID INT,
//     FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID),
//     ReviewMsg VARCHAR(100)
// )";

// $result = mysqli_query($connect, $create);

// if ($result) {
//     echo "Reviews Table Set Up Successfully";
// } else {
//     echo "Error in Reviews Table";
// }




// $create = "CREATE TABLE Contact (
//     ContactID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     ContactMessage VARCHAR(100);
//     Email Varchar (30)
    
// )";

// $result = mysqli_query($connect, $create);

// if ($result) {
//     echo "Contact Table Set Up Successfully";
// } else {
//     echo "Error in Contact Table";
// }






// $create = "CREATE TABLE Campsite(
//     CampsiteID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     CampsiteName Varchar(30),
//     Location Varchar(30)
// )";

// $result = mysqli_query($connect, $create);

// if ($result) {
//     echo "Campsite Table Set Up Successfully";
// } else {
//     echo "Error in Campsite Table";
// }

// $create = "CREATE TABLE Customers(
//     CustomerID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     CustomerFirstName Varchar(30),
//     CustomerSurname Varchar(30),
//     Email Varchar(30),
//     Address Varchar(30),
//     PhoneNo Varchar(30),
//     Viewcount INT,
//     Password Varchar(30)
// )";

// $result = mysqli_query($connect, $create);

// if ($result) {
//     echo "Customer Table Set Up Successfully";
// } else {
//     echo "Error in Customer Table";
// }

// $create ="CREATE TABLE Admin(
//     AdminID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     AdminName Varchar(30),
//     Email Varchar(30),
//     PhoneNo Int,
//     Password INT,
//     Position Varchar(30)

// )";

// $result= mysqli_query($connect,$create);

// if($result){
//     echo "Admin Table Set Up Successfully";
// }
// else{
//     echo "Error in Admin Table";
// }




?>