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

INSERT INTO ialert_section (falp_group, section, name) VALUES
('First Process', 'fpsection1', 'FP Section 1'),
('First Process', 'fpsection2', 'FP Section 2'),
('First Process', 'fpsection3', 'FP Section 3'),
('First Process', 'fpsection4', 'FP Section 4'),
('First Process', 'fpsection5', 'FP Section 5'),
('First Process', 'fpsection6', 'FP Section 6'),
('First Process', 'fpsection7', 'FP Section 7'),
('First Process', 'fpsection8', 'FP Section 8'),
('First Process', 'fpsection9', 'FP Section 9');

INSERT INTO ialert_section (falp_group, section, name) VALUES
('Secondary 1 Process', 'sp1section1', 'SP1 Section 1'),
('Secondary 1 Process', 'sp1section2', 'SP1 Section 2'),
('Secondary 1 Process', 'sp1section3', 'SP1 Section 3'),
('Secondary 1 Process', 'sp1section4', 'SP1 Section 4'),
('Secondary 1 Process', 'sp1section5', 'SP1 Section 5'),
('Secondary 1 Process', 'sp1section6', 'SP1 Section 6'),
('Secondary 1 Process', 'sp1section7', 'SP1 Section 7'),
('Secondary 1 Process', 'sp1section8', 'SP1 Section 8'),
('Secondary 1 Process', 'sp1section9', 'SP1 Section 9');

INSERT INTO ialert_section (falp_group, section, name) VALUES
('Secondary 2 Process', 'sp2section1', 'SP2 Section 1'),
('Secondary 2 Process', 'sp2section2', 'SP2 Section 2'),
('Secondary 2 Process', 'sp2section3', 'SP2 Section 3'),
('Secondary 2 Process', 'sp2section4', 'SP2 Section 4'),
('Secondary 2 Process', 'sp2section5', 'SP2 Section 5'),
('Secondary 2 Process', 'sp2section6', 'SP2 Section 6'),
('Secondary 2 Process', 'sp2section7', 'SP2 Section 7'),
('Secondary 2 Process', 'sp2section8', 'SP2 Section 8'),
('Secondary 2 Process', 'sp2section9', 'SP2 Section 9');

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

UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Manual Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Joint Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Joint taping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Heatshrink%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Casting%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Weld taping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Airbag Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Twisting%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Auto Twist%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Welding%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Mid-stripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Joint welding%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Airbag housing%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Midstripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Twisting process%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Mid-tripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Welding process%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Mis-stripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Airbag%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Mid Stripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Quick stripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Mnaul Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Parts%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Mid Strippig%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Welding Taping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'V Type Twisting%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Weld Joint Taping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Manual Heatshrink%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Manual Crimping 3%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Heatshrink Blower%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Airbag 2%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Heatshrink 2%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Manual Crimping 1%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Welding (insertion of cap)%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Welding joint%';

UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Manual Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Joint Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Joint taping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Heatshrink%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Casting%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Weld taping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Airbag Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Twisting%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Auto Twist%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Welding%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Mid-stripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Joint welding%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Airbag housing%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Midstripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Twisting process%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Mid-tripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Welding process%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Mis-stripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Airbag%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Mid Stripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Quick stripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Mnaul Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Parts%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Mid Strippig%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Welding Taping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'V Type Twisting%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Weld Joint Taping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Manual Heatshrink%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Manual Crimping 3%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Heatshrink Blower%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Airbag 2%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Heatshrink 2%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Manual Crimping 1%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Welding (insertion of cap)%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Welding joint%';

UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Manual Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Joint Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Joint taping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Heatshrink%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Casting%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Weld taping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Airbag Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Twisting%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Auto Twist%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Welding%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Mid-stripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Joint welding%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Airbag housing%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Midstripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Twisting process%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Mid-tripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Welding process%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Mis-stripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Airbag%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Mid Stripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Quick stripping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Mnaul Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Parts%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Mid Strippig%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Welding Taping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'V Type Twisting%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Weld Joint Taping%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Manual Heatshrink%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Manual Crimping 3%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Heatshrink Blower%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Airbag 2%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Heatshrink 2%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Manual Crimping 1%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Welding (insertion of cap)%';
UPDATE ialert_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Welding joint%';

UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Manual Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Joint Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Joint taping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Heatshrink%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Casting%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Weld taping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Airbag Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Twisting%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Auto Twist%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Welding%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Mid-stripping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Joint welding%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Airbag housing%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Midstripping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Twisting process%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Mid-tripping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Welding process%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Mis-stripping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Airbag%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Mid Stripping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Quick stripping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Mnaul Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Parts%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Mid Strippig%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Welding Taping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'V Type Twisting%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Weld Joint Taping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Manual Heatshrink%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Manual Crimping 3%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Heatshrink Blower%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Airbag 2%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Heatshrink 2%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Manual Crimping 1%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Welding (insertion of cap)%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Welding joint%';

UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Manual Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Joint Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Joint taping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Heatshrink%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Casting%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Weld taping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Airbag Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Twisting%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Auto Twist%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Welding%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Mid-stripping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Joint welding%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Airbag housing%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Midstripping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Twisting process%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Mid-tripping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Welding process%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Mis-stripping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Airbag%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Mid Stripping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Quick stripping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Mnaul Crimping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Parts%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Mid Strippig%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Welding Taping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'V Type Twisting%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Weld Joint Taping%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Manual Heatshrink%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Manual Crimping 3%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Heatshrink Blower%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Airbag 2%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Heatshrink 2%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Manual Crimping 1%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Welding (insertion of cap)%';
UPDATE ialert_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Welding joint%';

UPDATE ialert_audit SET section='fpsection1' WHERE falp_group='First Process' AND section LIKE 'section1%';
UPDATE ialert_audit SET section='fpsection2' WHERE falp_group='First Process' AND section LIKE 'section2%';
UPDATE ialert_audit SET section='fpsection3' WHERE falp_group='First Process' AND section LIKE 'section3%';
UPDATE ialert_audit SET section='fpsection4' WHERE falp_group='First Process' AND section LIKE 'section4%';
UPDATE ialert_audit SET section='fpsection5' WHERE falp_group='First Process' AND section LIKE 'section5%';
UPDATE ialert_audit SET section='fpsection6' WHERE falp_group='First Process' AND section LIKE 'section6%';
UPDATE ialert_audit SET section='fpsection7' WHERE falp_group='First Process' AND section LIKE 'section7%';
UPDATE ialert_audit SET section='fpsection8' WHERE falp_group='First Process' AND section LIKE 'section8%';
UPDATE ialert_audit SET section='fpsection9' WHERE falp_group='First Process' AND section LIKE 'section9%';

UPDATE ialert_audit SET section='sp1section1' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section1%';
UPDATE ialert_audit SET section='sp1section2' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section2%';
UPDATE ialert_audit SET section='sp1section3' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section3%';
UPDATE ialert_audit SET section='sp1section4' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section4%';
UPDATE ialert_audit SET section='sp1section5' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section5%';
UPDATE ialert_audit SET section='sp1section6' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section6%';
UPDATE ialert_audit SET section='sp1section7' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section7%';
UPDATE ialert_audit SET section='sp1section8' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section8%';
UPDATE ialert_audit SET section='sp1section9' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section9%';

UPDATE ialert_audit SET section='sp2section1' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section1%';
UPDATE ialert_audit SET section='sp2section2' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section2%';
UPDATE ialert_audit SET section='sp2section3' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section3%';
UPDATE ialert_audit SET section='sp2section4' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section4%';
UPDATE ialert_audit SET section='sp2section5' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section5%';
UPDATE ialert_audit SET section='sp2section6' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section6%';
UPDATE ialert_audit SET section='sp2section7' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section7%';
UPDATE ialert_audit SET section='sp2section8' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section8%';
UPDATE ialert_audit SET section='sp2section9' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section9%';

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
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'Cutting andc rimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE ' Cutting and crimping%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'SAM 51%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'SAM38%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'JAM 09%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'JAM%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'SAM(NS-IV)%';
UPDATE ialert_line_audit SET falp_group='First Process' WHERE line_no='initial' AND car_maker LIKE 'Toyota%' AND process LIKE 'Cuttting and Crimping%';

UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Manual Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Parts%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Welding%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Joint Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Casting%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Joint taping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Mid-stripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Heatshrink%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Quickstripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Airbag%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Welding process%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Twisting%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Weld taping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Auto twist%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Midstripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Manual crimpinjg%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Parts Area%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Mid Stripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Jointn Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Joint tapin g%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Parts rack%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Joint Welding%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE ' PArts%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Twisting Process%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Manuala Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Parts Distribution%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Manual crimping 5 tons%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'V Type Twisting%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Joint Crimping 3%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Jointc crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Suzuki%' AND process LIKE 'Welding joint%';

UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Manual Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Parts%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Welding%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Joint Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Casting%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Joint taping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Mid-stripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Heatshrink%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Quickstripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Airbag%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Welding process%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Twisting%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Weld taping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Auto twist%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Midstripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Manual crimpinjg%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Parts Area%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Mid Stripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Jointn Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Joint tapin g%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Parts rack%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Joint Welding%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE ' PArts%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Twisting Process%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Manuala Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Parts Distribution%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Manual crimping 5 tons%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'V Type Twisting%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Joint Crimping 3%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Jointc crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Mazda%' AND process LIKE 'Welding joint%';

UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Manual Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Parts%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Welding%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Joint Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Casting%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Joint taping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Mid-stripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Heatshrink%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Quickstripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Airbag%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Welding process%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Twisting%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Weld taping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Auto twist%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Midstripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Manual crimpinjg%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Parts Area%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Mid Stripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Jointn Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Joint tapin g%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Parts rack%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Joint Welding%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE ' PArts%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Twisting Process%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Manuala Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Parts Distribution%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Manual crimping 5 tons%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'V Type Twisting%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Joint Crimping 3%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Jointc crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 1 Process' WHERE line_no='initial' AND car_maker LIKE 'Subaru%' AND process LIKE 'Welding joint%';

UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Manual Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Parts%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Welding%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Joint Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Casting%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Joint taping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Mid-stripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Heatshrink%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Quickstripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Airbag%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Welding process%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Twisting%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Weld taping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Auto twist%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Midstripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Manual crimpinjg%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Parts Area%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Mid Stripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Jointn Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Joint tapin g%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Parts rack%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Joint Welding%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE ' PArts%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Twisting Process%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Manuala Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Parts Distribution%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Manual crimping 5 tons%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'V Type Twisting%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Joint Crimping 3%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Jointc crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Daihatsu%' AND process LIKE 'Welding joint%';

UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Manual Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Parts%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Welding%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Joint Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Casting%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Joint taping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Mid-stripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Heatshrink%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Quickstripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Airbag%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Welding process%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Twisting%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Weld taping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Auto twist%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Midstripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Manual crimpinjg%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Parts Area%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Mid Stripping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Jointn Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Joint tapin g%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Parts rack%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Joint Welding%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE ' PArts%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Twisting Process%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Manuala Crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Parts Distribution%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Manual crimping 5 tons%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'V Type Twisting%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Joint Crimping 3%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Jointc crimping%';
UPDATE ialert_line_audit SET falp_group='Secondary 2 Process' WHERE line_no='initial' AND car_maker LIKE 'Honda%' AND process LIKE 'Welding joint%';

UPDATE ialert_line_audit SET section='fpsection1' WHERE falp_group='First Process' AND section LIKE 'section1%';
UPDATE ialert_line_audit SET section='fpsection2' WHERE falp_group='First Process' AND section LIKE 'section2%';
UPDATE ialert_line_audit SET section='fpsection3' WHERE falp_group='First Process' AND section LIKE 'section3%';
UPDATE ialert_line_audit SET section='fpsection4' WHERE falp_group='First Process' AND section LIKE 'section4%';
UPDATE ialert_line_audit SET section='fpsection5' WHERE falp_group='First Process' AND section LIKE 'section5%';
UPDATE ialert_line_audit SET section='fpsection6' WHERE falp_group='First Process' AND section LIKE 'section6%';
UPDATE ialert_line_audit SET section='fpsection7' WHERE falp_group='First Process' AND section LIKE 'section7%';
UPDATE ialert_line_audit SET section='fpsection8' WHERE falp_group='First Process' AND section LIKE 'section8%';
UPDATE ialert_line_audit SET section='fpsection9' WHERE falp_group='First Process' AND section LIKE 'section9%';

UPDATE ialert_line_audit SET section='sp1section1' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section1%';
UPDATE ialert_line_audit SET section='sp1section2' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section2%';
UPDATE ialert_line_audit SET section='sp1section3' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section3%';
UPDATE ialert_line_audit SET section='sp1section4' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section4%';
UPDATE ialert_line_audit SET section='sp1section5' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section5%';
UPDATE ialert_line_audit SET section='sp1section6' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section6%';
UPDATE ialert_line_audit SET section='sp1section7' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section7%';
UPDATE ialert_line_audit SET section='sp1section8' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section8%';
UPDATE ialert_line_audit SET section='sp1section9' WHERE falp_group='Secondary 1 Process' AND section LIKE 'section9%';

UPDATE ialert_line_audit SET section='sp2section1' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section1%';
UPDATE ialert_line_audit SET section='sp2section2' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section2%';
UPDATE ialert_line_audit SET section='sp2section3' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section3%';
UPDATE ialert_line_audit SET section='sp2section4' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section4%';
UPDATE ialert_line_audit SET section='sp2section5' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section5%';
UPDATE ialert_line_audit SET section='sp2section6' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section6%';
UPDATE ialert_line_audit SET section='sp2section7' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section7%';
UPDATE ialert_line_audit SET section='sp2section8' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section8%';
UPDATE ialert_line_audit SET section='sp2section9' WHERE falp_group='Secondary 2 Process' AND section LIKE 'section9%';

-- change repair to PIT

DELETE FROM ialert_section WHERE section='repair';

UPDATE ialert_audit SET section='PIT' WHERE section LIKE 'repair%';
UPDATE ialert_line_audit SET section='PIT' WHERE section LIKE 'repair%';