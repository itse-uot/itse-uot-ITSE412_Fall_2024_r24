-- إنشاء قاعدة البيانات
CREATE DATABASE VolunteerPlatform;

-- استخدام قاعدة البيانات
USE VolunteerPlatform;

-- 1. جدول المستخدمين (Users)
CREATE TABLE Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(255) NOT NULL UNIQUE,
    Email VARCHAR(255) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 2. جدول المتطوعين (Volunteers)
CREATE TABLE Volunteers (
    VolunteerID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    FullName VARCHAR(255) NOT NULL,
    ContactEmail VARCHAR(255),
    Skills TEXT,
    ProfilePicture VARCHAR(255),
    ContactNumber VARCHAR(15),
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE CASCADE
);

-- 3. جدول المنظمات (Organizations)
CREATE TABLE Organizations (
    OrganizationID INT AUTO_INCREMENT PRIMARY KEY,
    VolunteerID INT NOT NULL,
    OrganizationName VARCHAR(255) NOT NULL,
    Description TEXT,
    Field VARCHAR(255),
    OrganizationPicture VARCHAR(255),
    Location VARCHAR(255),
    ContactEmail VARCHAR(255),
    PhoneNumber VARCHAR(15),
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (VolunteerID) REFERENCES Volunteers(VolunteerID) ON DELETE CASCADE
);

-- 4. جدول الفعاليات (Events)
CREATE TABLE Events (
    EventID INT AUTO_INCREMENT PRIMARY KEY,
    OrganizationID INT NOT NULL,
    EventName VARCHAR(255) NOT NULL,
    EventDate DATE NOT NULL,
    Location VARCHAR(255),
    RequiredSkills TEXT,
    Description TEXT,
    Image VARCHAR(255),
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (OrganizationID) REFERENCES Organizations(OrganizationID) ON DELETE CASCADE
);

-- 5. جدول الطلبات (Applications)
CREATE TABLE Applications (
    ApplicationID INT AUTO_INCREMENT PRIMARY KEY,
    EventID INT NOT NULL,
    VolunteerID INT NOT NULL,
    ApplicationStatus ENUM('Pending', 'Accepted', 'Rejected') DEFAULT 'Pending',
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (EventID) REFERENCES Events(EventID) ON DELETE CASCADE,
    FOREIGN KEY (VolunteerID) REFERENCES Volunteers(VolunteerID) ON DELETE CASCADE
);

-- 6. جدول التقييمات والمراجعات (Ratings & Reviews)
CREATE TABLE RatingsAndReviews (
    ReviewID INT AUTO_INCREMENT PRIMARY KEY,
    EventID INT NOT NULL,
    VolunteerID INT NOT NULL,
    Rating INT CHECK (Rating BETWEEN 1 AND 5),
    ReviewText TEXT,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (EventID) REFERENCES Events(EventID) ON DELETE CASCADE,
    FOREIGN KEY (VolunteerID) REFERENCES Volunteers(VolunteerID) ON DELETE CASCADE
);

-- 7. جدول الإشعارات (Notifications)
CREATE TABLE Notifications (
    NotificationID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    TargetType ENUM('Volunteer', 'Organization', 'Both') NOT NULL,
    TargetID INT,
    NotificationType ENUM('Request', 'EventUpdate', 'AccountUpdate', 'General') NOT NULL,
    Message TEXT NOT NULL,
    IsRead BOOLEAN DEFAULT FALSE,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE CASCADE
);
