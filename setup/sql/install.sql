CREATE TABLE  `JackUser` (
  `Id` bigint(20) NOT NULL auto_increment,
  `Enabled` tinyint(1) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `LanguageId` SMALLINT,
  PRIMARY KEY  (`Id`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `UserLanguage` (
  `LanguageId` SMALLINT NOT NULL auto_increment,
  `Code` varchar(4) NOT NULL,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY  (`LanguageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `JackUser` ADD CONSTRAINT FOREIGN KEY (`LanguageId`) REFERENCES `UserLanguage` (`LanguageId`) ON DELETE SET NULL ON UPDATE CASCADE;

CREATE TABLE  `History` (
  `HistoryId` SMALLINT NOT NULL auto_increment,
  `TableName` varchar(255) NOT NULL,
  `RecordId` bigint(20) NOT NULL,
  `Json` LONGTEXT NOT NULL,
  `Created` TIMESTAMP,
  `ModifiedBy` BIGINT,  
  `ModifiedByName` varchar(255),
  PRIMARY KEY  (`HistoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `History` ADD CONSTRAINT FOREIGN KEY (`ModifiedBy`) REFERENCES `JackUser` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

CREATE TABLE  `JackStorage` (
  `JackStorageId` SMALLINT unsigned NOT NULL auto_increment,
  `StorageFolder` text NOT NULL,
  `AdminAccessLocation` text NOT NULL,
  `PublicAccessLocation` text NOT NULL,
  PRIMARY KEY  (`JackStorageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--  ======================================
--        GENERAL CONTACTS TABLE 
--  ====================================== 
CREATE TABLE  `Contact` (
  `ContactId` BIGINT unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(64) NOT NULL,
    `LastName` varchar(64),
  `Email` varchar(256),
  `AltEmail` varchar(256),
  `WorkPhone` varchar(20),
  `HomePhone` varchar(20),
  `Fax` varchar(20),
  `Mobile` varchar(20),
  `AltMobile` varchar(20),
  `Notes` text,
  `TwitterId` varchar(32),
  `Facebook` varchar(32),
  `LinkedIn` varchar(32),
  PRIMARY KEY  (`ContactId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


--  ======================================
--        GENERAL ADDRESS TABLE 
--  ====================================== 

CREATE TABLE  `AddressCountry` (
  `AddressCountryId` SMALLINT unsigned NOT NULL AUTO_INCREMENT,
  `Country` varchar(256) NOT NULL,
  `CountryCode` varchar(3) NOT NULL,
  PRIMARY KEY  (`AddressCountryId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `CountryState` (
  `CountryStateId` SMALLINT unsigned NOT NULL AUTO_INCREMENT,
  `State` varchar(256) NOT NULL,
  `AddressCountryId` SMALLINT unsigned NOT NULL ,
  PRIMARY KEY  (`CountryStateId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `CountryState` ADD CONSTRAINT FOREIGN KEY (`AddressCountryId`) REFERENCES `AddressCountry` (`AddressCountryId`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE  `AddressType` (
  `AddressTypeId` SMALLINT unsigned NOT NULL AUTO_INCREMENT,
  `Type` varchar(256) NOT NULL,
  PRIMARY KEY  (`AddressTypeId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `Address` (
  `AddressId` BIGINT unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(256),
  `Address` varchar(256) NOT NULL,
  `Address2` varchar(256),
  `City` varchar(128),
  `State` varchar(128),
  `PostCode` varchar(10),
  `AddressCountryId` SMALLINT unsigned,
  `AddressTypeId` SMALLINT unsigned,
  `Description` varchar(20),
  PRIMARY KEY  (`AddressId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `Address` ADD CONSTRAINT FOREIGN KEY (`AddressCountryId`) REFERENCES `AddressCountry` (`AddressCountryId`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `Address` ADD CONSTRAINT FOREIGN KEY (`AddressTypeId`) REFERENCES `AddressType` (`AddressTypeId`) ON DELETE SET NULL ON UPDATE CASCADE;


--  ====================================== 
--       PRODUCTS
--  ====================================== 
CREATE TABLE  `ProductType` (
  `ProductTypeId` smallint unsigned NOT NULL auto_increment,
  `Name` varchar(256) NOT NULL,
  `Enabled` tinyint(1) NOT NULL,
  `Code` varchar(2) NOT NULL,
  `Description` text,
  PRIMARY KEY  (`ProductTypeId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ProductColour` (
  `ColourId` smallint unsigned NOT NULL auto_increment,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY  (`ColourId`)
) ENGINE=InnoDB CHARSET=utf8;

CREATE TABLE `ProductSizeGroup` (
  `SizeGroupId` smallint unsigned NOT NULL auto_increment,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY  (`SizeGroupId`)
) ENGINE=InnoDB CHARSET=utf8;

CREATE TABLE `ProductSize` (
  `SizeId` smallint unsigned NOT NULL auto_increment,
  `Name` varchar(255) NOT NULL,
  `SizeGroupId` smallint unsigned,
  `ViewOrder` mediumint default '9999',
  PRIMARY KEY  (`SizeId`)
) ENGINE=InnoDB CHARSET=utf8;

ALTER TABLE `ProductSize` ADD CONSTRAINT FOREIGN KEY (`SizeGroupId`) REFERENCES `ProductSizeGroup` (`SizeGroupId`) ON DELETE SET NULL ON UPDATE CASCADE;

CREATE TABLE `ProductRange` (
  `RangeId` smallint unsigned NOT NULL auto_increment,
  `Name` varchar(255) default NULL,
  `Description` text,
  PRIMARY KEY  (`RangeId`)
) ENGINE=InnoDB CHARSET=utf8;


CREATE TABLE `Category` (
  `CategoryId` smallint UNSIGNED NOT NULL auto_increment,
  `Enabled` tinyint(1),
  `WholesaleEnabled` tinyint(1),
  `Name` varchar(255) UNIQUE NOT NULL,
  `ShortUrl` varchar(255) UNIQUE NOT NULL,
  `TopPromoHtml` text,
  `BottomPromoHtml` text,  
  `ViewOrder` SmallInt default NULL,
  PRIMARY KEY  (`CategoryId`)
) ENGINE=InnoDB CHARSET=utf8;

CREATE TABLE `SubCategory` (
  `SubCategoryId` smallint UNSIGNED NOT NULL auto_increment,
  `Enabled` tinyint(1),
  `WholesaleEnabled` tinyint(1),
  `Name` varchar(255) UNIQUE NOT NULL,
  `ShortUrl` varchar(255) UNIQUE NOT NULL,
  `CategoryId` smallint UNSIGNED,
  `TopPromoHtml` text,
  `BottomPromoHtml` text,
  `ViewOrder` smallint default NULL,
  PRIMARY KEY  (`SubCategoryId`)
) ENGINE=InnoDB CHARSET=utf8;
ALTER TABLE `SubCategory` ADD CONSTRAINT FOREIGN KEY (`CategoryId`) REFERENCES `Category` (`CategoryId`) ON DELETE SET NULL ON UPDATE CASCADE;


CREATE TABLE `QuantityTemplate` (
  `QuantityTemplateId` smallint unsigned NOT NULL auto_increment,  
  `Name` varchar(100),
  PRIMARY KEY  (`QuantityTemplateId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `QuantityElement` (
  `QuantityElementId` smallint unsigned NOT NULL auto_increment,  
  `Amount` smallint unsigned not null,
  `QuantityTemplateId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`QuantityElementId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `QuantityElement` ADD CONSTRAINT FOREIGN KEY (`QuantityTemplateId`) REFERENCES `QuantityTemplate` (`QuantityTemplateId`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE `PersonalisationConfig` (
  `PersonalisationConfigId` smallint unsigned NOT NULL auto_increment,  
  `Name` varchar(32),
  `FormHtml` varchar(32),
  PRIMARY KEY  (`PersonalisationConfigId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `PersonalisationField` (
  `PersonalisationFieldId` smallint unsigned NOT NULL auto_increment,  
  `Name` varchar(32),
  `FormFieldName` varchar(32), 
  `PersonalisationConfigId` smallint unsigned,
  PRIMARY KEY  (`PersonalisationFieldId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `PersonalisationField` ADD CONSTRAINT FOREIGN KEY (`PersonalisationConfigId`) 
	REFERENCES `PersonalisationConfig` (`PersonalisationConfigId`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE  `Product` (
  `ProductId` smallint unsigned NOT NULL auto_increment,
  `WebActive` tinyint(1),
  `WholesaleActive` tinyint(1),
  `Downloadable` tinyint(1) DEFAULT 0,
  `Name` varchar(256) NOT NULL,
  `ShortUrl` varchar(255) UNIQUE NOT NULL,
  `Description` text,
  `ProductTypeId` smallint unsigned,
  `RangeId` smallint unsigned,
  `SampleImage` varchar(255),
  `VectorImage` varchar(255),
  `FSCCertified` tinyint(1),
  `AllRecycled` tinyint(1),
  `AusMade` tinyint(1),
  `HandMade` tinyint(1),
  `LimitedEdition` tinyint(1),
  `Materials` text,
  `WholesaleOrderInfo` text,
  `QuantityTemplateId` smallint unsigned,
  `PersonaliseEnabled` tinyint(1) default 0,
  `PersonaliseInfo` text,
  `PersonalisationConfigId` smallint unsigned,  
  PRIMARY KEY  (`ProductId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `Product` ADD CONSTRAINT FOREIGN KEY (`ProductTypeId`) REFERENCES `ProductType` (`ProductTypeId`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `Product` ADD CONSTRAINT FOREIGN KEY (`RangeId`) REFERENCES `ProductRange` (`RangeId`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `Product` ADD CONSTRAINT FOREIGN KEY (`QuantityTemplateId`) REFERENCES `QuantityTemplate` (`QuantityTemplateId`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `Product` ADD CONSTRAINT FOREIGN KEY (`PersonalisationConfigId`) REFERENCES `PersonalisationConfig` (`PersonalisationConfigId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE  `ProductLink` (
  `ProductLinkId` smallint unsigned NOT NULL auto_increment,
  `ProductId1` smallint unsigned NOT NULL,
  `ProductId2` smallint unsigned NOT NULL,
  PRIMARY KEY  (`ProductLinkId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `ProductLink` ADD CONSTRAINT FOREIGN KEY (`ProductId1`) REFERENCES `Product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `ProductLink` ADD CONSTRAINT FOREIGN KEY (`ProductId2`) REFERENCES `Product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE  `ProductOption` (
  `ProductOptionId` smallint unsigned NOT NULL auto_increment,
  `ProductId` smallint unsigned not null,
  `WebActive` tinyint(1),
  `WholesaleActive` tinyint(1),  
  `SizeId` smallint unsigned not null,
  `ColourId` smallint unsigned not null,
  `WholesalePrice` decimal(10,2),
  `SaleWholesalePrice` decimal(10,2),
  `RRP` decimal(10,2),
  `RRPSalePrice` decimal(10,2),
  `Weight` mediumint unsigned,
  `Length` smallint unsigned,
  `Height` smallint unsigned,
  `QuantityInStock` smallint unsigned not null,
  `DownloadFile` mediumblob,
  `PrintArtwork` mediumblob,
  PRIMARY KEY  (`ProductOptionId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `ProductOption` ADD CONSTRAINT FOREIGN KEY (`ProductId`) REFERENCES `Product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `ProductOption` ADD CONSTRAINT FOREIGN KEY (`SizeId`) REFERENCES `ProductSize` (`SizeId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `ProductOption` ADD CONSTRAINT FOREIGN KEY (`ColourId`) REFERENCES `ProductColour` (`ColourId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE  `ProductWebImage` (
  `ProductWebImageId` smallint unsigned NOT NULL auto_increment,
  `ProductId` smallint unsigned not null,
  `Title` varchar(100),
  `WebsiteActive` tinyint(1),
  `WholesaleActive` tinyint(1),
  `Thumbnail` varchar(255),
  `SmallImage` varchar(255),
  `ProductImage` varchar(255),
  `HighresImage` varchar(255),
  `ViewOrder` mediumint default '9999',
  PRIMARY KEY  (`ProductWebImageId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `ProductWebImage` ADD CONSTRAINT FOREIGN KEY (`ProductId`) REFERENCES `Product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE  `CatalogueImage` (
  `ProductWebImageId` smallint unsigned NOT NULL auto_increment,
  `ProductId` smallint unsigned not null,
  `HighResFile` varchar(255),
  `LowResFile` varchar(255),
  `Thumbnail` varchar(255),
  `ViewOrder` mediumint default '9999',
  PRIMARY KEY  (`ProductWebImageId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `CatalogueImage` ADD CONSTRAINT FOREIGN KEY (`ProductId`) REFERENCES `Product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE  `PersonalisedImage` (
  `PersonalisedImageId` smallint unsigned NOT NULL auto_increment,
  `ProductId` smallint unsigned not null,
  `Title` varchar(100),
  `WebsiteActive` tinyint(1),
  `WholesaleActive` tinyint(1),
  `Thumbnail` varchar(255),
  `SmallImage` varchar(255),
  `ProductImage` varchar(255),
  `HighresImage` varchar(255),
  `ViewOrder` mediumint default '9999',
  PRIMARY KEY  (`PersonalisedImageId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `PersonalisedImage` ADD CONSTRAINT FOREIGN KEY (`ProductId`) REFERENCES `Product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE `ProductSubCategory` (
  `ProductSubCategoryId` smallint unsigned NOT NULL auto_increment,
  `ProductId` smallint unsigned NOT NULL,
  `SubCategoryId` smallint unsigned NOT NULL,
  `ViewOrder` mediumint default '9999',
  PRIMARY KEY  (`ProductSubCategoryId`)
) ENGINE=InnoDB CHARSET=utf8;


ALTER TABLE `ProductSubCategory` ADD CONSTRAINT FOREIGN KEY (`SubCategoryId`) REFERENCES `SubCategory` (`SubCategoryId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `ProductSubCategory` ADD CONSTRAINT FOREIGN KEY (`ProductId`) REFERENCES `Product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE  `CostType` (
  `RDCostTypeId` smallint unsigned NOT NULL auto_increment,
  `Name` varchar(256) NOT NULL,
  `Description` text,
  PRIMARY KEY  (`RDCostTypeId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ProductRDCost` (
  `ProductRDCostId` smallint unsigned NOT NULL auto_increment,  
  `Description` text,
  `RDCostTypeId` smallint unsigned,
  `ProductId` smallint unsigned,
  `Amount` decimal,
  `HoursSpent` smallint unsigned,
  `Start` date,
  `End` date,
  PRIMARY KEY  (`ProductRDCostId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `ProductRDCost` ADD CONSTRAINT FOREIGN KEY (`RDCostTypeId`) REFERENCES `CostType` (`RDCostTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `ProductRDCost` ADD CONSTRAINT FOREIGN KEY (`ProductId`) REFERENCES `Product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE `ProductionRun` (
  `ProductRunId` smallint unsigned NOT NULL auto_increment,  
  `Quantity` bigint,
  `Name` varchar(255) NOT NULL,
  `Description` text,
  `ProductionDate` date,
  `ProductOptionId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`ProductRunId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `ProductionRun` ADD CONSTRAINT FOREIGN KEY (`ProductOptionId`) REFERENCES `ProductOption` (`ProductOptionId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE `ProductionRunCost` (
  `ProductionRunCostId` smallint unsigned NOT NULL auto_increment,  
  `Description` text,
  `CostTypeId` smallint unsigned,
  `ProductRunId` smallint unsigned,
  `Amount` decimal(10,2),
  `Attachment` varchar(255),
  `HoursSpent` smallint unsigned,
  `Start` date,
  `End` date,
  PRIMARY KEY  (`ProductionRunCostId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `ProductionRunCost` ADD CONSTRAINT FOREIGN KEY (`CostTypeId`) REFERENCES `CostType` (`RDCostTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `ProductionRunCost` ADD CONSTRAINT FOREIGN KEY (`ProductRunId`) REFERENCES `ProductionRun` (`ProductRunId`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE `Stockist` (
  `StockistId` smallint unsigned NOT NULL auto_increment,
  `Enabled` tinyint(1),
  `OnlineOnly` tinyint(1),
  `Name` varchar(255) NOT NULL,
  `Url` varchar(255) NOT NULL,
  PRIMARY KEY  (`StockistId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `StockistAddress` (
  `StockistAddressId` BIGINT unsigned NOT NULL AUTO_INCREMENT,
  `LimitedStock` tinyint(1),
  `Address` varchar(256) NOT NULL,
  `Address2` varchar(256),
  `City` varchar(128),
  `PostCode` varchar(10),
  `AddressCountryId` SMALLINT unsigned,
  `CountryStateId` SMALLINT unsigned,  
  `Phone` varchar(255),
  `StockistId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`StockistAddressId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `StockistAddress` ADD CONSTRAINT FOREIGN KEY (`AddressCountryId`) REFERENCES `AddressCountry` (`AddressCountryId`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `StockistAddress` ADD CONSTRAINT FOREIGN KEY (`CountryStateId`) REFERENCES `CountryState` (`CountryStateId`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `StockistAddress` ADD CONSTRAINT FOREIGN KEY (`StockistId`) REFERENCES `Stockist` (`StockistId`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE `PdfCatalogue` (
  `PdfCatalogueId` smallint unsigned NOT NULL auto_increment,
  `Enabled` tinyint(1),
  `Name` varchar(255) NOT NULL,
  `PdfFile` varchar(255),
  PRIMARY KEY  (`PdfCatalogueId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  ====================================== 
--        MARKETS
--  ====================================== 
CREATE TABLE  `Market` (
  `MarketId` smallint unsigned NOT NULL auto_increment,
  `Name` varchar(256) NOT NULL,
    `Website` varchar(256),
    `Blog` varchar(256),
  `Description` text,
  `Costs` text,
  `SubmissionDetails` text,
  PRIMARY KEY  (`MarketId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `MarketDate` (
  `MarketDateId` smallint unsigned NOT NULL auto_increment,
  `MarketId` smallint unsigned NOT NULL,
  `Date` date,
  PRIMARY KEY  (`MarketDateId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `MarketDate` ADD CONSTRAINT FOREIGN KEY (`MarketId`) REFERENCES `Market` (`MarketId`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE  `MarketAddress` (
  `MarketAddressId` smallint unsigned NOT NULL auto_increment,
  `AddressId` BIGINT unsigned NOT NULL,
  `MarketId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`MarketAddressId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `MarketAddress` ADD CONSTRAINT FOREIGN KEY (`MarketId`) REFERENCES `Market` (`MarketId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `MarketAddress` ADD CONSTRAINT FOREIGN KEY (`AddressId`) REFERENCES `Address` (`AddressId`) ON DELETE CASCADE ON UPDATE CASCADE;

--  ====================================== 
--        TRADE SHOWS
--  ====================================== 
CREATE TABLE  `TradeShow` (
  `TradeShowId` mediumint(8) NOT NULL auto_increment,
  `Name` varchar(255) NOT NULL,
  `Website` varchar(255),
    `ExhibitCost` DECIMAL(20,2),
  `AttendanceCost` DECIMAL(20,2),
  `Details` longtext,
   PRIMARY KEY  (`TradeShowId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `TradeShowAddress` (
  `TradeShowAddressId` smallint unsigned NOT NULL auto_increment,
  `AddressId` BIGINT unsigned NOT NULL,
  `TradeShowId` mediumint NOT NULL,
  PRIMARY KEY  (`TradeShowAddressId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `TradeShowAddress` ADD CONSTRAINT FOREIGN KEY (`TradeShowId`) REFERENCES `TradeShow` (`TradeShowId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `TradeShowAddress` ADD CONSTRAINT FOREIGN KEY (`AddressId`) REFERENCES `Address` (`AddressId`) ON DELETE CASCADE ON UPDATE CASCADE;


--  ====================================== 
--       PROJECTS
--  ====================================== 
CREATE TABLE  `Project` (
  `ProjectId` mediumint(8) NOT NULL auto_increment,
  `Name` varchar(255) NOT NULL,
  `Description` longtext NOT NULL,
   PRIMARY KEY  (`ProjectId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `ProjectIdea` (
  `IdeaId` mediumint(8) NOT NULL auto_increment,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `ProjectId` mediumint(8),
  KEY `ProjectId` (`ProjectId`),
  PRIMARY KEY  (`IdeaId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `ProjectTask` (
  `TaskId` mediumint(8) NOT NULL auto_increment,
  `Enabled` tinyint(1) NOT NULL,
  `ProjectId` mediumint(8),
  `State` enum('Pending','In Progress','Completed'),
  `Priority` enum('Urgent','High','Medium','Low') default 'Medium',
  `Type` enum('Task','New Feature','Problem','Customer Request') NOT NULL,
  `Title` varchar(255) NOT NULL,
  `RequestedBy` varchar(255) NOT NULL,
  `ShortDescription` text NOT NULL,
  `DetailedDescription` longtext,
  `HoursToComplete` smallint, 
  `HoursSpent` smallint,
  KEY `ProjectId` (`ProjectId`),
  PRIMARY KEY  (`TaskId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `ProjectIdea` ADD CONSTRAINT FOREIGN KEY (`ProjectId`) REFERENCES `Project` (`ProjectId`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `ProjectTask` ADD CONSTRAINT FOREIGN KEY (`ProjectId`) REFERENCES `Project` (`ProjectId`) ON DELETE SET NULL ON UPDATE CASCADE;


--  ====================================== 
--        EXPENSES 
--  ====================================== 

CREATE TABLE  `Currency` (
  `CurrencyId` smallint NOT NULL auto_increment,
  `CurrencyName` varchar(255) NOT NULL,
  `CurrencyCode` varchar(255) NOT NULL,
  `CurrencySymbol` varchar(3),
   PRIMARY KEY  (`CurrencyId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `Expense` (
  `ExpenseId` BIGINT NOT NULL auto_increment,
  `Amount` DECIMAL(20,2),
  `ExpenseCategoryId` smallint,
  `DateofExpense` date, 
  `Description` text, 
  `ForeignCurrencyAmount` DECIMAL(20,2),  
  `ForiegnCurrencyId` smallint,
  `ExchangeRate` DECIMAL(10,6),
  `ExchangeRateNotes` text, 
  KEY `ForiegnCurrencyId` (`ForiegnCurrencyId`),
  KEY `ExpenseCategoryId` (`ExpenseCategoryId`),
  PRIMARY KEY  (`ExpenseId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `ExpenseSettings` (
  `ExpenseSettingsId` tinyint(1) NOT NULL auto_increment,
  `DefaultCurrency` smallint,
   KEY `DefaultCurrency` (`DefaultCurrency`),
   PRIMARY KEY  (`ExpenseSettingsId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `ExpenseCategory` (
  `ExpenseCategoryId` smallint NOT NULL auto_increment,
  `Name` varchar(100) NOT NULL,
  `Description` text,
  PRIMARY KEY  (`ExpenseCategoryId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `ExpenseSettings` ADD CONSTRAINT FOREIGN KEY (`DefaultCurrency`) REFERENCES `Currency` (`CurrencyId`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `Expense` ADD CONSTRAINT FOREIGN KEY (`ForiegnCurrencyId`) REFERENCES `Currency` (`CurrencyId`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `Expense` ADD CONSTRAINT FOREIGN KEY (`ExpenseCategoryId`) REFERENCES `ExpenseCategory` (`ExpenseCategoryId`) ON DELETE SET NULL ON UPDATE CASCADE;


--  ====================================== 
--        SUPPLIER 
--  ====================================== 
CREATE TABLE  `Supplier` (
  `SupplierId` smallint unsigned NOT NULL auto_increment,
  `Active` tinyint(1) NOT NULL, 
  `Name` varchar(256) NOT NULL,
    `Website` varchar(256),
    `Blog` varchar(256),
  `Description` text,
    `Contacted` tinyint(1) NOT NULL,
  PRIMARY KEY  (`SupplierId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `SupplierNote` (
  `SupplierNotesId` smallint unsigned NOT NULL auto_increment,
  `SupplierId` smallint unsigned NOT NULL,
  `Note` text,
  PRIMARY KEY  (`SupplierNotesId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `SupplierAddress` (
  `SupplierAddressId` smallint unsigned NOT NULL auto_increment,
  `AddressId` BIGINT unsigned NOT NULL,
  `SupplierId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`SupplierAddressId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `SupplierContact` (
  `SupplierContactId` BIGINT unsigned NOT NULL auto_increment,
  `ContactId` BIGINT unsigned NOT NULL,
  `SupplierId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`SupplierContactId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `SupplierNote` ADD CONSTRAINT FOREIGN KEY (`SupplierId`) REFERENCES `Supplier` (`SupplierId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `SupplierAddress` ADD CONSTRAINT FOREIGN KEY (`SupplierId`) REFERENCES `Supplier` (`SupplierId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `SupplierAddress` ADD CONSTRAINT FOREIGN KEY (`AddressId`) REFERENCES `Address` (`AddressId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `SupplierContact` ADD CONSTRAINT FOREIGN KEY (`SupplierId`) REFERENCES `Supplier` (`SupplierId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `SupplierContact` ADD CONSTRAINT FOREIGN KEY (`ContactId`) REFERENCES `Contact` (`ContactId`) ON DELETE CASCADE ON UPDATE CASCADE;



--  ====================================== 
--        DISTRIBUTOR 
--  ====================================== 
CREATE TABLE  `Distributor` (
  `DistributorId` smallint unsigned NOT NULL auto_increment,
  `Active` tinyint(1) NOT NULL, 
  `Contacted` tinyint(1) NOT NULL,
  `Type` enum('Wholesaler','Retailer - Both','Retailer - Shop','Retailer - Online'),
  `Name` varchar(256) NOT NULL,
  `Website` varchar(256),
  `Blog` varchar(256),
  `Description` text,
  `AddressCountryId` SMALLINT unsigned,
  `CountryStateId` SMALLINT unsigned,
  `Town` varchar(64),  
  PRIMARY KEY  (`DistributorId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `Distributor` ADD CONSTRAINT FOREIGN KEY (`AddressCountryId`) REFERENCES `AddressCountry` (`AddressCountryId`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `Distributor` ADD CONSTRAINT FOREIGN KEY (`CountryStateId`) REFERENCES `CountryState` (`CountryStateId`) ON DELETE SET NULL ON UPDATE CASCADE;


CREATE TABLE  `DistributorNote` (
  `DistributorNoteId` smallint unsigned NOT NULL auto_increment,
  `DistributorId` smallint unsigned NOT NULL,
  `Note` text,
  PRIMARY KEY  (`DistributorNoteId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `DistributorContact` (
  `DistributorContactId` BIGINT unsigned NOT NULL auto_increment,
  `ContactId` BIGINT unsigned NOT NULL,
  `DistributorId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`DistributorContactId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `DistributorAddress` (
  `DistributorAddressId` smallint unsigned NOT NULL auto_increment,
  `AddressId` BIGINT unsigned NOT NULL,
  `DistributorId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`DistributorAddressId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `DistributorNote` ADD CONSTRAINT FOREIGN KEY (`DistributorId`) REFERENCES `Distributor` (`DistributorId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `DistributorContact` ADD CONSTRAINT FOREIGN KEY (`DistributorId`) REFERENCES `Distributor` (`DistributorId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `DistributorContact` ADD CONSTRAINT FOREIGN KEY (`ContactId`) REFERENCES `Contact` (`ContactId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `DistributorAddress` ADD CONSTRAINT FOREIGN KEY (`DistributorId`) REFERENCES `Distributor` (`DistributorId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `DistributorAddress` ADD CONSTRAINT FOREIGN KEY (`AddressId`) REFERENCES `Address` (`AddressId`) ON DELETE CASCADE ON UPDATE CASCADE;

--  ====================================== 
--        JK Events 
--  ======================================

--  ====================================== 
--        JK Tasks + Milestones 
--  ======================================
CREATE TABLE  `Milestone` (
  `MilestoneId` SMALLINT unsigned NOT NULL auto_increment,
  `Title` varchar(256) NOT NULL,
  `Description` text,
  `Start` DATE,
  `Due` DATE,
  `Created` TIMESTAMP,
  PRIMARY KEY  (`MilestoneId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE  `Task` (
  `TaskId` SMALLINT unsigned NOT NULL auto_increment,
  `Complete` tinyint(1) NOT NULL,
  `Title` varchar(256) NOT NULL,
  `Description` text,
  `Start` DATE,
  `Due` DATE,
  `AssignedTo` BIGINT,
  `Priority` TINYINT,
  `Created` TIMESTAMP,
  `MilestoneId` SMALLINT unsigned,
  PRIMARY KEY  (`TaskId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `Task` ADD CONSTRAINT FOREIGN KEY (`MilestoneId`) REFERENCES `Milestone` (`MilestoneId`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `Task` ADD CONSTRAINT FOREIGN KEY (`AssignedTo`) REFERENCES `JackUser` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--  ====================================== 
--        JK PR 
--  ======================================
CREATE TABLE  `PromotionalLead` (
  `PromotionalLeadId` smallint unsigned NOT NULL auto_increment,
  `Active` tinyint(1) NOT NULL, 
  `Name` varchar(256) NOT NULL,
  `Website` varchar(256),
  `Blog` varchar(256),
  `SubmissionRules` varchar(256),
  `Description` text,
  `Rating` TINYINT,
  `AddressCountryId` SMALLINT unsigned,
  `CountryStateId` SMALLINT unsigned,
  `Town` varchar(64),
  PRIMARY KEY  (`PromotionalLeadId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `PromotionalLead` ADD CONSTRAINT FOREIGN KEY (`AddressCountryId`) REFERENCES `AddressCountry` (`AddressCountryId`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `PromotionalLead` ADD CONSTRAINT FOREIGN KEY (`CountryStateId`) REFERENCES `CountryState` (`CountryStateId`) ON DELETE SET NULL ON UPDATE CASCADE;

CREATE TABLE  `PromotionalCategory` (
  `PromotionalCategoryId` smallint unsigned NOT NULL auto_increment,
  `Name` varchar(256) NOT NULL,
  PRIMARY KEY  (`PromotionalCategoryId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `PromotionalLeadCategory` (
  `PromotionalLeadCategoryId` BIGINT unsigned NOT NULL auto_increment,
  `PromotionalCategoryId` smallint unsigned NOT NULL,
  `PromotionalLeadId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`PromotionalLeadCategoryId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `PromotionalLeadNote` (
  `PromotionalLeadNotesId` smallint unsigned NOT NULL auto_increment,
  `PromotionalLeadId` smallint unsigned NOT NULL,
  `Note` text,
  PRIMARY KEY  (`PromotionalLeadNotesId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE  `PromotionalLeadContact` (
  `PromoLeadContactId` BIGINT unsigned NOT NULL auto_increment,
  `ContactId` BIGINT unsigned NOT NULL,
  `PromotionalLeadId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`PromoLeadContactId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE  `PromotionalLeadAddress` (
  `PromotionalLeadAddressId` smallint unsigned NOT NULL auto_increment,
  `AddressId` BIGINT unsigned NOT NULL,
  `PromotionalLeadId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`PromotionalLeadAddressId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `PromotionalLeadAddress` ADD CONSTRAINT FOREIGN KEY (`PromotionalLeadId`) REFERENCES `PromotionalLead` (`PromotionalLeadId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `PromotionalLeadAddress` ADD CONSTRAINT FOREIGN KEY (`AddressId`) REFERENCES `Address` (`AddressId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `PromotionalLeadNote` ADD CONSTRAINT FOREIGN KEY (`PromotionalLeadId`) REFERENCES `PromotionalLead` (`PromotionalLeadId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `PromotionalLeadContact` ADD CONSTRAINT FOREIGN KEY (`ContactId`) REFERENCES `Contact` (`ContactId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `PromotionalLeadContact` ADD CONSTRAINT FOREIGN KEY (`PromotionalLeadId`) REFERENCES `PromotionalLead` (`PromotionalLeadId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `PromotionalLeadCategory` ADD CONSTRAINT FOREIGN KEY (`PromotionalCategoryId`) REFERENCES `PromotionalCategory` (`PromotionalCategoryId`);
ALTER TABLE `PromotionalLeadCategory` ADD CONSTRAINT FOREIGN KEY (`PromotionalLeadId`) REFERENCES `PromotionalLead` (`PromotionalLeadId`);

CREATE TABLE  `Blog` (
  `BlogId` SMALLINT unsigned NOT NULL auto_increment,
  `Name` varchar(256) NOT NULL,
  `Url` varchar(256) NOT NULL,
  `Rating` smallint,
  PRIMARY KEY  (`BlogId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


--  ====================================== 
--        WHOLESALE 
--  ====================================== 
CREATE TABLE  `WholesalerType` (
  `WholesalerTypeId` smallint unsigned NOT NULL auto_increment,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY  (`WholesalerTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE  `Wholesaler` (
  `WholesalerId` smallint unsigned NOT NULL auto_increment,
  `Enabled` tinyint(1) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `WholesalerTypeId` smallint unsigned NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ContactName` varchar(255) NOT NULL,
  `ContactEmail` varchar(255) NOT NULL,
  `Website` varchar(255),
  `Blog` varchar(255),
  `Logo` varchar(255),
  `Rating` smallint,
  `NewsletterSubscription` tinyint(1) NOT NULL,
  PRIMARY KEY  (`WholesalerId`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `Wholesaler` ADD CONSTRAINT FOREIGN KEY (`WholesalerTypeId`) 
REFERENCES `WholesalerType` (`WholesalerTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE  `WholesalerAccount` (
  `WholesalerAccountId` smallint unsigned NOT NULL auto_increment,
  `Enabled` tinyint(1) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `WholesalerId` smallint unsigned NOT NULL,
  `AccountLimit` decimal(10,2) NOT NULL,
  PRIMARY KEY  (`WholesalerAccountId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `WholesalerAccount` ADD CONSTRAINT FOREIGN KEY (`WholesalerId`) 
REFERENCES `Wholesaler` (`WholesalerId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE  `WholesalerNote` (
  `WholesalerNoteId` smallint unsigned NOT NULL auto_increment,
  `Note` text,
  `WholesalerId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`WholesalerNoteId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `WholesalerNote` ADD CONSTRAINT FOREIGN KEY (`WholesalerId`) 
REFERENCES `Wholesaler` (`WholesalerId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE  `WholesalerLoginHistory` (
  `WholesalerLoginHistoryId` smallint unsigned NOT NULL auto_increment,
  `WholesalerId` smallint unsigned NOT NULL,
  `LoginDate` TIMESTAMP,
  `IP` varchar(100),
  `Browser` varchar(255),
  PRIMARY KEY  (`WholesalerLoginHistoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `WholesalerLoginHistory` ADD CONSTRAINT FOREIGN KEY (`WholesalerId`) 
REFERENCES `Wholesaler` (`WholesalerId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE  `WholesalerAddress` (
  `WholesalerAddressId` mediumint unsigned NOT NULL auto_increment,
  `AddressId` BIGINT unsigned NOT NULL,
  `WholesalerId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`WholesalerAddressId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `WholesalerAddress` ADD CONSTRAINT FOREIGN KEY (`WholesalerId`) REFERENCES `Wholesaler` (`WholesalerId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `WholesalerAddress` ADD CONSTRAINT FOREIGN KEY (`AddressId`) REFERENCES `Address` (`AddressId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE  `WholesalerContact` (
  `WholesalerContactId` mediumint unsigned NOT NULL auto_increment,
  `ContactId` BIGINT unsigned NOT NULL,
  `WholesalerId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`WholesalerContactId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `WholesalerContact` ADD CONSTRAINT FOREIGN KEY (`WholesalerId`) REFERENCES `Wholesaler` (`WholesalerId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `WholesalerContact` ADD CONSTRAINT FOREIGN KEY (`ContactId`) REFERENCES `Contact` (`ContactId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE  `WholesalerOrder` (
  `WholesalerOrderId` mediumint unsigned NOT NULL auto_increment,
  `WholesalerId` smallint unsigned NOT NULL,
  `State` enum('Ordered','Confirmed - Awaiting Payment','In Progress','Delayed','Filled','Dispatched','Cancelled'),
  `BillingName` varchar(256) NOT NULL,
  `BillingAddress` varchar(256) NOT NULL,
  `BillingAddress2` varchar(256),
  `BillingCity` varchar(128),
  `BillingState` varchar(128),
  `BillingPostCode` varchar(10),
  `BillingCountry` varchar(128),
  `DeliveryAddress` varchar(256) NOT NULL,
  `DeliveryAddress2` varchar(256),
  `DeliveryCity` varchar(128),
  `DeliveryState` varchar(128),
  `DeliveryPostCode` varchar(10),
  `DeliveryCountry` varchar(128),
  `DeliveryInstructions` varchar(255),
  `DeliveryOption` varchar(255) NOT NULL,
  `DeliveryPrice` decimal(19,2) default NULL,
  `PrivateOrderNotes` text,
  `InvoiceOrderNotes` text,
  `WebOrder` tinyint(1) NOT NULL DEFAULT 0,
  `DispatchDate` DATE,
  `OrderTime` TIMESTAMP,
  PRIMARY KEY  (`WholesalerOrderId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `WholesalerOrder` ADD CONSTRAINT FOREIGN KEY (`WholesalerId`) REFERENCES `Wholesaler` (`WholesalerId`) ON DELETE CASCADE ON UPDATE CASCADE;





CREATE TABLE  `WholesalerOrderNote` (
  `WholesalerOrderNoteId` bigint unsigned NOT NULL auto_increment,
  `WholesalerOrderId` mediumint unsigned NOT NULL,
  `OrderState` enum('Ordered','Confirmed','In Progress','Delayed','Shipped','Cancelled'),
  `Notes` text,
  `ProcessedBy` varchar(64) NOT NULL,
  PRIMARY KEY  (`WholesalerOrderNoteId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `WholesalerOrderNote` ADD CONSTRAINT FOREIGN KEY (`WholesalerOrderId`) REFERENCES `WholesalerOrder` (`WholesalerOrderId`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE  `WholesalerOrderPayment` (
  `WholesalerOrderPaymentId` bigint unsigned NOT NULL auto_increment,
  `WholesalerOrderId` mediumint unsigned NOT NULL,
  `Type` enum('Cash', 'Cheque', 'Visa', 'Direct Deposit'),
  `Amount` decimal(19,2) default 0,
  `PayemntRef` varchar(64),
  `PaymentDate` Date,
  PRIMARY KEY  (`WholesalerOrderPaymentId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `WholesalerOrderPayment` ADD CONSTRAINT FOREIGN KEY (`WholesalerOrderId`) REFERENCES `WholesalerOrder` (`WholesalerOrderId`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE  `WholesalerOrderItem` (
  `WholesalerOrderItemId` bigint unsigned NOT NULL auto_increment,
  `WholesalerOrderId` mediumint unsigned NOT NULL,
  `ProductOptionId` smallint unsigned,
  `Code` varchar(64) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Size` varchar(256) NOT NULL,
  `Colour` varchar(256) NOT NULL,
  `Price` decimal(19,2) default NULL,
  `SalePrice` decimal(19,2) default NULL,
  `Quantity` smallint NOT NULL,
  `Notes` text,
  PRIMARY KEY  (`WholesalerOrderItemId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `WholesalerOrderItem` ADD CONSTRAINT FOREIGN KEY (`WholesalerOrderId`) REFERENCES `WholesalerOrder` (`WholesalerOrderId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `WholesalerOrderItem` ADD CONSTRAINT FOREIGN KEY (`ProductOptionId`) REFERENCES `ProductOption` (`ProductOptionId`) ON DELETE SET NULL ON UPDATE CASCADE;

--  ====================================== 
--        CUSTOMER 
--  ======================================

CREATE TABLE  `Customer` (
  `CustomerId` mediumint unsigned NOT NULL auto_increment,
  `NewsletterOnly` tinyint(1) NOT NULL DEFAULT 0,
  `EmailSubscription` tinyint(1) NOT NULL,
  `SubscriptionConfirmationCode` varchar(255),
  `Enabled` tinyint(1) NOT NULL,
  `Salutation` varchar(10),
  `FirstName` varchar(255),
  `LastName` varchar(255),
  `Email` varchar(255) UNIQUE,	
  `Password` varchar(255) NOT NULL,
  `CreationTime` TIMESTAMP,
  `IP` varchar(50),
  `Browser` varchar(255),
  `SubscriptionLocation` varchar(255),
  PRIMARY KEY  (`CustomerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE  `CustomerAddress` (
  `CustomerAddressId` mediumint unsigned NOT NULL auto_increment,
  `AddressId` BIGINT unsigned NOT NULL,
  `CustomerId` mediumint unsigned NOT NULL,
  PRIMARY KEY  (`CustomerAddressId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `CustomerAddress` ADD CONSTRAINT FOREIGN KEY (`CustomerId`) REFERENCES `Customer` (`CustomerId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `CustomerAddress` ADD CONSTRAINT FOREIGN KEY (`AddressId`) REFERENCES `Address` (`AddressId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE  `CustomerLoginHistory` (
  `CustomerLoginHistoryId` bigint unsigned NOT NULL auto_increment,
  `CustomerId` mediumint unsigned NOT NULL,
  `CreationTime` TIMESTAMP,
  `IP` varchar(50),  
  PRIMARY KEY  (`CustomerLoginHistoryId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `CustomerLoginHistory` ADD CONSTRAINT FOREIGN KEY (`CustomerId`) REFERENCES `Customer` (`CustomerId`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE  `LoginAttempt` (
  `LoginAttemptId` bigint unsigned NOT NULL auto_increment,
  `Username` varchar(255),
  `CreationTime` TIMESTAMP,
  `IP` varchar(50),  
  PRIMARY KEY  (`LoginAttemptId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE  `SalesOrder` (
  `SalesOrderId` mediumint unsigned NOT NULL auto_increment,
  `State` enum('Ordered','Confirmed - Awaiting Payment','In Progress','Delayed','Filled','Dispatched','Cancelled'),
  `BillingName` varchar(256) NOT NULL,
  `BillingAddress` varchar(256) NOT NULL,
  `BillingAddress2` varchar(256),
  `BillingCity` varchar(128),
  `BillingState` varchar(128),
  `BillingPostCode` varchar(10),
  `BillingCountry` varchar(128),
  `DeliveryAddress` varchar(256) NOT NULL,
  `DeliveryAddress2` varchar(256),
  `DeliveryCity` varchar(128),
  `DeliveryState` varchar(128),
  `DeliveryPostCode` varchar(10),
  `DeliveryCountry` varchar(128),
  `DeliveryInstructions` varchar(255),
  `DeliveryOption` varchar(255) NOT NULL,
  `DeliveryPrice` decimal(19,2) default NULL,
  `DeliveryOptionRule` varchar(255),
  `DeliveryOptionInvoiceText` varchar(255),
  `DeliveryDiscountedPrice` decimal(19,2),
  `PrivateOrderNotes` text,
  `InvoiceOrderNotes` text,
  `WebOrder` tinyint(1) NOT NULL DEFAULT 0,
  `PaymentMethod` varchar(64),
  `DispatchDate` DATE,
	`CheckoutStart` DATETIME,
	`CheckoutFinish` DATETIME,
  `Ip` varchar(64),
  `Browser` varchar(128),
  `OrderTime` TIMESTAMP,
  PRIMARY KEY  (`SalesOrderId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE  `CustomerOrder` (
  `CustomerOrderId` mediumint unsigned NOT NULL auto_increment,
  `CustomerId` mediumint unsigned NOT NULL,
  `SalesOrderId` mediumint unsigned NOT NULL,
  PRIMARY KEY  (`CustomerOrderId`)
) ENGINE=InnoDB CHARSET=utf8;
ALTER TABLE `CustomerOrder` ADD CONSTRAINT FOREIGN KEY (`CustomerId`) REFERENCES `Customer` (`CustomerId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `CustomerOrder` ADD CONSTRAINT FOREIGN KEY (`SalesOrderId`) REFERENCES `SalesOrder` (`SalesOrderId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE  `OrderNote` (
  `OrderNoteId` bigint unsigned NOT NULL auto_increment,
  `SalesOrderId` mediumint unsigned NOT NULL,
  `OrderState` enum('Ordered','Confirmed','In Progress','Delayed','Shipped','Cancelled'),
  `Notes` text,
  `ProcessedBy` varchar(64) NOT NULL,
  PRIMARY KEY  (`OrderNoteId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `OrderNote` ADD CONSTRAINT FOREIGN KEY (`SalesOrderId`) REFERENCES `SalesOrder` (`SalesOrderId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE  `OrderPayment` (
  `OrderPaymentId` bigint unsigned NOT NULL auto_increment,
  `SalesOrderId` mediumint unsigned NOT NULL,
  `Type` enum('Cash', 'Cheque', 'CreditCard', 'Direct Deposit','PayPal'),
  `Amount` decimal(19,2) default 0,
  `PaymentRef` varchar(128),
  `PaymentDate` timestamp,
  PRIMARY KEY  (`OrderPaymentId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `OrderPayment` ADD CONSTRAINT FOREIGN KEY (`SalesOrderId`) REFERENCES `SalesOrder` (`SalesOrderId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE  `OrderItem` (
  `OrderItemId` bigint unsigned NOT NULL auto_increment,
  `SalesOrderId` mediumint unsigned NOT NULL,
  `ProductOptionId` smallint unsigned,
  `Code` varchar(64) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Size` varchar(256) NOT NULL,
  `Colour` varchar(256) NOT NULL,
  `Price` decimal(19,2) default NULL,
  `SalePrice` decimal(19,2) default NULL,
  `Quantity` smallint NOT NULL,
  `Notes` text,
  `PersonalisationData` text, 
  PRIMARY KEY  (`OrderItemId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `OrderItem` ADD CONSTRAINT FOREIGN KEY (`SalesOrderId`) REFERENCES `SalesOrder` (`SalesOrderId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `OrderItem` ADD CONSTRAINT FOREIGN KEY (`ProductOptionId`) REFERENCES `ProductOption` (`ProductOptionId`) ON DELETE SET NULL ON UPDATE CASCADE;


--  ====================================== 
--        GUEST ORDER 
--  ======================================
CREATE TABLE  `GuestOrder` (
  `GuestOrderId` mediumint unsigned NOT NULL auto_increment,
  `SalesOrderId` mediumint unsigned NOT NULL,
  `Email` varchar(512),
  `PayPalPayerId` varchar(512),
  `PayPalPayerStatus` varchar(20),
  `PayPalPhone` varchar(30),
  PRIMARY KEY  (`GuestOrderId`)
) ENGINE=InnoDB CHARSET=utf8;
ALTER TABLE `GuestOrder` ADD CONSTRAINT FOREIGN KEY (`SalesOrderId`) REFERENCES `SalesOrder` (`SalesOrderId`) ON DELETE CASCADE ON UPDATE CASCADE;


--  ====================================== 
--        DELIVERY OPTION 
--  ======================================
CREATE TABLE `DeliveryOption` (
  `DeliveryOptionId` smallint unsigned NOT NULL auto_increment,
  `Enabled` tinyint(1) default NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `BasePrice` decimal(19,2) default NULL,
  `PricePer100Grams` decimal(19,2) default NULL,
  PRIMARY KEY  (`DeliveryOptionId`)
) ENGINE=InnoDB CHARSET=utf8;

CREATE TABLE `DeliveryOptionCountry` (
  `DeliveryOptionCountryId` smallint unsigned NOT NULL auto_increment,
  `DeliveryOptionId` smallint unsigned NOT NULL,
  `AddressCountryId` SMALLINT unsigned NOT NULL,
  PRIMARY KEY  (`DeliveryOptionCountryId`)
) ENGINE=InnoDB CHARSET=utf8;
ALTER TABLE `DeliveryOptionCountry` ADD CONSTRAINT FOREIGN KEY (`DeliveryOptionId`) REFERENCES `DeliveryOption` (`DeliveryOptionId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `DeliveryOptionCountry` ADD CONSTRAINT FOREIGN KEY (`AddressCountryId`) REFERENCES `AddressCountry` (`AddressCountryId`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE TABLE `RetailDeliveryOption` (
  `RetailDeliveryOptionId` smallint unsigned NOT NULL auto_increment,
  `Enabled` tinyint(1) default NULL,
  `WholesaleActive` tinyint(1) default NULL,
  `RetailActive` tinyint(1) default NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `BasePrice` decimal(19,2) default NULL,
  `PricePer100Grams` decimal(19,2) default NULL,
  PRIMARY KEY  (`RetailDeliveryOptionId`)
) ENGINE=InnoDB CHARSET=utf8;

CREATE TABLE `RetailDeliveryOptionCountry` (
  `RetailDeliveryOptionCountryId` smallint unsigned NOT NULL auto_increment,
  `RetailDeliveryOptionId` smallint unsigned NOT NULL,
  `AddressCountryId` SMALLINT unsigned NOT NULL,
  PRIMARY KEY  (`RetailDeliveryOptionCountryId`)
) ENGINE=InnoDB CHARSET=utf8;
ALTER TABLE `RetailDeliveryOptionCountry` ADD CONSTRAINT FOREIGN KEY (`RetailDeliveryOptionId`) REFERENCES `RetailDeliveryOption` (`RetailDeliveryOptionId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `RetailDeliveryOptionCountry` ADD CONSTRAINT FOREIGN KEY (`AddressCountryId`) REFERENCES `AddressCountry` (`AddressCountryId`) ON DELETE CASCADE ON UPDATE CASCADE;


--  ====================================== 
--        Configuration 
--  ======================================
CREATE TABLE `SiteConfiguration` (
  `ConfigurationId` smallint unsigned NOT NULL auto_increment,
  `Sitename` varchar(255) NOT NULL,
  `WholesaleSiteAddress` varchar(255) NOT NULL,
  `PublicSiteAddress` varchar(255) NOT NULL,
  `Logo` varchar(255),
  PRIMARY KEY  (`ConfigurationId`)
) ENGINE=InnoDB CHARSET=utf8;


CREATE TABLE `EmailSettings` (
  `EmailSettingsId` smallint unsigned NOT NULL auto_increment,
  `Email` varchar(255) NOT NULL,
  `EmailNoreply` varchar(255) NOT NULL,
  `FromName` varchar(255) NOT NULL,
  `EmailSignoff` text,
  `SettingsName` varchar(16) NOT NULL,
  `From` varchar(255) NOT NULL,
  `ReplyTo` varchar(255) NOT NULL,
  `SmtpServer` varchar(128),
  `SmtpUsername` varchar(128),
  `SmtpAuthReqd` tinyint(1),
  `SmtpPassword` varchar(128),
  `SmtpPort` int,
	`SendType` enum('PHP Mail', 'SMTP'),
  PRIMARY KEY  (`EmailSettingsId`)
) ENGINE=InnoDB CHARSET=utf8;


CREATE TABLE `IpBlacklist` (
  `IpBlacklistId` smallint unsigned NOT NULL auto_increment,
  `Ip` varchar(255) NOT NULL,
  `Expires` Date NOT NULL,
  PRIMARY KEY  (`IpBlacklistId`)
) ENGINE=InnoDB CHARSET=utf8;


--  ====================================== 
--        Templates & General Variables
--  ======================================
CREATE TABLE `EmailTemplate` (
  `TemplateId` smallint unsigned NOT NULL auto_increment,
  `Enabled` tinyint(1) default NULL,
  `Name` varchar(255) NOT NULL,
  `SubjectTemplate` varchar(512) NOT NULL,
  `HtmlTemplate` text,
  `TextTemplate` text,
  PRIMARY KEY  (`TemplateId`)
) ENGINE=InnoDB CHARSET=utf8;


CREATE TABLE `TemplateFile` (
  `TemplateFileId` smallint unsigned NOT NULL auto_increment,
  `Enabled` tinyint(1) default NULL,
  `Name` varchar(255) NOT NULL,
  `Filename` varchar(255),
  `TemplateId` smallint unsigned NOT NULL,
  PRIMARY KEY  (`TemplateFileId`)
) ENGINE=InnoDB CHARSET=utf8;
ALTER TABLE `TemplateFile` ADD CONSTRAINT FOREIGN KEY (`TemplateId`) REFERENCES `EmailTemplate` (`TemplateId`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE `Variable` (
  `VariableId` smallint unsigned NOT NULL auto_increment,
  `Enabled` tinyint(1) default NULL,
  `Name` varchar(32) NOT NULL,
  `Value` varchar(256) NOT NULL,
  `TemplateId` smallint unsigned,
  PRIMARY KEY  (`VariableId`)
) ENGINE=InnoDB CHARSET=utf8;
ALTER TABLE `Variable` ADD CONSTRAINT FOREIGN KEY (`TemplateId`) REFERENCES `EmailTemplate` (`TemplateId`) ON DELETE CASCADE ON UPDATE CASCADE;


--  ====================================== 
--        Shipping Rules
--  ======================================
CREATE TABLE `DeliveryRule` (
  `DeliveryRuleId` smallint unsigned NOT NULL auto_increment,
  `Enabled` tinyint(1) default NULL,
	`Name` varchar(64) NOT NULL,
	`Description` text NOT NULL,
	`CustomerFeedbackText` text NOT NULL,
	`InvoiceText` varchar(256) NOT NULL,
	`TestCode` text NOT NULL,
	`ApplyCode` text NOT NULL,
	`ViewOrder` smallint,
  PRIMARY KEY  (`DeliveryRuleId`)
) ENGINE=InnoDB CHARSET=utf8;

CREATE TABLE `DeliveryRuleDeliveryOption` (
  `DeliveryRuleDeliveryOptionId` smallint unsigned NOT NULL auto_increment,
  `DeliveryRuleId` smallint unsigned NOT NULL,
	`RetailDeliveryOptionId` smallint unsigned NOT NULL,  
  PRIMARY KEY  (`DeliveryRuleDeliveryOptionId`)
) ENGINE=InnoDB CHARSET=utf8;
ALTER TABLE `DeliveryRuleDeliveryOption` ADD CONSTRAINT FOREIGN KEY (`DeliveryRuleId`) REFERENCES `DeliveryRule` (`DeliveryRuleId`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `DeliveryRuleDeliveryOption` ADD CONSTRAINT FOREIGN KEY (`RetailDeliveryOptionId`) REFERENCES `RetailDeliveryOption` (`RetailDeliveryOptionId`) ON DELETE CASCADE ON UPDATE CASCADE;


--  ====================================== 
--        PAYPAL
--  ======================================
CREATE TABLE `PaypalExpressConfig` (
  `PaypalExpressConfigId` smallint unsigned NOT NULL auto_increment,
  `Enabled` tinyint(1) default NULL,
	`Username` varchar(512) NOT NULL,
	`Password` varchar(512) NOT NULL,
	`Signature` varchar(512) NOT NULL,
	`GuestReturnUrl` varchar(1024) NOT NULL,
	`GuestCancelUrl` varchar(1024) NOT NULL,
	`CustomerReturnUrl` varchar(1024) NOT NULL,
	`CustomerCancelUrl` varchar(1024) NOT NULL,
  PRIMARY KEY  (`PaypalExpressConfigId`)
) ENGINE=InnoDB CHARSET=utf8;


CREATE TABLE `PaypalPaymentExecutionResult` (
  `PaypalPaymentExecutionResultId` mediumint unsigned NOT NULL auto_increment,
  `Ack` varchar(20),
  `TransactionId` varchar(256) ,
  `TransactionType` varchar(50) ,
  `PaymentType` varchar(10) ,
  `OrderTime` varchar(50) ,
  `Amt` varchar(20) ,
  `CurrencyCode` varchar(3) ,
  `FeeAmt` varchar(20) ,
  `SettleAmt` varchar(20) ,
  `TaxAmt` varchar(20) ,
  `ExchangeRate` varchar(20) ,
  `paymentStatus` varchar(20) ,
  `pendingReason` varchar(20) ,
  `reasonCode` varchar(20) ,
  `ErrorCode` varchar(20),
  `ErrorShortMsg` varchar(512) ,
  `ErrorLongMsg` varchar(512) ,
  `ErrorSeverityCode` varchar(20) ,
  `CreationTime` TIMESTAMP,
  PRIMARY KEY  (`PaypalPaymentExecutionResultId`)
) ENGINE=InnoDB CHARSET=utf8;
