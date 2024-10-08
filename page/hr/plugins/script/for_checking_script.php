<script type="text/javascript">

    const load_list_of_audited_findings_hr = () => {
        $('#spinner').css('display', 'block');
        var empid = document.getElementById('empid_audited_fass_checking').value;
        var fname = document.getElementById('fname_audited_fass_checking').value;
        var lname = document.getElementById('linename_audited_fass_checking').value;
        var dateFrom = document.getElementById('hrauditedlistdatefrom').value;
        var dateTo = document.getElementById('hrauditedlistdateto').value;
        var esection = '<?= htmlspecialchars($_SESSION['esection']); ?>';
        var carmaker = document.getElementById('carmaker_checking').value;
        var carmodel = document.getElementById('carmodel_checking').value;
        var position = document.getElementById('position_checking').value;
        var audit_type = document.getElementById('audit_type_checking').value;

        $.ajax({
            url: '../../process/hr/for_checking_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_audited_list_hr',
                dateFrom: dateFrom,
                dateTo: dateTo,
                empid: empid,
                fname: fname,
                esection: esection,
                lname: lname,
                carmaker: carmaker,
                carmodel: carmodel,
                position: position,
                audit_type: audit_type

            }, success: function (response) {
                document.getElementById('audited_data_hr').innerHTML = response;
                $('#spinner').fadeOut(function () {

                });
            }
        });
    }

    // check all and uncheck
    const uncheck_all = () => {
        var select_all = document.getElementById('check_all_hr');
        select_all.checked = false;
        $('.singleCheck').each(function () {
            this.checked = false;
        });
    }
    const select_all_func = () => {
        var select_all = document.getElementById('check_all_hr');
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

    const update_status_hr = () => {
        var arr = [];
        $('input.singleCheck:checkbox:checked').each(function () {
            arr.push($(this).val());
        });
        var numberOfChecked = arr.length;
        if (numberOfChecked > 0) {

            var status = $('#status_hr').val();

            if (status == '') {
                swal('ALERT', 'Select Status!', 'info');

            } else {

                $.ajax({
                    url: '../../process/hr/for_checking_processor.php',
                    type: 'POST',
                    cache: false,
                    data: {
                        method: 'update_hr',
                        id: arr,
                        status: status


                    }, success: function (response) {
                        console.log(response);
                        if (response == 'success') {
                            load_list_of_audited_findings_hr();
                            uncheck_all();
                            swal('SUCCESS!', 'Success', 'success');
                            $('#status_hr').val('');
                        } else {
                            swal('FAILED', 'FAILED', 'error');
                        }
                    }
                });
            }
        }
    }

    function export_audited_list_hr(table_id, separator = ',') {
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
        var filename = 'List_of_Audit_Findings_for_Checking' + '_' + new Date().toLocaleDateString() + '.csv';
        var link = document.createElement('a');
        link.style.display = 'none';
        link.setAttribute('target', '_blank');
        link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>