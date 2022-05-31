--
-- File generated with SQLiteStudio v3.2.1 on Tue May 31 20:32:07 2022
--
-- Text encoding used: System
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: ItemClass
CREATE TABLE ItemClass (itemclassdesc VARCHARf NOT NULL, itemclassid INT PRIMARY KEY);

-- Table: useritems
CREATE TABLE useritems (useritemid INT PRIMARY KEY, userid INT REFERENCES users (userid), itemclassid INT REFERENCES ItemClass (itemclassid), brand VARCHAR, model STRING, serialnumber STRING NOT NULL, color VARCHAR, is_approved BOOLEAN, approvedby STRING, is_in BOOLEAN, is_inby STRING, is_out BOOLEAN, is_outby STRING, is_indate DATE, is_outdate DATE, approved_date DATE, item_picture BLOB);

-- Table: users
CREATE TABLE users (userid INT PRIMARY KEY, "name " VARCHAR NOT NULL, course VARCHAR NOT NULL, username VARCHAR NOT NULL, "password " STRING NOT NULL);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
