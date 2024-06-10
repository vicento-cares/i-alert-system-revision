<script type="text/javascript">
    // Revisions (Vince)
    const fetch_section_dropdown = () => {
        let falp_group = document.getElementById('falp_group_update').value;

        $.ajax({
            url: '../../process/admin/sections.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_section_dropdown',
                falp_group: falp_group
            },
            success: function (response) {
                $('#section_update').html(response);
            }
        });
    }

    const admin_closed = () => {
        $('#spinner').css('display', 'block');
        var empid = document.getElementById('emp_id_admin').value;
        var fname = document.getElementById('fname_admin').value;
        var lname = document.getElementById('line_no_admin').value;
        var dateFrom = document.getElementById('recievedfrom_closed_admin').value;
        var dateTo = document.getElementById('recievedto_closed_admin').value;
        var carmaker = document.getElementById('carmaker_admin').value;
        var carmodel = document.getElementById('car_model_admin').value;
        var audit_type = document.getElementById('audit_type_admin').value;
        var position = document.getElementById('position_admin').value;
        var audit_categ = document.getElementById('audit_categ_admin').value;
        var group = document.getElementById('group_admin').value;
        var shift = document.getElementById('shift_admin').value;
        var section = document.getElementById('section_admin').value;
        var falp_group = document.getElementById('falp_group').value;
        var provider = document.getElementById('provider_closed').value;

        $.ajax({
            url: '../../process/admin/list_of_audit_closed_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_closed_admin',
                empid: empid,
                fname: fname,
                lname: lname,
                dateFrom: dateFrom,
                dateTo: dateTo,
                carmaker: carmaker,
                carmodel: carmodel,
                audit_type: audit_type,
                position: position,
                audit_categ: audit_categ,
                group: group,
                shift: shift,
                section: section,
                falp_group: falp_group,
                provider: provider
            }, success: function (response) {
                document.getElementById('audited_closed_admin').innerHTML = response;
                $('#spinner').fadeOut(function () {
                });
            }
        });
    }

    function export_admin_audited_closed(table_id, separator = ',') {
        // Select rows from table_id
        var rows = document.querySelectorAll('table#' + table_id + ' tr');
        // Construct csv
        var csv = [];
        for (var i = 0; i < rows.length; i++) {
            var row = [], cols = rows[i].querySelectorAll('td, th');
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
        var filename = 'List_of_Audited_Closed' + '_' + new Date().toLocaleDateString() + '.csv';
        var link = document.createElement('a');
        link.style.display = 'none';
        link.setAttribute('target', '_blank');
        link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    // Revisions (Vince)
    const get_set = (param) => {
        var data = param.split('~!~');
        var id = data[0];
        var employee_num = data[1];
        var full_name = data[2];
        var position = data[3];
        var provider = data[4];
        var shift = data[5];
        var group = data[6];
        var audit_type = data[7];
        var audited_categ = data[8];
        var car_maker = data[9];
        var car_model = data[10];
        var line_no = data[11];
        var process = data[12];
        var audit_findings = data[13];
        var audited_by = data[14];
        var date_audited = data[15];
        var remarks = data[16];
        var section = data[17];
        var falp_group = data[18];

        document.getElementById('id_update').value = id;
        document.getElementById('employee_num_update').value = employee_num;
        document.getElementById('full_name_update').value = full_name;
        document.getElementById('position_update').value = position;
        document.getElementById('provider_update').value = provider;
        document.getElementById('shift_update').value = shift;
        document.getElementById('group_update').value = group;
        document.getElementById('audit_type_update').value = audit_type;
        document.getElementById('audit_categ_update').value = audited_categ;
        document.getElementById('carmaker_update').value = car_maker;
        document.getElementById('carmodel_update').value = car_model;
        document.getElementById('emline_update').value = line_no;
        document.getElementById('process_update').value = process;
        document.getElementById('audit_findings_update').value = audit_findings;
        document.getElementById('audited_by_update').value = audited_by;
        document.getElementById('date_audited_update').value = date_audited;
        document.getElementById('remarks_update').value = remarks;
        // document.getElementById('section_update').value = section;
        document.getElementById('falp_group_update').value = falp_group;

        fetch_section_dropdown();

        setTimeout(() => {
            document.getElementById('section_update').value = section;
        }, 500);

    }

    // Revisions (Vince)
    const update_audit_data = () => {
        var id = document.getElementById('id_update').value;
        var employee_num = document.getElementById('employee_num_update').value;
        var full_name = document.getElementById('full_name_update').value;
        var position = document.getElementById('position_update').value;
        var provider = document.getElementById('provider_update').value;
        var shift = document.getElementById('shift_update').value;
        var groups = document.getElementById('group_update').value;
        var audit_type = document.getElementById('audit_type_update').value;
        var audit_categ = document.getElementById('audit_categ_update').value;
        var carmaker = document.getElementById('carmaker_update').value;
        var carmodel = document.getElementById('carmodel_update').value;
        var emline = document.getElementById('emline_update').value;
        var process = document.getElementById('process_update').value;
        var audit_findings = document.getElementById('audit_findings_update').value;
        var audited_by = document.getElementById('audited_by_update').value;
        var date_audited = document.getElementById('date_audited_update').value;
        var remarks = document.getElementById('remarks_update').value;
        var section = document.getElementById('section_update').value;
        var falp_group = document.getElementById('falp_group_update').value;

        if (section == '') {
            swal("Notification", "Please select section.", "info");
        } else {
            $.ajax({
                url: '../../process/admin/update_audit_processor.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'updateaudit',
                    id: id,
                    employee_num: employee_num,
                    full_name: full_name,
                    position: position,
                    provider: provider,
                    shift: shift,
                    groups: groups,
                    audit_type: audit_type,
                    audit_categ: audit_categ,
                    carmaker: carmaker,
                    carmodel: carmodel,
                    emline: emline,
                    process: process,
                    audit_findings: audit_findings,
                    audited_by: audited_by,
                    date_audited: date_audited,
                    remarks: remarks,
                    section: section,
                    falp_group: falp_group,

                },
                success: function (response) {
                    console.log(response);
                    if (response == 'success') {
                        admin_closed();
                        swal('SUCCESS!', 'Success', 'success');

                    } else {
                        swal('FAILED', 'FAILED', 'error');
                    }
                }
            });
        }
    }
</script>