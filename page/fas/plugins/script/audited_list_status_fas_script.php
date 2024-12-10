<script type="text/javascript">

    $(document).ready(function () {
        fetch_section_dropdown();
    });

    // Revisions (Vince)
    const fetch_section_dropdown = () => {
        let falp_group = '<?= htmlspecialchars($_SESSION['falp_group']); ?>';

        $.ajax({
            url: '../../process/admin/sections.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_section_dropdown',
                falp_group: falp_group
            },
            success: function (response) {
                $('#section_status').html(response);
            }
        });
    }

    const load_list_of_audited_findings_fass_status = () => {
        $('#spinner').css('display', 'block');
        var empid = document.getElementById('empid_audited_fass_status').value;
        var fname = document.getElementById('fname_audited_fass_status').value;
        var lname = document.getElementById('linename_audited_fass_status').value;
        var dateFrom = document.getElementById('fasauditedliststatusdatefrom').value;
        var dateTo = document.getElementById('fasauditedliststatusdateto').value;
        var position = document.getElementById('position_status').value;
        var carmaker = document.getElementById('carmaker_status').value;
        var carmodel = document.getElementById('carmodel_status').value;
        var audit_type = document.getElementById('audit_type_status').value;
        var esection = '<?= htmlspecialchars($_SESSION['esection']); ?>';
        var criticality_level = document.getElementById('criticality_level_status').value;
        var section = document.getElementById('section_status').value;
        var falp_group = '<?= htmlspecialchars($_SESSION['falp_group']); ?>';
        var group = document.getElementById('groups_fas_status').value;
        var shift = document.getElementById('shifts_fas_status').value;
        var audit_category = document.getElementById('audit_category_search').value;

        $.ajax({
            url: '../../process/fas/audited_list_status_fas_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_audited_list_fass_status',
                dateFrom: dateFrom,
                dateTo: dateTo,
                empid: empid,
                fname: fname,
                esection: esection,
                lname: lname,
                position: position,
                carmaker: carmaker,
                carmodel: carmodel,
                audit_type: audit_type,
                criticality_level: criticality_level,
                section: section,
                falp_group: falp_group,
                group: group,
                shift: shift,
                audit_category: audit_category

            }, success: function (response) {
                document.getElementById('audited_data_fass_status').innerHTML = response;
                $('#spinner').fadeOut(function () {

                });
            }
        });
    }

    function export_audited_list_fas_status(table_id, separator = ',') {
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
        var filename = 'FAS_List_of_Audited_Findings_With_Status' + '_' + new Date().toLocaleDateString() + '.csv';
        var link = document.createElement('a');
        link.style.display = 'none';
        link.setAttribute('target', '_blank');
        link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    // check all and uncheck
    const uncheck_all = () => {
        var select_all = document.getElementById('check_all_statuss');
        select_all.checked = false;
        $('.singleCheck').each(function () {
            this.checked = false;
        });
    }
    const select_all_func = () => {
        var select_all = document.getElementById('check_all_statuss');
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


    const update_statuss = () => {
        var arr = [];
        $('input.singleCheck:checkbox:checked').each(function () {
            arr.push($(this).val());
        });
        var numberOfChecked = arr.length;
        if (numberOfChecked > 0) {

            var status = $('#status_fass').val();
            var update_by = '<?= htmlspecialchars($_SESSION['username']); ?>';
            // console.log(update_by);
            if (status == 'update_by') {
                swal('ALERT', 'Select Status!', 'info');

            } else {

                $.ajax({
                    url: '../../process/fas/audited_list_status_fas_processor.php',
                    type: 'POST',
                    cache: false,
                    data: {
                        method: 'update_fass',
                        id: arr,
                        status: status,
                        update_by: update_by

                    }, success: function (response) {
                        console.log(response);
                        // if (response == 'success') {
                        //  load_list_of_audited_findings_fass_status();
                        //  uncheck_all();
                        //     swal('SUCCESS!', 'Success', 'success');
                        //     $('#status_fass').val('');
                        // }else{
                        //     swal('FAILED', 'FAILED', 'error');
                        // }
                        if (response == 'success') {
                            swal('SUCCESS!', 'Success', 'success');
                            load_list_of_audited_findings_fass_status();
                            uncheck_all();
                            swal('SUCCESS!', 'Success', 'success');
                            $('#status_fass').val('');
                        } else if (response == 'select ir status') {
                            swal('Information', 'Select IR Status', 'info');
                        } else {
                            swal('Information', 'Select IR Status', 'info');
                        }
                    }
                });
            }
        }
    }


    const sent_date = () => {
        var arr = [];
        $('input.singleCheck:checkbox:checked').each(function () {
            arr.push($(this).val());
        });
        var numberOfChecked = arr.length;
        if (numberOfChecked > 0) {


            $.ajax({
                url: '../../process/fas/audited_list_status_fas_processor.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'send',
                    id: arr,
                    status: status


                }, success: function (response) {
                    console.log(response);
                    if (response == 'success') {
                        load_list_of_audited_findings_fass_status();
                        uncheck_all();
                        swal('SUCCESS!', 'Success', 'success');

                    } else {
                        swal('FAILED', 'FAILED', 'error');
                    }
                }
            });
        }
    }

    const close_data = () => {
        var arr = [];
        $('input.singleCheck:checkbox:checked').each(function () {
            arr.push($(this).val());
        });
        var numberOfChecked = arr.length;
        if (numberOfChecked > 0) {
            var update_by = '<?= htmlspecialchars($_SESSION['username']); ?>';

            $.ajax({
                url: '../../process/fas/audited_list_status_fas_processor.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'closed',
                    id: arr,
                    update_by: update_by


                }, success: function (response) {
                    // console.log(response);
                    // if (response == 'success') {


                    // }else{
                    //     swal('FAILED', 'FAILED', 'error');
                    // }
                    if (response == 'error') {
                        swal('FAILED', 'FAILED', 'error');
                    } else {
                        load_list_of_audited_findings_fass_status();
                        uncheck_all();
                        swal('SUCCESS!', 'Success', 'success');
                    }
                }
            });
        }
    }	
</script>