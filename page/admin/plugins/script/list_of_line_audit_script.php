<script type="text/javascript">
    // Revisions (Vince)
    const fetch_section_dropdown = () => {
        let falp_group = document.getElementById('falp_group_line_update').value;

        $.ajax({
            url: '../../process/admin/sections.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_section_dropdown',
                falp_group: falp_group
            },
            success: function (response) {
                $('#section_line_update').html(response);
            }
        });
    }

    const load_list_of_line_audit_findings = () => {
        $('#spinner_line').css('display', 'block');
        var line_n = document.getElementById('line_n').value;
        var dateFrom = document.getElementById('lineauditeddatefrom').value;
        var dateTo = document.getElementById('lineauditeddateto').value;
        var carmaker = document.getElementById('car_maker').value;
        var carmodel = document.getElementById('car_model').value;
        var criticality_level = document.getElementById('crit_level').value;
        var section = document.getElementById('section_search').value;
        var falp_group = document.getElementById('falp_group_search').value;
        $.ajax({
            url: '../../process/admin/list_of_line_audit_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_line_audit_list',
                dateFrom: dateFrom,
                dateTo: dateTo,
                line_n: line_n,
                carmaker: carmaker,
                carmodel: carmodel,
                criticality_level: criticality_level,
                section: section,
                falp_group: falp_group

            },
            success: function (response) {
                // console.log(response);
                document.getElementById('line_audit_data').innerHTML = response;
                $('#spinner_line').fadeOut(function () {

                });


            }
        });

    }

    const uncheck_all = () => {
        var select_all = document.getElementById('check_all_line');
        select_all.checked = false;
        $('.singleCheck').each(function () {
            this.checked = false;
        });
    }
    const select_all_func = () => {
        var select_all = document.getElementById('check_all_line');
        if (select_all.checked == true) {
            console.log('check');
            $('.singleCheck').each(function () {
                this.checked = true;
            });
        } else {
            console.log('uncheck');
            $('.singleCheck').each(function () {
                this.checked = false;
            });
        }
    }

    function export_Line_audit_list(table_id, separator = ',') {
        // Select rows from table_id
        var rows = document.querySelectorAll('table#' + table_id + ' tr');
        // Construct csv
        var csv = [];
        for (var i = 0; i < rows.length; i++) {
            var row = [],
                cols = rows[i].querySelectorAll('td, th');
            for (var j = 0; j < cols.length; j++) {
                var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
                data = data.replace(/"/g, '""');
                // Push escaped string
                row.push('"' + data + '"');
            }
            csv.push(row.join(separator));
        }
        var csv_string = csv.join('\n');
        // Download it
        var filename = 'List_of_Line_Audit_Findings' + '_' + new Date().toLocaleDateString() + '.csv';
        var link = document.createElement('a');
        link.style.display = 'none';
        link.setAttribute('target', '_blank');
        link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    const delete_lineaudit = () => {
        var arr = [];
        $('input.singleCheck:checkbox:checked').each(function () {
            arr.push($(this).val());
        });
        var numberOfChecked = arr.length;
        if (numberOfChecked > 0) {


            $.ajax({
                url: '../../process/admin/delete_line_audit_processor.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'deletelineaudit',
                    id: arr


                },
                success: function (response) {
                    console.log(response);
                    if (response == 'success') {
                        load_list_of_line_audit_findings();
                        uncheck_all();
                        swal('SUCCESS!', 'Success', 'success');

                    } else {
                        swal('FAILED', 'FAILED', 'error');
                    }
                }
            });
        }
    }

    const get_set_line = (param) => {
        console.log(param);
        var data = param.split('~!~');
        var id = data[0];
        var shift = data[1];
        var groups = data[2];
        var date_audited = data[3];
        var car_maker = data[4];
        var car_model = data[5];
        var line_no = data[6];
        var process = data[7];
        var audit_findings = data[8];
        var audit_details = data[9];
        var audited_by = data[10];
        var criticality_level = data[11];
        var remarks = data[12];
        var audit_type = data[13];
        var section = data[14];
        var falp_group = data[15];
        var problem_identification = data[16];

        document.getElementById('id_line_update').value = id;
        document.getElementById('shift_line_update').value = shift;
        document.getElementById('group_line_update').value = groups;
        document.getElementById('date_line_audited_update').value = date_audited;
        document.getElementById('carmaker_line_update').value = car_maker;
        document.getElementById('carmodel_line_update').value = car_model;
        document.getElementById('emline_line_update').value = line_no;
        document.getElementById('process_line_update').value = process;
        document.getElementById('line_audit_findings_update').value = audit_findings;
        document.getElementById('line_audit_details_update').value = audit_details;
        document.getElementById('line_audited_by_update').value = audited_by;
        document.getElementById('line_criticality_level_update').value = criticality_level;
        document.getElementById('remarks_line_update').value = remarks;
        document.getElementById('line_audit_type_update').value = audit_type;
        //   document.getElementById('section_line_update').value = section;
        document.getElementById('falp_group_line_update').value = falp_group;
        document.getElementById('line_problem_identification_update').value = problem_identification;

        fetch_section_dropdown();

        setTimeout(() => {
            document.getElementById('section_line_update').value = section;
        }, 500);

    }

    const update_lineaudit = () => {

        var id = document.getElementById('id_line_update').value;
        var shift = document.getElementById('shift_line_update').value;
        var groups = document.getElementById('group_line_update').value;
        var audit_type = document.getElementById('audit_type_update').value;
        var criticality_level = document.getElementById('line_criticality_level_update').value;
        var problem_identification = document.querySelector('#line_problem_identification_update').value;
        var carmaker = document.getElementById('carmaker_line_update').value;
        var carmodel = document.getElementById('carmodel_line_update').value;
        var emline = document.getElementById('emline_line_update').value;
        var process = document.getElementById('process_line_update').value;
        var audit_findings = document.getElementById('line_audit_findings_update').value;
        var audit_details = document.getElementById('line_audit_details_update').value;
        var audited_by = document.getElementById('line_audited_by_update').value;
        var audit_type = document.getElementById('line_audit_type_update').value;
        var date_audited = document.getElementById('date_line_audited_update').value;
        var remarks = document.getElementById('remarks_line_update').value;
        var section = document.getElementById('section_line_update').value;
        var falp_group = document.getElementById('falp_group_line_update').value;

        if (section == '') {
            swal("Notification", "Please select section.", "info");
        } else {
            $.ajax({
                url: '../../process/admin/update_line_audit_processor.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'updatelineaudit',
                    id: id,
                    shift: shift,
                    groups: groups,
                    audit_type: audit_type,
                    criticality_level: criticality_level,
                    problem_identification: problem_identification,
                    carmaker: carmaker,
                    carmodel: carmodel,
                    emline: emline,
                    process: process,
                    audit_findings: audit_findings,
                    audit_details: audit_details,
                    audited_by: audited_by,
                    date_audited: date_audited,
                    remarks: remarks,
                    audit_type: audit_type,
                    section: section,
                    falp_group: falp_group
                },
                success: function (response) {
                    console.log(response);
                    if (response == 'success') {
                        load_list_of_line_audit_findings();
                        uncheck_all();
                        swal('SUCCESS!', 'Success', 'success');

                    } else {
                        swal('FAILED', 'FAILED', 'error');
                    }
                }
            });
        }

    }
</script>