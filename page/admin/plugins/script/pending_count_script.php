<script type="text/javascript">
    $(document).ready(function () {
        fetch_other_group_dropdown();
        fetch_section_dropdown("First Process");
        fetch_section_dropdown("Secondary 1 Process");
        fetch_section_dropdown("Secondary 2 Process");
        fetch_section_dropdown("QA");
        load_default_pending_count();
    });

    // Revisions (Vince)
    const fetch_other_group_dropdown = () => {
        $.ajax({
            url: '../../process/admin/sections.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_other_group_dropdown'
            },
            success: function (response) {
                $('#other_pending').html(response);
                $('#other_pcm').html(response);
            }
        });
    }

    // Revisions (Vince)
    const fetch_section_dropdown = falp_group => {
        $.ajax({
            url: '../../process/admin/sections.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_section_dropdown',
                falp_group: falp_group
            },
            success: function (response) {
                switch (falp_group) {
                    case "First Process":
                        $('#section_fp').html(response);
                        break;
                    case "Secondary 1 Process":
                        $('#section_sp1').html(response);
                        break;
                    case "Secondary 2 Process":
                        $('#section_sp2').html(response);
                        break;
                    case "QA":
                        $('#section_qa').html(response);
                        break;
                    default:
                        break;
                }
            }
        });
    }

    const load_default_pending_count = () => {
        $.ajax({
            url: '../../process/admin/pending_count_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_default_pending_count'
            },
            success: function (response) {
                $('#pending_count_list').html(response);
            }
        });
    }

    const load_count = () => {
        var dateFrom = document.getElementById('auditeddatefrom').value;
        var dateTo = document.getElementById('auditeddateto').value;
        var audit_type = document.getElementById('audit_type').value;
        var other_pending = document.getElementById('other_pending').value;
        var provider_pending = document.getElementById('provider_pending').value;

        $.ajax({
            url: '../../process/admin/pending_count_processor.php',
            type: 'POST',
            cache: false,
            dataType: 'json',
            data: {
                method: 'count_pending_count',
                dateFrom: dateFrom,
                dateTo: dateTo,
                audit_type: audit_type,
                other_pending: other_pending,
                provider_pending: provider_pending
            },
            success: function (response) {
                response.forEach(item => {
                    document.getElementById(`count_${item.section_id}`).innerHTML = item.total;
                    document.getElementById(`grand_total_${item.section_id}`).innerHTML = item.grand_total;
                });
            }
        });
    }

    const load_pending_count_modal = el => {
        var section_id = el.dataset.section_id;
        var section = el.dataset.section;
        var falp_group = el.dataset.falp_group;

        document.getElementById('section_id_pcm').value = section_id;
        document.getElementById('section_pcm').value = section;
        document.getElementById('pending_count_modal_name').innerHTML = section;
        document.getElementById('falp_group_pcm').value = falp_group;

        var other_pcm_dropdown = document.getElementById("other_pcm_dropdown");
        var provider_pcm_dropdown = document.getElementById("provider_pcm_dropdown");

        document.getElementById("other_pcm").value = '';
        document.getElementById("provider_pcm").value = '';

        document.getElementById("preview_pcm_data").innerHTML = '';

        if (section == 'Other Group') {
            other_pcm_dropdown.classList.remove("d-none");
            provider_pcm_dropdown.classList.add("d-none");
        } else if (section == 'Provider') {
            other_pcm_dropdown.classList.add("d-none");
            provider_pcm_dropdown.classList.remove("d-none");
        } else {
            other_pcm_dropdown.classList.add("d-none");
            provider_pcm_dropdown.classList.add("d-none");
        }
    }

    const fetch_pending_count = () => {
        var dateFrom = document.getElementById('auditedpcmdatefrom').value;
        var dateTo = document.getElementById('auditedpcmdateto').value;
        var empid = document.getElementById('empid_pcm').value;
        var fname = document.getElementById('fname_pcm').value;
        var line = document.getElementById('linen_pcm').value;
        var carmaker = document.getElementById('carmaker_pcm').value;
        var carmodel = document.getElementById('carmodel_pcm').value;
        var position = document.getElementById('position_pcm').value;
        var audit_type = document.getElementById('audit_type_pcm').value;

        var section = '';
        var other_pcm = document.getElementById('other_pcm').value;
        if (other_pcm != '') {
            section = other_pcm;
        } else {
            section = document.getElementById('section_pcm').value;
        }

        var falp_group = document.getElementById('falp_group_pcm').value;
        var provider = document.getElementById('provider_pcm').value;

        $.ajax({
            url: '../../process/admin/pending_count_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_pending_count',
                dateFrom: dateFrom,
                dateTo: dateTo,
                empid: empid,
                fname: fname,
                line: line,
                carmaker: carmaker,
                carmodel: carmodel,
                position: position,
                audit_type: audit_type,
                section: section,
                falp_group: falp_group,
                provider: provider
            },
            success: function (response) {
                document.getElementById('preview_pcm_data').innerHTML = response;
            }
        });
    }

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
        var criticality_level = data[8];
        var car_maker = data[9];
        var car_model = data[10];
        var line_no = data[11];
        var process = data[12];
        var audit_findings = data[13];
        var audited_by = data[14];
        var date_audited = data[15];
        var remarks = data[16];
        var problem_identification = data[17];
        var sm_analysis = data[18];

        document.getElementById('id_update').value = id;
        document.getElementById('employee_num_update').value = employee_num;
        document.getElementById('full_name_update').value = full_name;
        document.getElementById('position_update').value = position;
        document.getElementById('provider_update').value = provider;
        document.getElementById('shift_update').value = shift;
        document.getElementById('group_update').value = group;
        document.getElementById('audit_type_update').value = audit_type;
        document.getElementById('criticality_level_update').value = criticality_level;
        document.getElementById('carmaker_update').value = car_maker;
        document.getElementById('carmodel_update').value = car_model;
        document.getElementById('emline_update').value = line_no;
        document.getElementById('process_update').value = process;
        document.getElementById('audit_findings_update').value = audit_findings;
        document.getElementById('audited_by_update').value = audited_by;
        document.getElementById('date_audited_update').value = date_audited;
        document.getElementById('remarks_update').value = remarks;
        document.getElementById('problem_identification_update').value = problem_identification;
        document.getElementById('sm_analysis_update').value = sm_analysis;
    }

    const update_audit_data = () => {
        var id = document.getElementById('id_update').value;
        var employee_num = document.getElementById('employee_num_update').value;
        var full_name = document.getElementById('full_name_update').value;
        var position = document.getElementById('position_update').value;
        var provider = document.getElementById('provider_update').value;
        var shift = document.getElementById('shift_update').value;
        var groups = document.getElementById('group_update').value;
        var audit_type = document.getElementById('audit_type_update').value;
        var criticality_level = document.getElementById('criticality_level_update').value;
        var problem_identification = document.querySelector('#problem_identification_update').value;
        var sm_analysis = document.querySelector('#sm_analysis_update').value;
        var carmaker = document.getElementById('carmaker_update').value;
        var carmodel = document.getElementById('carmodel_update').value;
        var emline = document.getElementById('emline_update').value;
        var process = document.getElementById('process_update').value;
        var audit_findings = document.getElementById('audit_findings_update').value;
        var audited_by = document.getElementById('audited_by_update').value;
        var date_audited = document.getElementById('date_audited_update').value;
        var remarks = document.getElementById('remarks_update').value;

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
                criticality_level: criticality_level,
                problem_identification: problem_identification,
                sm_analysis: sm_analysis,
                carmaker: carmaker,
                carmodel: carmodel,
                emline: emline,
                process: process,
                audit_findings: audit_findings,
                audited_by: audited_by,
                date_audited: date_audited,
                remarks: remarks

            }, success: function (response) {
                if (response == 'success') {
                    swal('SUCCESS!', 'Success', 'success');
                } else {
                    swal('FAILED', 'FAILED', 'error');
                }
            }
        });
    }

    function export_pcm_pending(table_id, separator = ',') {
        var section = document.getElementById('section_pcm').value;
        section = section.replace(" ", "");
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
        var filename = 'List_of_Audit_Findings_' + section + '_' + new Date().toLocaleDateString() + '.csv';
        var link = document.createElement('a');
        link.style.display = 'none';
        link.setAttribute('target', '_blank');
        link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    const count = () => {
        var employee_num_count = document.querySelector('#employee_num_count').value;
        var full_name_count = document.getElementById('full_name_count').value;
        $.ajax({
            url: '../../process/admin/count_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'audit_count',
                employee_num_count: employee_num_count,
                full_name_count: full_name_count
            }, success: function (response) {
                $('#count_data').html(response);
            }
        });
    }

    const uncheck_all_pcm = () => {
        var select_all = document.getElementById('check_all_audit_pcm');
        select_all.checked = false;
        $('.singleCheck').each(function () {
            this.checked = false;
        });
    }
    const select_all_func_pcm = () => {
        var select_all = document.getElementById('check_all_audit_pcm');
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

    const delete_pcm = () => {
        var arr = [];
        $('input.singleCheck:checkbox:checked').each(function () {
            arr.push($(this).val());
        });
        var numberOfChecked = arr.length;
        if (numberOfChecked > 0) {
            $.ajax({
                url: '../../process/admin/pending_count_processor.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'delete_pending_count',
                    id: arr
                },
                success: function (response) {
                    console.log(response);
                    if (response == 'success') {
                        fetch_pending_count();
                        uncheck_all_pcm();
                        swal('SUCCESS!', 'Success', 'success');
                    } else {
                        swal('FAILED', 'FAILED', 'error');
                    }
                }
            });
        }
    }
</script>