1)To count the number of outpatients who have taken test in the lab.

	SELECT count(lab.P_id) as count  FROM lab,out_patient where lab.P_id=out_patient.P_ID;

2)To count the number of inpatients who have taken test in the lab.

	SELECT count(lab.P_id) as count  FROM lab,in_patient where lab.P_id=in_patient.P_ID;

3)

CREATE TRIGGER `bill_info` AFTER UPDATE ON `bill` FOR EACH ROW BEGIN if(new.med_fee>2000) THEN UPDATE bill SET med_fee=med_fee-(0.01*med_fee); end IF; END;

DROP TRIGGER IF EXISTS `bill_info`;CREATE DEFINER=`root`@`localhost` TRIGGER `bill_info` AFTER INSERT ON `bill` FOR EACH ROW BEGIN if(new.med_fee>2000) THEN UPDATE bill SET med_fee=med_fee-(0.01*med_fee); end IF; END

4)VIEW TO DISPLAY ROOM_NO,ROOM_TYPE:
CREATE VIEW room_view as SELECT room_no ,room_type FROM room WHERE status='AVAILABLE'

FUNCTION:
DOUBT:
begin
DECLARE no1 integer ;DECLARE stat TEXT;
DECLARE exit_loop boolean DEFAULT false;
declare doc CURSOR FOR SELECT room_no,room_type  FROM room;
OPEN doc;
room_loop:LOOP
fetch FROM doc into no1,stat;
if exit_loop THEN
LEAVE room_loop;
end if;
if stat='AC' THEN
SELECT no1;
end if;
end loop room_loop;
CLOSE doc;
end

1)
BEGIN
DECLARE id integer;
DECLARE ct integer;
SELECT avg(med_fee+(room_fee*days)) as avg from bill ;
END

1)PROCEDURE TO FIND AVERAGE BILL :

	CREATE PROCEDURE `billtotal_avg`() NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN SELECT avg(med_fee+(room_fee*days)) as average_bill from bill ; END

CALLING THE PROCEDURE:
	CALL `billtotal_avg`();

2)PROCEDURE TO FIND LAB:
	CREATE PROCEDURE `lab_inpatient`() NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN SELECT in_patient.P_ID,in_patient.Name,lab.lab_no from in_patient INNER JOIN lab ON in_patient.P_ID=lab.P_id; END
CALLING FIND_LAB:
	CALL `lab_inpatient`();


3)NOT ATTENDING:
	CREATE PROCEDURE `DOCTOR_NOTATTENDED_INPATIENT`() NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN select doctor_name from doctor where doctor_name not in (select D.doctor_name from doctor D,in_patient P where D.doctor_id=P.Doc_ID); END
CALLING:
