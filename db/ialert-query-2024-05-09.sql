-- Query for backup non-existing provider data

SELECT * FROM ialert_audit WHERE provider IN ('ipromote', 'natcorp');
SELECT * FROM ialert_history WHERE provider IN ('ipromote', 'natcorp');

-- delete non-existing agencies / provider

DELETE FROM ialert_account WHERE esection IN ('ipromote', 'natcorp');

-- ialert_account query for falp_group

UPDATE ialert_account SET falp_group='FAP1' WHERE sections LIKE 'section1%';
UPDATE ialert_account SET falp_group='FAP1' WHERE sections LIKE 'section3%';
UPDATE ialert_account SET falp_group='FAP2' WHERE sections LIKE 'section2%';
UPDATE ialert_account SET falp_group='FAP2' WHERE sections LIKE 'section9%';
UPDATE ialert_account SET falp_group='FAP3' WHERE sections LIKE 'section4%';
UPDATE ialert_account SET falp_group='FAP3' WHERE sections LIKE 'section6%';
UPDATE ialert_account SET falp_group='FAP4' WHERE sections LIKE 'section5%';
UPDATE ialert_account SET falp_group='FAP4' WHERE sections LIKE 'section7%';
UPDATE ialert_account SET falp_group='Factory 2' WHERE sections LIKE 'section8%';
UPDATE ialert_account SET falp_group='Production Innovation Team' WHERE sections LIKE 'repair%';
UPDATE ialert_account SET falp_group='Production Innovation Team' WHERE sections LIKE 'PIT%';
UPDATE ialert_account SET falp_group='QA' WHERE sections LIKE 'qa-final%';
UPDATE ialert_account SET falp_group='QA' WHERE sections LIKE 'qa-initial%';

-- ialert_section query for falp_group

UPDATE ialert_section SET falp_group='FAP1' WHERE section LIKE 'section1%';
UPDATE ialert_section SET falp_group='FAP1' WHERE section LIKE 'section3%';
UPDATE ialert_section SET falp_group='FAP2' WHERE section LIKE 'section2%';
UPDATE ialert_section SET falp_group='FAP2' WHERE section LIKE 'section9%';
UPDATE ialert_section SET falp_group='FAP3' WHERE section LIKE 'section4%';
UPDATE ialert_section SET falp_group='FAP3' WHERE section LIKE 'section6%';
UPDATE ialert_section SET falp_group='FAP4' WHERE section LIKE 'section5%';
UPDATE ialert_section SET falp_group='FAP4' WHERE section LIKE 'section7%';
UPDATE ialert_section SET falp_group='Factory 2' WHERE section LIKE 'section8%';
UPDATE ialert_section SET falp_group='Production Innovation Team' WHERE section LIKE 'repair%';
UPDATE ialert_section SET falp_group='Production Innovation Team' WHERE section LIKE 'PIT%';
UPDATE ialert_section SET falp_group='QA' WHERE section LIKE 'qa-final%';
UPDATE ialert_section SET falp_group='QA' WHERE section LIKE 'qa-initial%';
UPDATE ialert_section SET falp_group='Other Group' WHERE falp_group IS NULL;

-- ialert_audit query for falp_group

UPDATE ialert_audit SET falp_group='FAP1' WHERE section LIKE 'section1%';
UPDATE ialert_audit SET falp_group='FAP1' WHERE section LIKE 'section3%';
UPDATE ialert_audit SET falp_group='FAP2' WHERE section LIKE 'section2%';
UPDATE ialert_audit SET falp_group='FAP2' WHERE section LIKE 'section9%';
UPDATE ialert_audit SET falp_group='FAP3' WHERE section LIKE 'section4%';
UPDATE ialert_audit SET falp_group='FAP3' WHERE section LIKE 'section6%';
UPDATE ialert_audit SET falp_group='FAP4' WHERE section LIKE 'section5%';
UPDATE ialert_audit SET falp_group='FAP4' WHERE section LIKE 'section7%';
UPDATE ialert_audit SET falp_group='Factory 2' WHERE section LIKE 'section8%';
UPDATE ialert_audit SET falp_group='Production Innovation Team' WHERE section LIKE 'repair%';
UPDATE ialert_audit SET falp_group='Production Innovation Team' WHERE section LIKE 'PIT%';
UPDATE ialert_audit SET falp_group='QA' WHERE section LIKE 'qa-final%';
UPDATE ialert_audit SET falp_group='QA' WHERE section LIKE 'qa-initial%';

UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Cutting and Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Cutting and rimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Cutting and crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Cutting and crimoing%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'SAM%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE ' Cutting and crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Cutting and Crtimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'JAM%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'JAM (Auto Twist)%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Cuttimng and Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'SAM 30%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'UV-111%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'SAM 3%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Cutting and Crimping(TRD 304)%';

UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Cutting and Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Cutting and rimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Cutting and crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Cutting and crimoing%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'SAM%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE ' Cutting and crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Cutting and Crtimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'JAM%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'JAM (Auto Twist)%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Cuttimng and Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'SAM 30%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'UV-111%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'SAM 3%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Cutting and Crimping(TRD 304)%';

UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Cutting and Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Cutting and rimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Cutting and crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Cutting and crimoing%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'SAM%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE ' Cutting and crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Cutting and Crtimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'JAM%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'JAM (Auto Twist)%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Cuttimng and Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'SAM 30%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'UV-111%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'SAM 3%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Cutting and Crimping(TRD 304)%';

UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Cutting and Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Cutting and rimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Cutting and crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Cutting and crimoing%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'SAM%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE ' Cutting and crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Cutting and Crtimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'JAM%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'JAM (Auto Twist)%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Cuttimng and Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'SAM 30%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'UV-111%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'SAM 3%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Cutting and Crimping(TRD 304)%';

UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Cutting and Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Cutting and rimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Cutting and crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Cutting and crimoing%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'SAM%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE ' Cutting and crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Cutting and Crtimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'JAM%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'JAM (Auto Twist)%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Cuttimng and Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'SAM 30%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'UV-111%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'SAM 3%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Cutting and Crimping(TRD 304)%';

UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'Cutting and Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'Cutting and rimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'Cutting and crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'Cutting and crimoing%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'SAM%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE ' Cutting and crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'Cutting and Crtimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'JAM%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'JAM (Auto Twist)%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'Cuttimng and Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'SAM 30%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'UV-111%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'SAM 3%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'Cutting and Crimping(TRD 304)%';

UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'Cutting and Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'Cutting and rimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'Cutting and crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'Cutting and crimoing%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'SAM%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE ' Cutting and crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'Cutting and Crtimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'JAM%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'JAM (Auto Twist)%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'Cuttimng and Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'SAM 30%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'UV-111%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'SAM 3%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'Cutting and Crimping(TRD 304)%';

UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE '%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE '%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE '%';

UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE '%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE '%';

-- ialert_line_audit query for falp_group

UPDATE ialert_line_audit SET falp_group='FAP1' WHERE section LIKE 'section1%';
UPDATE ialert_line_audit SET falp_group='FAP1' WHERE section LIKE 'section3%';
UPDATE ialert_line_audit SET falp_group='FAP2' WHERE section LIKE 'section2%';
UPDATE ialert_line_audit SET falp_group='FAP2' WHERE section LIKE 'section9%';
UPDATE ialert_line_audit SET falp_group='FAP3' WHERE section LIKE 'section4%';
UPDATE ialert_line_audit SET falp_group='FAP3' WHERE section LIKE 'section6%';
UPDATE ialert_line_audit SET falp_group='FAP4' WHERE section LIKE 'section5%';
UPDATE ialert_line_audit SET falp_group='FAP4' WHERE section LIKE 'section7%';
UPDATE ialert_line_audit SET falp_group='Factory 2' WHERE section LIKE 'section8%';
UPDATE ialert_line_audit SET falp_group='Production Innovation Team' WHERE section LIKE 'repair%';
UPDATE ialert_line_audit SET falp_group='Production Innovation Team' WHERE section LIKE 'PIT%';
UPDATE ialert_line_audit SET falp_group='QA' WHERE section LIKE 'qa-final%';
UPDATE ialert_line_audit SET falp_group='QA' WHERE section LIKE 'qa-initial%';

UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Cutting and Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'SAM%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Cutting anc crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Cutting andc rimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE ' Cutting and crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'SAM 51%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'SAM38%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'JAM 09%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'JAM%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'SAM(NS-IV)%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Cuttting and Crimping%';

UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Cutting and Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'SAM%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Cutting anc crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Cutting andc rimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE ' Cutting and crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'SAM 51%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'SAM38%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'JAM 09%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'JAM%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'SAM(NS-IV)%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Cuttting and Crimping%';

UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Cutting and Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'SAM%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Cutting anc crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Cutting andc rimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE ' Cutting and crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'SAM 51%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'SAM38%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'JAM 09%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'JAM%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'SAM(NS-IV)%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Cuttting and Crimping%';

UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Cutting and Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'SAM%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Cutting anc crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Cutting andc rimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE ' Cutting and crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'SAM 51%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'SAM38%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'JAM 09%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'JAM%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'SAM(NS-IV)%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Cuttting and Crimping%';

UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Cutting and Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'SAM%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Cutting anc crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Cutting andc rimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE ' Cutting and crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'SAM 51%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'SAM38%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'JAM 09%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'JAM%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'SAM(NS-IV)%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Cuttting and Crimping%';

UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'Cutting and Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'SAM%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'Cutting anc crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'Cutting andc rimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE ' Cutting and crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'SAM 51%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'SAM38%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'JAM 09%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'JAM%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'SAM(NS-IV)%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Battery%' AND process LIKE 'Cuttting and Crimping%';

UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'Cutting and Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'SAM%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'Cutting anc crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'Cutting & Crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'Cutting andc rimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE ' Cutting and crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'SAM 51%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'SAM38%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'JAM 09%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'JAM%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'SAM(NS-IV)%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'Cuttting and Crimping%';

UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE '%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE '%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE '%';

UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE '%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE '%';

-- change repair to PIT

DELETE FROM ialert_section WHERE section='repair';

UPDATE ialert_audit SET section='PIT' WHERE section LIKE 'repair%';
UPDATE ialert_line_audit SET section='PIT' WHERE section LIKE 'repair%';