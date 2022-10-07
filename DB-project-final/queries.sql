/*create user project identified by 1234;*/
/*grant connect,resource,create table,create view to project;*/
/*QUERY 1 - A LIST OF ALL STUDENTS */
select * from student;

/*QUERY 2 - A LIST OF ALL MOTHERS AND THEIR SPOUSES*/
select DISTINCT m.*,f.fname SpouseName
from mother m,father f,student s
where m.motherid=s.motherid 
and f.fatherid=s.fatherid;

/*Query 3 - A list of guardians group by relations with the students*/
select g.* ,s.sname
from guardian g,student s
where g.gid=s.gid;

/*QUERY 4 - A LIST OF ALL PARENTS AND THEIR CHILDREN */
select  m.motherid,m.mname MOTHER_NAME,f.fatherid,f.fname FATHER_NAME,s.sname CHILD_NAME
from mother m,father f,student s
where m.motherid(+)=s.motherid
and f.fatherid(+)=s.fatherid;


/*QUERY 5 - A LIST OF ALL STUDENTS WITH SIBLINGS TAKING CLASSES GROUP BY CLASS */
create view registered_students as
select DISTINCT r.rollno,r.rclass,s.sname,s.fatherid,s.motherid
from registration r,student s
where r.rollno=s.rollno;

select DISTINCT rr.rollno,rr.rclass,rr.sname STUDENT,rv.sname SIBLING
from registered_students rr,registered_students rv
where (rr.fatherid=rv.fatherid and rr.rollno!=rv.rollno)
OR (rr.motherid=rv.motherid and rr.rollno!=rv.rollno)
order by rr.rclass;

/*Query-6 LIST OF STUDENTS ASSIGNED TO A NEW CLASS IN GIVEN TIME SPAN*/
update registration
set rclass='6'
where rollno='1910'
and cid='MM-02';
select DISTINCT s.* 
from student s,
(select r1.rollno
from registration_history r1
where r1.rNo!='1') t
where s.rollno=t.rollno 
and EntryDate between '01-JULY-19' and '01-JULY-20';

/*Query-7 A list of all new students in given time span grouped by class */
select * from student
where EntryDate between '01-JULY-19' and '01-JULY-20';
/*Query-8 A list of all new parents in given time span (include children info) */
select  m.motherid,m.mname MOTHER_NAME,f.fatherid,f.fname FATHER_NAME,s.sname CHILD_NAME,s.EntryDate
from mother m,father f,student s
where m.motherid(+)=s.motherid
and f.fatherid(+)=s.fatherid
and s.EntryDate between '01-JULY-19' and '01-JULY-20';

/*Query 9 LIST OF PARENTS THAT ARE EARLY INTRODUCERS */
 /*select * from student where age<3;*/
select m.motherid,m.mname,f.fatherid,f.fname
from mother m,father f,(select * from student where age< 3) s
where m.motherid(+)=s.motherid
and f.fatherid(+)=s.fatherid;
/* Query 10 - CLASS CHANGE HISTORY OF A GIVEN STUDENT IN A GIVEN COURSE */
select rclass,sec
from registration_history
where rollno='1910' and cid='MM-02';