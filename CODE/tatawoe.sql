-- إعادة كتابة ملف data for pro.sql مع إضافة تاريخ الانتهاء في جدول الفعالية

-- إنشاء قاعدة بيانات 'tatawoe'
CREATE DATABASE tatawoe;

-- استخدام قاعدة البيانات 'tatawoe'
USE tatawoe;

-- جدول المستخدمين
CREATE TABLE Users (
    UserID INT PRIMARY KEY,
    Username VARCHAR(255),
    Email VARCHAR(255),
    Password VARCHAR(255),
    CreatedAt TIMESTAMP,
    UpdatedAt TIMESTAMP
);

-- جدول المتطوعين
CREATE TABLE Volunteers (
    VolunteerID INT PRIMARY KEY,
    UserID INT,
    FullName VARCHAR(255),
    ContactEmail VARCHAR(255),
    Skills TEXT,
    ProfilePicture VARCHAR(255),
    ContactNumber VARCHAR(15),
    CreatedAt TIMESTAMP,
    UpdatedAt TIMESTAMP,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

-- جدول المنظمات
CREATE TABLE Organizations (
    OrganizationID INT PRIMARY KEY,
    VolunteerID INT,
    OrganizationName VARCHAR(255),
    Description TEXT,
    Field VARCHAR(255),
    OrganizationPicture VARCHAR(255),
    Location VARCHAR(255),
    ContactEmail VARCHAR(255),
    PhoneNumber VARCHAR(15),
    CreatedAt TIMESTAMP,
    UpdatedAt TIMESTAMP,
    FOREIGN KEY (VolunteerID) REFERENCES Volunteers(VolunteerID)
);

-- جدول الفعاليات مع إضافة تاريخ الانتهاء
CREATE TABLE Events (
    EventID INT PRIMARY KEY,
    OrganizationID INT,
    EventName VARCHAR(255),
    StartDate DATE,
    EndDate DATE, -- حقل جديد لتاريخ الانتهاء
    Location VARCHAR(255),
    RequiredSkills TEXT,
    Description TEXT,
    Image VARCHAR(255),
    CreatedAt TIMESTAMP,
    UpdatedAt TIMESTAMP,
    FOREIGN KEY (OrganizationID) REFERENCES Organizations(OrganizationID)
);

-- جدول الطلبات
CREATE TABLE Applications (
    ApplicationID INT PRIMARY KEY,
    EventID INT,
    VolunteerID INT,
    ApplicationStatus ENUM('Pending', 'Accepted', 'Rejected'),
    CreatedAt TIMESTAMP,
    UpdatedAt TIMESTAMP,
    FOREIGN KEY (EventID) REFERENCES Events(EventID),
    FOREIGN KEY (VolunteerID) REFERENCES Volunteers(VolunteerID)
);

-- جدول التقييمات والمراجعات
CREATE TABLE RatingsAndReviews (
    ReviewID INT PRIMARY KEY,
    EventID INT,
    VolunteerID INT,
    Rating INT CHECK (Rating BETWEEN 1 AND 5),
    ReviewText TEXT,
    CreatedAt TIMESTAMP,
    UpdatedAt TIMESTAMP,
    FOREIGN KEY (EventID) REFERENCES Events(EventID),
    FOREIGN KEY (VolunteerID) REFERENCES Volunteers(VolunteerID)
);

-- جدول الإشعارات
CREATE TABLE Notifications (
    NotificationID INT PRIMARY KEY,
    UserID INT,
    TargetType ENUM('Volunteer', 'Organization', 'Both'),
    TargetID INT,
    NotificationType ENUM('Request', 'EventUpdate', 'AccountUpdate', 'General'),
    Message TEXT,
    IsRead BOOLEAN,
    CreatedAt TIMESTAMP,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);
