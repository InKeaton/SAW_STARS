USE chiron-db;

CREATE TABLE USER (
  userID varchar(36) NOT NULL DEFAULT uuid()) PRIMARY KEY,
  role bit DEFAULT(0),
  email varchar(50) NOT NULL UNIQUE KEY,
  pwd varchar(60) NOT NULL,
  firstName varchar(50) NOT NULL,
  lastName varchar(50) NOT NULL,
  img varchar(150),
  createdDate datetime DEFAULT(CURDATE())
);

CREATE TABLE CONSTELLATION (
  consID varchar(36) NOT NULL DEFAULT uuid() PRIMARY KEY,
  consName varchar(36) NOT NULL UNIQUE KEY,
  startDate date NOT NULL DEFAULT current_timestamp(),
  endDate date NOT NULL DEFAULT current_timestamp(),
  description varchar(1000) NOT NULL,
  consImg varchar(30) NOT NULL
);

CREATE TABLE  STAR (
  starID varchar(36) NOT NULL DEFAULT uuid() PRIMARY KEY,
  consFK varchar(36) NOT NULL,
  starName varchar(50) NOT NULL UNIQUE KEY,
  dLY int(11) NOT NULL,
  price int(11) NOT NULL,
  FOREIGN KEY (consFK) 
    	REFERENCES CONSTELLATION(consID)
    	ON DELETE CASCADE 
    	ON UPDATE CASCADE
);

CREATE TABLE REVIEW (
    reviewID varchar(36) NOT NULL DEFAULT uuid() PRIMARY KEY,
    starFK 	varchar(36) NOT NULL,
    userFK  varchar(36) NOT NULL,
    vote    int(11) NOT NULL,
    note	varchar(1000) NOT NULL,
    revDate date NOT NULL DEFAULT current_timestamp(),
    FOREIGN KEY (starFK) 
    	REFERENCES STAR(starID)
    	ON DELETE CASCADE 
    	ON UPDATE CASCADE,
    FOREIGN KEY (userFK) 
      REFERENCES USER(userID)
    	ON DELETE CASCADE 
    	ON UPDATE CASCADE,
    UNIQUE KEY(starFK, userFK)
);

CREATE TABLE SUB (
	subID varchar(36) NOT NULL PRIMARY KEY DEFAULT uuid(),
  userFK 	varchar(36) NOT NULL,
  subName varchar(20) NOT NULL UNIQUE,
  startDate date DEFAULT CURRENT_TIMESTAMP,
  life int(10) NOT NULL,
  FOREIGN KEY (userFK) 
    REFERENCES USER(userID) 
    ON DELETE CASCADE 
    ON UPDATE CASCADE
);

CREATE TABLE SUBSTAR (
  substarID varchar(36) NOT NULL PRIMARY KEY DEFAULT uuid(),
  starFK varchar(36) NOT NULL,
  subFK varchar(36) NOT NULL,
  UNIQUE KEY(starFK, subFK),
  FOREIGN KEY (subFK) 
    REFERENCES SUB(subID) 
    ON DELETE CASCADE 
    ON UPDATE CASCADE,
  FOREIGN KEY(starFK)
    REFERENCES STAR(starID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

INSERT INTO USER (role, email, pwd, firstName, lastName, img) VALUES
(1, 'friday99@outlook.it', '1234', 'Arun', 'Mathiyalakan', 'https://ui-avatars.com/api/?name=Arun+Mathiyalakan&background=random'),
(0, 'francesco.matano@gmail.com', '1234', 'Francesco', 'Matano', 'https://ui-avatars.com/api/?name=Francesco+Matano&background=random');
