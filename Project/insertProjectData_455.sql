-- no-auto-rehash
delete from SiteOdetails;
delete from SiteOrders;
delete from SiteCustomers;
delete from SiteEmployees;
delete from SiteParts;
delete from SiteAddresses;
		
/*
Currenty utilizing dummy variables for testing purposes
*/
		
/*insert into SiteAddresses
	values	('67226','Wichita');*/
			
			
insert into SiteParts
	values	('01','image1',1),
			('03','image3',1),
			('04','image4',1),
			('05','image5',1),
			('06','image6',1),
			('07','image7',1),
			('08','image8',1),
			('09','image9',1);		

insert into SiteEmployees
	values  ('1000','Jones','67226','1995-12-12'),
			('1001','Smith','60606','1992-01-01'),
			('1002','Brown','50302','1994-09-01'),
			('1003','Green','28411','2002-09-01'),
			('1004','Purple','28411','2003-01-01');			

insert into SiteCustomers
	values ('1111','Charles','123 Main St.','67226','316-636-555'),
		   ('2222','Bertram','237 Ash Avenue','67226','316-689-5555'),
		   ('3333','Barbara','111 Inwood St.','60606','316-111-1234'),
		   ('4444','Will','111 Kenwood St.','54444','416-111-1234'),
		   ('5555','Bill','211 Marlwood St.','28408','416-111-1235'),
		   ('6666','Keely','211 Pinewood St.','28411','416-111-1235'),
		   ('7777','Maera','211 Marlwood St.','28408','416-111-1235');

insert into SiteOrders
	values	('1020','1111','1000','1994-12-10','1994-12-12'),
			('1021','1111','1000','1995-01-12','1995-01-15'),
			('1022','2222','1001','1995-02-13','1995-02-20'),
			('1023','3333','1000','2003-02-15','NULL'),
			('1024','4444','1000','2003-02-15','2003-02-16'),
			('1025','5555','1000','2003-02-15','2003-02-16');
			
insert into SiteOdetails
	values	('1020','10506',1),
			('1020','10800',1),
			('1020','10508',2),
			('1020','10509',3),
			('1021','10601',4),
			('1021','10506',7),
			('1022','10601',1),
			('1022','10701',1),
			('1023','10800',1),
			('1023','10900',1),
			('1023','10506',2),
			('1024','10506',12),
			('1025','10601',2);

			
			
			