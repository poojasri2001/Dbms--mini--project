QUERIES AND SUBQUERIES:-

1)TO DISPLAY THE DETAILS OF THE STAFF WHOSE  SALARY IS MAXIMUM:
	
	SELECT * from `staff` WHERE salary in(SELECT max(salary) from staff);

2)TO DISPLAY THE NUMBER OF INPATIENTS TREATED BY EACH DOCTOR AND THEIR CORRESPONDING ID AND NAME:

	SELECT D.doctor_id ,D.doctor_name,count(P.Doc_Id) from doctor D ,in_patient P WHERE D.doctor_id=P.Doc_ID GROUP BY D.doctor_id;

3)TO DISPLAY THE NUMBER OF OUTPATIENTS TREATED BY EACH DOCTOR AND THEIR CORRESPONDING ID AND NAME:

	SELECT D.doctor_id ,D.doctor_name,count(P.doc_id) from doctor D ,out_patient P WHERE D.doctor_id=P.doc_id GROUP BY D.doctor_id;

4)TO DISPLAY THE DOCTOR_ID,DOCTOR_NAME WHO HAVE TREATED THE MAXIMUM NUMBER OF OUT_PATIENTS ALONG WITH THEIR COUNT:

	SELECT D.doctor_id ,D.doctor_name,count(P.doc_id) from doctor D ,out_patient P WHERE D.doctor_id=P.doc_id GROUP BY D.doctor_id ORDER BY COUNT(P.doc_id) DESC LIMIT 1;

5)TO COMPUTE AND  DISPLAY THE IN_PATIENT ID,NAME,ROOM NO WITH THEIR NO OF DAYS STAYED IN THE ROOM:
	
	SELECT P_ID,Name,R_NUMBER ,DATEDIFF(DOD,DOA) AS 'NO OD DAYS STAYED' FROM  in_patient;

6)TO COMPUTE AND DISPLAY THE INPATIENT's ID,NAME WHO HAVE STAYED MAXIMUM NUMBER OF DAYS IN ROOM ALONG WITH THEIR NO OF DAYS:

	SELECT P_ID,Name ,MAX(DATEDIFF(DOD,DOA)) as max_stay FROM in_patient GROUP BY DATEDIFF(DOD,DOA) ORDER BY (DATEDIFF(DOD,DOA)) DESC LIMIT 1;

7)TO DISPLAY THE DOCTOR's ID AND NAME WHO HAVE TREATED THE INPATIENTs BUT NOT THE OUTPATIENT:
	
	SELECT D.doctor_id ,D.doctor_name from doctor D  WHERE D.doctor_id  IN(SELECT in_patient.Doc_Id from in_patient WHERE in_patient.Doc_ID NOT in(SELECT out_patient.doc_id FROM out_patient));

8)TO DISPLAY THE DOCTOR's ID AND NAME WHO HAVE TREATED THE OUT-PATIENT's BUT NOT THE INPATIENT's:

	SELECT D.doctor_id ,D.doctor_name from doctor D WHERE D.doctor_id IN(SELECT out_patient.doc_id FROM out_patient where out_patient.doc_id NOT IN(SELECT in_patient.Doc_Id from in_patient));

9)TO DISPLAY THE LAB DETAILS WHERE THE LAB DATE IS THE CURRENT DATE:

	SELECT * FROM lab where l_date=CURRENT_DATE;

10)TO DISPLAY THE DETAILS OF THE BILL WHOSE MEDICAL CHARGE IS MINIMUM:
	
	select bill_no,P_id, med_fee as MIN_AMOUNT FROM bill where med_fee in(SELECT min(med_fee) FROM bill);

 --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

VIEWS:-

1)CREATE A VIEW FOR ROOM TO DISPLAY THE ROOM-NO AND ROOM-TYPE WHOSE STATUS IS 'AVAILABLE':
	
	CREATE view room_view AS SELECT room_no,room_type FROM room WHERE status='AVAILABLE';

TO DISPLAY THE room_view:

	SELECT * FROM `room_view`

2)CREATE A VIEW FOR DOCTOR TO DISPLAY DOCTOR's NAME WHOSE NAME STARTS WITH 'D':	

	CREATE VIEW doctor_view as SELECT doctor_name from doctor WHERE doctor_name LIKE 'D%';
	
TO DISPLAY THE doctor_view:
	
	SELECT * FROM `doctor_view`

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------