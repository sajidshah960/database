/* MOTHERS Table */
Create table Mother
	(
		MotherID		number(6),
		MCNIC	varchar2(20),
		MName	varchar2(20)	NOT NULL,
		Mphone	varchar2(20)	NOT NULL,
		Memail	varchar2(30),
		EntryDate date default sysdate,
		CONSTRAINT pk_Mother primary key (MotherID)
	);
/* Inserting values in MOTHERS Table */
Insert into Mother (MotherID,MCNIC,MName,Mphone,Memail)
Values ('171509','7150123274','Amna','+925192251','amnakhan@gmail.com');
Insert into Mother (MotherID,MCNIC,MName,Mphone,Memail)
Values ('171582','7150123474','Zulaika','+925192151','zulaikhamir@hotmail.com');
Insert into Mother (MotherID,MCNIC,MName,Mphone,Memail,EntryDate)
Values ('172217','7150123223','Emaan','+923458961','emaan@gmail.com',add_months(sysdate,-12));
Insert into Mother (MotherID,MCNIC,MName,Mphone,Memail)
Values ('151162','7150123234','Maham','+923179001','mahamk@hotmail.com');
Insert into Mother (MotherID,MCNIC,MName,Mphone,Memail)
Values ('191151','7150123232','Maham','+923175251','mahambutt@hotmail.com');
Insert into Mother (MotherID,MCNIC,MName,Mphone,Memail)
Values ('181215','7150133225','Halima','+925115291','halimak@gmail.com');
Insert into Mother (MotherID,MCNIC,MName,Mphone,Memail)
Values ('111566','7150123211','Marrium','+925422521','marriumj@gmail.com');
Insert into Mother (MotherID,MCNIC,MName,Mphone,Memail)
Values ('111521','7150123267','Izza','+923175281','izzaamir@yahoo.com');
Insert into Mother (MotherID,MCNIC,MName,Mphone,Memail,EntryDate)
Values ('227820','7150123299','Amen','+923121111','amenkhan@gmail.com',add_months(sysdate,-12));
Insert into Mother (MotherID,MCNIC,MName,Mphone,Memail,EntryDate)
Values ('178911','7123456782','Tahira','+928923231','tahira@gmail.com',add_months(sysdate,-12));
/* MOTHERS_HISTORY Table */
Create table Mother_History
	(
		MotherID		number(6),
		SrNo	int DEFAULT '1',
		MName	varchar2(20)	NOT NULL,
		Mphone	varchar2(20)	NOT NULL,
		Memail	varchar2(30),
		FOREIGN KEY (MotherID) REFERENCES Mother(MotherID)
	);	
/* Inserting values in MOTHERS_HISTORY Table */
Insert into Mother_History(MotherID,MName,Mphone,Memail)
Select MotherID,MName,Mphone,Memail
From Mother;

/* Applying Constraints to MOTHERS_HISTORY table */
ALTER TABLE Mother_History
ADD CONSTRAINT pk_Mother_History PRIMARY KEY (SrNo,MotherID);

/* Triggers for MOTHERS_HISTORY */
CREATE OR REPLACE TRIGGER trg_Mother_History
	Before insert on Mother_History
	referencing new as new old as old for each row
	declare
	begin
	select nvl(max(SrNo),0) + 1
	into :new.SrNo
	from Mother_History
	where MotherID = :new.MotherID;
	end;
/
CREATE TRIGGER Mother_History_insert_trigger
AFTER INSERT ON Mother
referencing new as new old as old FOR EACH ROW 
DECLARE
BEGIN
    insert into Mother_History(MotherID,MName,Mphone,Memail)
    values (:NEW.MotherID,:NEW.MName,:NEW.Mphone,:NEW.Memail);
END;
/
CREATE TRIGGER Mother_History_update_trigger
AFTER UPDATE ON Mother
referencing new as new old as old FOR EACH ROW 
DECLARE
BEGIN
    insert into Mother_History(MotherID,MName,Mphone,Memail)
    values (:NEW.MotherID,:NEW.MName,:NEW.Mphone,:NEW.Memail);
END;
/
CREATE TRIGGER M_History_delete_trigger
BEFORE DELETE ON Mother
referencing new as new old as old FOR EACH ROW 
DECLARE
BEGIN
    Delete from Mother_History
	where MotherID=:OLD.MotherID;
END;
/
/* Father Table */
Create table Father
	(
		FatherID		number(6),
		FCNIC	varchar2(20),
		FName	varchar2(20)	NOT NULL,
		FPhone	varchar2(20)	NOT NULL,
		Femail	varchar2(30),
		EntryDate date default sysdate,
		CONSTRAINT pk_Father primary key (FatherID)
	);
/* Inserting values in Father Table */
Insert into Father (FatherID,FCNIC,FName,FPhone,Femail,EntryDate)
Values ('221912','2321516775','Ghayur Ahmed','+923131522','ghayur@gmail.com',add_months(sysdate,-12));
Insert into Father (FatherID,FCNIC,FName,FPhone,Femail)
Values ('717172','2321516740','Dildar Khan','+923178212','dildar@yahoo.com');
Insert into Father (FatherID,FCNIC,FName,FPhone,Femail)
Values ('221221','2321516744','Iftakhar Niazi','+923001513','iftakhar@gmail.com');
Insert into Father (FatherID,FCNIC,FName,FPhone,Femail,EntryDate)
Values ('158912','2321516746','Ghulam Ali','+923142273','ghulam@hotmail.com',add_months(sysdate,-12));
Insert into Father (FatherID,FCNIC,FName,FPhone,Femail,EntryDate)
Values ('211152','2321516748','Ejaz Khan','+923157973','ejaz@yahoo.com',add_months(sysdate,-12));
Insert into Father (FatherID,FCNIC,FName,FPhone,Femail)
Values ('722152','2321516750','Mohsin Abbasi','+923925214','mohsin@gmail.com');
Insert into Father (FatherID,FCNIC,FName,FPhone,Femail)
Values ('889988','2321516752','Haider Butt','+923235894','haider@yahoo.com');
Insert into Father (FatherID,FCNIC,FName,FPhone,Femail)
Values ('525150','2321516758','Moiz Butt','+923232935','moiz@yahoo.com');
Insert into Father (FatherID,FCNIC,FName,FPhone,Femail,EntryDate)
Values ('221212','2321516778','Maaz Khan','+923242296','maaz@hotmail.com',add_months(sysdate,-12));

/* Father_HISTORY Table */
Create table Father_History
	(
		FatherID		number(6),
		SrNo	int DEFAULT '1',
		FName	varchar2(20)	NOT NULL,
		FPhone	varchar2(20)	NOT NULL,
		Femail	varchar2(30),
		FOREIGN KEY (FatherID) REFERENCES Father(FatherID)
	);	
/* Inserting values in Father_HISTORY Table */
Insert into Father_History(FatherID,FName,FPhone,Femail)
Select FatherID,FName,FPhone,Femail
From Father;

/* Applying Constraints to Father_HISTORY table */
ALTER TABLE Father_History
ADD CONSTRAINT pk_Father_History PRIMARY KEY (SrNo,FatherID);

/* Triggers for Father_HISTORY */
CREATE OR REPLACE TRIGGER trg_Father_History
	Before insert on Father_History
	referencing new as new old as old for each row
	declare
	begin
	select nvl(max(SrNo),0) + 1
	into :new.SrNo
	from Father_History
	where FatherID = :new.FatherID;
	end;
/
CREATE TRIGGER Father_History_insert_trigger
AFTER INSERT ON Father
referencing new as new old as old FOR EACH ROW 
DECLARE
BEGIN
    insert into Father_History(FatherID,FName,FPhone,Femail)
    values (:NEW.FatherID,:NEW.FName,:NEW.FPhone,:NEW.Femail);
END;
/
CREATE TRIGGER Father_History_update_trigger
AFTER UPDATE ON Father
referencing new as new old as old FOR EACH ROW 
DECLARE
BEGIN
    insert into Father_History(FatherID,FName,FPhone,Femail)
    values (:NEW.FatherID,:NEW.FName,:NEW.FPhone,:NEW.Femail);
END;
/
CREATE TRIGGER F_History_delete_trigger
BEFORE DELETE ON Father
referencing new as new old as old FOR EACH ROW 
DECLARE
BEGIN
    Delete from Father_History
	where FatherID=:OLD.FatherID;
END;
/
/* GUARDIANS Table */
Create table Guardian
	(
		GID		number(6),
		GCNIC	varchar2(20)	NOT NULL,
		GName	varchar2(20)	NOT NULL,
		Gphone	varchar2(20)	NOT NULL,
		Gender	char 			NOT NULL CHECK (Gender IN ('M','F')),
		Status 	varchar2(30)	CHECK (Status IN ('Pregnant','Handicapped')),
		relation varchar2(20)	NOT NULL,
		CONSTRAINT pk_Guardian primary key (GID)
	);
/* Inserting values in GUARDIANS Table */
Insert into Guardian (GID,GCNIC,GName,Gphone,Gender,relation)
Values ('818252','2712367238','Zulfiqar Ali','+924566541','M','Uncle');
Insert into Guardian (GID,GCNIC,GName,Gphone,Gender,relation)
Values ('278215','2712367210','Maham Safdar','+924964544','F','Aunt');
Insert into Guardian (GID,GCNIC,GName,Gphone,Gender,Status,relation)
Values ('112299','2712367212','Marium Karim','+924589541','F','Pregnant','Aunt');
Insert into Guardian (GID,GCNIC,GName,Gphone,Gender,relation)
Values ('125862','2712367214','Ahmed Naseem','+924577741','M','Uncle');
Insert into Guardian (GID,GCNIC,GName,Gphone,Gender,relation)
Values ('717279','2712367216','Tufail Murtaza', '+927565541','M','Grand Father');
Insert into Guardian (GID,GCNIC,GName,Gphone,Gender,Status,relation)
Values ('715856','2712367218','Zorab Tarar', '+929815339','M','Handicapped','Uncle');
Insert into Guardian (GID,GCNIC,GName,Gphone,Gender,relation)
Values ('612255','2712367220','Nagina Sheikh', '+923569541','F','Aunt');
Insert into Guardian (GID,GCNIC,GName,Gphone,Gender,Status,relation)
Values ('621212','2712367222','Yasmin Rasheed', '+920222541','F','Pregnant','Grand Mother');
Insert into Guardian (GID,GCNIC,GName,Gphone,Gender,relation)
Values ('615155','2712367224','Noor ul Ain', '+923336678','F','Aunt');
Insert into Guardian (GID,GCNIC,GName,Gphone,Gender,Status,relation)
Values ('787822','2712367226','Noureen Abid', '+924444231' ,'F','Handicapped','Aunt');

/* GUARDIANS_HISTORY Table */
Create table Guardian_History
	(
		GID		number(6),
		SrNo	int DEFAULT '1',
		GName	varchar2(20)	NOT NULL,
		Gphone	varchar2(20)	NOT NULL,
		Status 	varchar2(30),
		FOREIGN KEY (GID) REFERENCES Guardian(GID)
	);	
/* Inserting values in GUARDIANS_HISTORY Table */
Insert into Guardian_History(GID,GName,Gphone,Status)
Select GID,GName,Gphone,Status
From Guardian;

/* Applying Constraints to GUARDIANS_HISTORY table */
ALTER TABLE Guardian_History
ADD CONSTRAINT pk_Guardian_History PRIMARY KEY (SrNo,GID);

/* Triggers for GUARDIANS_HISTORY */
CREATE OR REPLACE TRIGGER trg_Guardian_History
	Before insert on Guardian_History
	referencing new as new old as old for each row
	declare
	begin
	select nvl(max(SrNo),0) + 1
	into :new.SrNo
	from Guardian_History
	where GID = :new.GID;
	end;
/
CREATE TRIGGER G_History_insert_trigger
AFTER INSERT ON Guardian
referencing new as new old as old FOR EACH ROW 
DECLARE
BEGIN
    insert into Guardian_History(GID,GName,Gphone,Status)
    values (:NEW.GID,:NEW.GName,:NEW.Gphone,:NEW.Status);
END;
/
CREATE TRIGGER G_History_update_trigger
AFTER UPDATE ON Guardian
referencing new as new old as old FOR EACH ROW 
DECLARE
BEGIN
    insert into Guardian_History(GID,GName,Gphone,Status)
    values (:NEW.GID,:NEW.GName,:NEW.Gphone,:NEW.Status);
END;
/
CREATE TRIGGER G_History_delete_trigger
BEFORE DELETE ON Guardian
referencing new as new old as old FOR EACH ROW 
DECLARE
BEGIN
    Delete from Guardian_History
	where GID=:OLD.GID;
END;
/
/* Student Table */
Create table Student
	(
		RollNo	 number(4),
		MotherID number(6),
		FatherID number(6),
		GID		 number(6) 		NOT NULL,
		SName 	 varchar2(20)	NOT NULL,
		Gender 	 char			NOT NULL CHECK (Gender IN ('M','F')),
		DOB		 date,
		Age	 number(4) CHECK (Age < 15),
		House	 varchar2(10),
		Street	 varchar2(20),
		City	 varchar2(10),
		Photo	 varchar2(25),
		EntryDate date default sysdate,
		CONSTRAINT pk_Student primary key (RollNo),
		CONSTRAINT fk_Student_M foreign key (MotherID) references Mother(MotherID),
		CONSTRAINT fk_Student_F foreign key (FatherID) references Father(FatherID),
		CONSTRAINT fk_Student_G foreign key (GID) references Guardian(GID)
	);

Insert into Student( RollNo,MotherID,FatherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo) 
values ('1701','171509','717172','615155','Qadeer','M',date '2015-02-01',extract(year from sysdate) - extract(year from date '2015-02-01'),'NA-154','7th road','RWP','p1.png');

Insert into Student( RollNo,MotherID,FatherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo) 
values ('1702','172217','158912','278215','Saad','M', date '2018-09-01',extract(year from sysdate) - extract(year from date '2018-09-01'),'26/17','Harley Street','RWP','p2.png');

Insert into Student( RollNo,MotherID,FatherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo,EntryDate) 
values ('1703','178911','211152','612255','Hamza','M',date '2007-05-01',extract(year from sysdate) - extract(year from date '2007-05-01'),'15-21','DHA','ISB','p3.png',add_months(sysdate,-12));

Insert into Student( RollNo,MotherID,FatherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo) 
values ('1704','191151','717172','615155','Sobhan','M',date '2018-09-05',extract(year from sysdate) - extract(year from date '2018-09-05'),'NA-154','7th road','RWP','p4.png');

Insert into Student( RollNo,MotherID,FatherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo) 
values ('1705','181215','525150','818252','Almira','F',date '2008-02-25',extract(year from sysdate) - extract(year from date '2008-02-25'),'19,15', 'Saddar','RWP','p5.png');

Insert into Student( RollNo,MotherID,FatherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo) 
values ('1706','172217','158912','278215','Hayat','M',date '2015-03-22',extract(year from sysdate) - extract(year from date '2015-03-22'),'26/17','Harley Street','RWP','p6.png');

Insert into Student( RollNo,MotherID,FatherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo) 
values ('1707','172217','158912','112299','Maryam','F',date '2012-01-25',extract(year from sysdate) - extract(year from date '2012-01-25'),'26/17','Harley Street','RWP','p7.png');

Insert into Student( RollNo,MotherID,FatherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo) 
values ('1708','111566','889988','818252','Hamza','M',date '2013-09-15',extract(year from sysdate) - extract(year from date '2013-09-15'),'19,15', 'Saddar','RWP','p8.png');

Insert into Student( RollNo,MotherID,FatherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo,EntryDate) 
values ('1709','172217','158912','112299','Maria','F',date '2007-11-19',extract(year from sysdate) - extract(year from date '2007-11-19'),'26/17','Harley Street','RWP','p9.png',add_months(sysdate,-12));

Insert into Student( RollNo,MotherID,FatherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo,EntryDate) 
values ('1710','227820','221212','787822','Mubir','M',date '2007-05-21',extract(year from sysdate) - extract(year from date '2007-05-21'),'54-91' ,'DHA','RWP','p10.png',add_months(sysdate,-12));

Insert into Student( RollNo,MotherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo) 
values ('1801','171582','621212','Ahsan','M',date '2017-05-21',extract(year from sysdate) - extract(year from date '2017-05-21'),'DK-56' ,'Ali Street','RWP','p11.png');

Insert into Student( RollNo,MotherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo) 
values ('1802','171582','621212','Aleena','F',date '2016-04-02',extract(year from sysdate) - extract(year from date '2016-04-02'),'DK-56' ,'Ali Street','RWP','p12.png');

Insert into Student( RollNo,MotherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo) 
values ('1803','111521','125862','Asad','M',date '2011-01-21',extract(year from sysdate) - extract(year from date '2011-01-21'),'H#101' ,'F-7/2','ISB','p13.png');

Insert into Student( RollNo,MotherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo) 
values ('1804','111521','125862','Sara','F',date '2010-04-21',extract(year from sysdate) - extract(year from date '2010-04-21'),'H#101' ,'F-7/2','ISB','p14.png');

Insert into Student( RollNo,GID,SName,Gender,DOB,Age,House,Street,City,Photo,EntryDate) 
values ('1901','717279','Mujtaba','M',date '2009-07-01',extract(year from sysdate) - extract(year from date '2009-07-01'),'NA-91' ,'A Block','RWP','p15.png',add_months(sysdate,-12));

Insert into Student( RollNo,GID,SName,Gender,DOB,Age,House,Street,City,Photo) 
values ('1902','717279','Areesha','F',date '2008-07-15',extract(year from sysdate) - extract(year from date '2008-07-15'),'NA-91' ,'A Block','RWP','p16.png');

Insert into Student( RollNo,FatherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo) 
values ('1910','221912','715856','Umar','M',date '2008-05-11',extract(year from sysdate) - extract(year from date '2008-05-11'),'11-91' ,'DHA','ISB','p17.png');

Insert into Student( RollNo,FatherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo,EntryDate) 
values ('1911','221912','715856','Asim','M',date '2006-03-01',extract(year from sysdate) - extract(year from date '2006-03-01'),'11-91' ,'DHA','ISB','p18.png',add_months(sysdate,-12));

Insert into Student( RollNo,FatherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo) 
values ('1111','221221','612255','Anwar','M',date '2014-01-01',extract(year from sysdate) - extract(year from date '2014-01-01'),'DK/121' ,'E-Block','RWP','p19.png');

Insert into Student( RollNo,FatherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo) 
values ('1112','722152','612255','Aima','F',date '2012-03-07',extract(year from sysdate) - extract(year from date '2012-03-07'),'C-91' ,'Bahria','RWP','p20.png');

Insert into Student( RollNo,FatherID,GID,SName,Gender,DOB,Age,House,Street,City,Photo) 
values ('2201','221912','621212','Tayyab','M',date '2010-06-01',extract(year from sysdate) - extract(year from date '2010-06-01'),'E-8989' ,'Saidpur Rd','RWP','p21.png');
Create table Student_History
	(
		RollNo	 number(4),
		SrNo	 int DEFAULT '1',
		GID		 number(6) 		NOT NULL,
		SName 	 varchar2(20)	NOT NULL,
		Age		 Number(4)	CHECK (Age < 15),
		House	 varchar2(10),
		Street	 varchar2(20),
		City	 varchar2(10),
		Photo	 varchar2(25),
		foreign key (RollNo) references Student(RollNo)
	);
/* Inserting values in STUDENTS_HISTORY Table */
Insert into Student_History(RollNo,GID,SName,Age,House,Street,City,Photo)
Select RollNo,GID,SName,Age,House,Street,City,Photo
From Student;

/* Applying Constraints to STUDENTS_HISTORY table */
ALTER TABLE Student_History
ADD CONSTRAINT pk_Student_History PRIMARY KEY (SrNo,RollNo);

/* Triggers for STUDENTS_HISTORY */
CREATE OR REPLACE TRIGGER trg_Student_History
	Before insert on Student_History
	referencing new as new old as old for each row
	declare
	begin
	select nvl(max(SrNo),0) + 1
	into :new.SrNo
	from Student_History
	where RollNo = :new.RollNo;
	end;
/
CREATE or replace TRIGGER S_History_insert_trigger
AFTER INSERT ON Student
referencing new as new old as old FOR EACH ROW 
DECLARE
BEGIN
    insert into Student_History(RollNo,GID,SName,Age,House,Street,City,Photo)
    values (:NEW.RollNo,:NEW.GID,:NEW.SName,:NEW.Age,:NEW.House,:NEW.Street,:NEW.City,:NEW.Photo);
END;
/
CREATE or replace TRIGGER S_History_update_trigger
AFTER UPDATE ON Student
referencing new as new old as old FOR EACH ROW 
DECLARE
BEGIN
    insert into Student_History(RollNo,GID,SName,Age,House,Street,City,Photo)
    values (:NEW.RollNo,:NEW.GID,:NEW.SName,:NEW.Age,:NEW.House,:NEW.Street,:NEW.City,:NEW.Photo);
END;
/
CREATE or replace TRIGGER St_History_delete_trigger
BEFORE DELETE ON Student
referencing new as new old as old FOR EACH ROW 
DECLARE
BEGIN
    Delete from Student_History
	where RollNo=:OLD.RollNo;
END;
/
Create Table Courses_Offered
	(
		CID		varchar2(6),
		CTitle varchar2(50) NOT NULL,
		Fee			Number(5),
		Duration_in_Months	int,
		CONSTRAINT pk_Course primary key (CID)
	);
Insert into Courses_Offered(CID,CTitle,Fee,Duration_in_Months)	
values ('IL-01','Pillars of Islam','10000','6');
Insert into Courses_Offered(CID,CTitle,Fee,Duration_in_Months)	
values ('IL-02','Brief History of Muslims','10000','12');	
Insert into Courses_Offered(CID,CTitle,Fee,Duration_in_Months)	
values ('SS-05','Philosophy of Iqbal','15000','6');
Insert into Courses_Offered(CID,CTitle,Fee,Duration_in_Months)	
values ('SS-09','Art and Craft','10000','24');
Insert into Courses_Offered(CID,CTitle,Fee,Duration_in_Months)	
values ('HM-02','Sociology','5000','12');
Insert into Courses_Offered(CID,CTitle,Fee,Duration_in_Months)	
values ('HM-05','Geography','5000','6');
Insert into Courses_Offered(CID,CTitle,Fee,Duration_in_Months)	
values ('HM-09','Enviroment Science','5000','24');
Insert into Courses_Offered(CID,CTitle,Fee,Duration_in_Months)	
values ('PK-01','Pakistan Studies','5000','6');
Insert into Courses_Offered(CID,CTitle,Fee,Duration_in_Months)	
values ('PK-05','Political Science','5000','24');
Insert into Courses_Offered(CID,CTitle,Fee,Duration_in_Months)	
values ('MM-02','Basic Mathematics','10000','12');
Create Table Registration(
	RollNo		number(4),
	CID			varchar2(6),
	SrNo		int DEFAULT '1',
	RClass		char(10) CHECK (RClass in('1','2','3','4','5','6')) NOT NULL,
	Sec			char(10) default 'K',CHECK (Sec in('K','G','B')),
	StartDate	Date	NOT NULL,
	EndDate		Date,
	FeePaid		float(4) NOT NULL,
	Discount	float(4) default 0.00,
	DueFee		float(4),
	ChallanNo	varchar(30),
	Foreign key (RollNo) references Student(Rollno),
	Foreign key (CID) references Courses_Offered(CID),
	CONSTRAINT pk_Registraion PRIMARY KEY (RollNo,CID,SrNo)
);
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1709','PK-01','5','G',add_months(sysdate,-12),add_months(add_months(sysdate,-12),6),'5000.00','0.00','0.00','HBL-12256907');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1703','PK-01','5','B',add_months(sysdate,-12),add_months(add_months(sysdate,-12),6),'5000.00','0.00','0.00','HBL-12286909');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee)
values ('1710','PK-01','5','B',add_months(sysdate,-12),add_months(add_months(sysdate,-12),6),'0.00','5000.00','0.00');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1901','PK-01','4','B',add_months(sysdate,-12),add_months(add_months(sysdate,-12),6),'5000.00','0.00','0.00','HBL-12222309');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1911','PK-01','6','B',add_months(sysdate,-12),add_months(add_months(sysdate,-12),6),'5000.00','0.00','0.00','HBL-56256257');
CREATE OR REPLACE TRIGGER trg_Registration
	Before insert on Registration
	referencing new as new old as old for each row
	declare
	begin
	select nvl(max(SrNo),0) + 1
	into :new.SrNo
	from Registration
	where RollNo = :new.RollNo and CID = :new.CID;
	end;
/
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1801','MM-02','1','K',sysdate,add_months(sysdate,12),'10000.00','0.00','0.00','ALFALAH-1738');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1802','MM-02','1','K',sysdate,add_months(sysdate,12),'5000.00','5000.00','5000.00','ALFALAH-1718');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1706','MM-02','2','K',sysdate,add_months(sysdate,12),'5000.00','5000.00','0.00','ALHABIB-1708');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1701','MM-02','2','K',sysdate,add_months(sysdate,12),'10000.00','0.00','0.00','ALHABIB-0708');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1111','MM-02','2','K',sysdate,add_months(sysdate,12),'10000.00','0.00','0.00','ALHABIB-1798');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1708','MM-02','3','K',sysdate,add_months(sysdate,12),'9000.00','0.00','1000.00','ALHABIB-1708');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1708','MM-02','3','K',sysdate,add_months(sysdate,12),'1000.00','0.00','0.00','SILK-2208');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1707','MM-02','3','K',sysdate,add_months(sysdate,12),'5000.00','5000.00','0.00','BOP/2708');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1112','MM-02','3','K',sysdate,add_months(sysdate,12),'10000.00','0.00','0.00','BOP/1708/ISB');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1803','MM-02','4','B',sysdate,add_months(sysdate,12),'10000.00','0.00','0.00','BOP/1711/ISB');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('2201','MM-02','4','B',sysdate,add_months(sysdate,12),'10000.00','0.00','0.00','BOP/1721/ISB');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1804','MM-02','4','G',sysdate,add_months(sysdate,12),'10000.00','0.00','0.00','BOP/1291/ISB');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1901','MM-02','5','B',sysdate,add_months(sysdate,12),'10000.00','0.00','0.00','BOP/9901/ISB');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1902','MM-02','5','G',sysdate,add_months(sysdate,12),'10000.00','0.00','0.00','BOP/9991/ISB');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1705','MM-02','5','G',sysdate,add_months(sysdate,12),'10000.00','0.00','0.00','UBL-9991/RWP');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1910','MM-02','5','B',sysdate,add_months(sysdate,12),'10000.00','0.00','0.00','HBL-0891/ISB');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1703','MM-02','6','B',sysdate,add_months(sysdate,12),'10000.00','0.00','0.00','Askari930292');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1710','MM-02','6','B',sysdate,add_months(sysdate,12),'10000.00','0.00','0.00','Askari91039');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1709','MM-02','6','G',sysdate,add_months(sysdate,12),'5000.00','5000.00','0.00','Askari288282');
insert into Registration(RollNo,CID,RClass,Sec,StartDate,EndDate,FeePaid,Discount,DueFee,ChallanNO)
values ('1911','MM-02','6','B',sysdate,add_months(sysdate,12),'10000.00','0.00','0.00','Askari38383');
Create Table Registration_History(
	RollNo		number(4),
	CID			varchar2(6),
	SrNo		int ,
	rNO			int	Default '1',
	RClass		char(10),
	Sec			char(10) ,
	EntryDate	date default sysdate,
	Foreign key (RollNo,CID,SrNo) references Registration(RollNo,CID,SrNo)
);
Insert into Registration_History(RollNo,CID,SrNo,RClass,Sec,EntryDate)
Select RollNo,CID,SrNo,RClass,Sec,StartDate
From registration;

ALTER TABLE Registration_History
ADD CONSTRAINT pk_Registration_History PRIMARY KEY (RollNo,CID,SrNo,rNO);


CREATE OR REPLACE TRIGGER trg_Registration_History
	Before insert on Registration_History
	referencing new as new old as old for each row
	declare
	begin
	select nvl(max(rNo),0) + 1
	into :new.rNo
	from Registration_History
	where RollNo = :new.RollNo and CID = :new.CID and SrNo=:new.SrNo;
	end;
/
CREATE or replace TRIGGER R_History_insert_trigger
AFTER INSERT ON Registration
referencing new as new old as old FOR EACH ROW 
DECLARE
BEGIN
    insert into Registration_History(RollNo,CID,SrNo,RClass,Sec)
    values (:new.RollNo,:new.CID,:new.SrNo,:new.RClass,:new.Sec);
END;
/
CREATE or replace TRIGGER R_History_update_trigger
AFTER UPDATE ON Registration
referencing new as new old as old FOR EACH ROW 
DECLARE
BEGIN
    insert into Registration_History(RollNo,CID,SrNo,RClass,Sec)
    values (:new.RollNo,:new.CID,:new.SrNo,:new.RClass,:new.Sec);
END;
/
CREATE or replace TRIGGER R_History_delete_trigger
BEFORE DELETE ON Registration
referencing new as new old as old FOR EACH ROW 
DECLARE
BEGIN
    Delete from Registration_History
	where RollNo = :old.RollNo;
END;
/