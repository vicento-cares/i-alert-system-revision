<script type="text/javascript">

    // Revisions (Vince)
    const fetch_section_dropdown = () => {
        let falp_group = document.getElementById('falp_group').value;

        $.ajax({
            url: '../../process/admin/sections.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_section_dropdown',
                falp_group: falp_group
            },
            success: function (response) {
                $('#section').html(response);
            }
        });
    }

    const create_audit = () => {

        setTimeout(generateBatchID, 100);

    }

    const generateBatchID = () => {
        $.ajax({
            url: '../../process/admin/add_audit_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'AuditCode'
            }, success: function (response) {
                $('#auditCode').html(response);
            }
        });
    }

    const detect_part_info = () => {
        var employee_num = document.querySelector('#employee_num').value;

        $.ajax({
            url: '../../process/admin/add_audit_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_details_req',
                employee_num: employee_num
            }, success: function (response) {
                if (response !== '') {
                    var str = response.split('~!~');
                    document.querySelector('#full_name').value = str[0];
                    document.querySelector('#position').value = str[1];
                    document.querySelector('#provider').value = str[2];
                    document.querySelector('#emline').value = str[3];
                    document.querySelector('#falp_group').value = str[4];
                    document.querySelector('#group').value = str[6];
                    setTimeout(() => {
                        fetch_section_dropdown();
                    }, 500)
                }
                else {
                    $('#full_name').val('');
                    $('#position').val('');
                    $('#provider').val('');
                    $('#shift').val('');
                    $('#date_audited').val('');
                    $('#carmaker').val('');
                    $('#carmodel').val('');
                    $('#emline').val('');
                    $('#process').val('');
                    $('#audit_findings').val('');
                    $('#audit_details').val('');
                    $('#audited_by').val('');
                    $('#criticality_level').val('');
                    $('#audit_category').val('');
                    $('#problem_identification').val('');
                    $('#sm_analysis').val('');
                    $('#remarks').val('');
                    $('#falp_group').val('').change();
                }
            }
        });
    }

    const save_request = () => {

        var employee_num = document.querySelector('#employee_num').value;
        var full_name = document.querySelector('#full_name').value;
        var position = document.querySelector('#position').value;
        var provider = document.querySelector('#provider').value;
        var shift = document.querySelector('#shift').value;
        var group = document.querySelector('#group').value;
        var date_audited = document.querySelector('#date_audited').value;
        var carmaker = document.querySelector('#carmaker').value;
        var carmodel = document.querySelector('#carmodel').value;
        var emline = document.querySelector('#emline').value;
        var emprocess = document.querySelector('#process').value;
        var audit_findings = document.querySelector('#audit_findings').value;
        var audit_details = document.querySelector('#audit_details').value;
        var audited_by = document.querySelector('#audited_by').value;
        var audit_type = document.querySelector('#audit_type').value;
        var criticality_level = document.querySelector('#criticality_level').value;
        var audit_category = document.querySelector('#audit_category').value;
        var problem_identification = document.querySelector('#problem_identification').value;
        var sm_analysis = document.querySelector('#sm_analysis').value;
        var remarks = document.querySelector('#remarks').value;
        var esection = '<?= htmlspecialchars($_SESSION['esection']); ?>';
        var username = '<?= htmlspecialchars($_SESSION['username']); ?>';
        var audit_code = document.querySelector('#auditCode').innerHTML;
        var falp_group = document.querySelector('#falp_group').value;
        var section = document.querySelector('#section').value;
        if (employee_num == '') {
            swal('Notification', 'Please Enter EMPLOYEE ID', 'info');
        } else if (audit_code == '') {
            swal('Notification', 'Missing Audit Code, Please reload your browser!', 'info');
        } else if (full_name == '') {
            swal('Notification', 'Please Enter Full Name', 'info');
        } else if (position == '') {
            swal('Notification', 'Please Enter Position', 'info');
        } else if (provider == '') {
            swal('Notification', 'Please Enter Prodiver', 'info');
        } else if (shift == '') {
            swal('Notification', 'Please Select Shift', 'info');
        } else if (group == '') {
            swal('Notification', 'Please Select Shift Group', 'info');
        } else if (audit_type == '') {
            swal('Notification', 'Please Select Audit Type', 'info');
        } else if (date_audited == '') {
            swal('Notification', 'Please Enter Date Audited', 'info');
        } else if (carmaker == '') {
            swal('Notification', 'Please Enter Car Maker', 'info');
        } else if (carmodel == '') {
            swal('Notification', 'Please Enter Car Model', 'info');
        } else if (emline == '') {
            swal('Notification', 'Please Enter Line No', 'info');
        } else if (emprocess == '') {
            swal('Notification', 'Please Enter Process', 'info');
        } else if (audit_findings == '') {
            swal('Notification', 'Please Enter Audit Findings', 'info');
        } else if (audited_by == '') {
            swal('Notification', 'Please Enter Audited By', 'info');
        } else if (criticality_level == '') {
            swal('Notification', 'Please Select Criticality Level', 'info');
        } else if (audit_category == '') {
            swal('Notification', 'Please Select Audit Category', 'info');
        } else if (problem_identification == '') {
            swal('Notification', 'Please Select Problem Identification', 'info');
        } else if (sm_analysis == '') {
            swal('Notification', 'Please Select SM Analysis', 'info');
        } else if (remarks == '') {
            swal('Notification', 'Please Enter Remarks', 'info');
        } else if (falp_group == '') {
            swal('Notification', 'Please Select Group', 'info');
        } else if (section == '') {
            swal('Notification', 'Please Select Section', 'info');
        } else {
            $.ajax({
                url: '../../process/admin/add_audit_processor.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'insert_audit',
                    employee_num: employee_num,
                    full_name: full_name,
                    position: position,
                    provider: provider,
                    shift: shift,
                    group: group,
                    date_audited: date_audited,
                    carmaker: carmaker,
                    carmodel: carmodel,
                    emline: emline,
                    emprocess: emprocess,
                    audit_findings: audit_findings,
                    audit_details: audit_details,
                    audited_by: audited_by,
                    audit_type: audit_type,
                    criticality_level: criticality_level,
                    audit_category: audit_category,
                    sm_analysis: sm_analysis,
                    problem_identification: problem_identification,
                    remarks: remarks,
                    esection: esection,
                    username: username,
                    audit_code: audit_code,
                    falp_group: falp_group,
                    section: section
                }, success: function (x) {

                    if (x == 'Successfully Saved') {
                        swal('SUCCESS', x, 'success');
                        $('#employee_num').val('');
                        $('#full_name').val('');
                        $('#position').val('');
                        $('#provider').val('');
                        $('#shift').val('');
                        $('#group').val('');
                        $('#date_audited').val('');
                        $('#carmaker').val('');
                        $('#carmodel').val('');
                        $('#emline').val('');
                        $('#emprocess').val('');
                        $('#audit_findings').val('');
                        $('#audit_details').val('');
                        $('#audited_by').val('');
                        $('#audit_type').val('');
                        $('#criticality_level').val('');
                        $('#audit_category').val('');
                        $('#problem_identification').val('');
                        $('#sm_analysis').val('');
                        $('#remarks').val('');
                        $('#falp_group').val('');
                        $('#section').val('');
                        load_prev();
                    }
                    else {

                    }



                }
            });
        }
    }

    const load_prev = () => {
        var audit_code = $('#auditCode').html();

        // console.log(batch);
        $.ajax({
            url: '../../process/admin/add_audit_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'prev_audit',
                audit_code: audit_code
            }, success: function (response) {
                $('#data_preview_audit').html(response);
            }
        });
    }

    const export_audit_findings_list = () => {
        window.open('../../process/export/export_audit_findings_list.php', '_blank');
    }

    const export_process_list = () => {
        window.open('../../process/export/export_process_list.php', '_blank');
    }

    const export_line_no_list = () => {
        window.open('../../process/export/export_line_no_list.php', '_blank');
    }
</script>