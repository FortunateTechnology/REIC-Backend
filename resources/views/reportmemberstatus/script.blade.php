<script>
    pdfMake.fonts = {
        THSarabun: {
            normal: '{{ asset('fonts/THSarabunNew.ttf') }}',
            bold: '{{ asset('fonts/THSarabunNew Bold.ttf') }}',
            italics: '{{ asset('fonts/THSarabunNew Italic.ttf') }}',
            bolditalics: '{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}'
        }
    }
    $(document).ready(function() {
        $(".delete_all_button").click(function() {
            var len = $('input[name="table_records[]"]:checked').length;
            if (len > 0) {

                if (confirm("ยืนยันการลบข้อมูล ?")) {
                    $('form#delete_all').submit();
                }
            } else {
                alert("กรุณาเลือกรายการที่จะลบ");
            }

        });

        $('#check-all').click(function() {
            $(':checkbox.flat').prop('checked', this.checked);
        });

        $(".SDate").datepicker({
            dateFormat: "yy-mm-dd"
        });
        $(".EDate").datepicker({
            dateFormat: "yy-mm-dd"
        });


        //$.noConflict();
        var token = ''
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var startDate;
        var endDate;

        let daterange = () => {


            var startTime = '00:00:00';
            var endTime = '23:59:59';

            var todayRange = [moment(startTime, 'HH:mm:ss'), moment(endTime, 'HH:mm:ss')];
            var yesterdayRange = [moment().subtract(1, 'days').startOf('day').set('hour', 0).set('minute',
                0).set('second', 0), moment().subtract(1, 'days').endOf('day').set('hour', 23).set(
                'minute', 59).set('second', 59)];
            var last7DaysRange = [moment().subtract(6, 'days').startOf('day').set('hour', 0).set('minute',
                0).set('second', 0), moment(endTime, 'HH:mm:ss')];
            var last30DaysRange = [moment().subtract(29, 'days').startOf('day').set('hour', 0).set('minute',
                0).set('second', 0), moment(endTime, 'HH:mm:ss')];

            var currentYear = moment().year();
            var maxYear = moment().year(currentYear).add(1, 'year').format('YYYY-MM-DD');
            var minYear = moment().year(currentYear).subtract(2, 'years').format('YYYY-MM-DD');

            $('#reservation').daterangepicker({
                timePicker: true,
                timePicker24Hour: true,
                timePickerSeconds: true,
                //timePickerIncrement: 5,
                startDate: startDate,
                endDate: endDate,
                showDropdowns: true,
                linkedCalendars: false,
                minDate: minYear,
                maxDate: maxYear,
                ranges: {
                    'วันนี้': todayRange,
                    'เมื่อวานนี้': yesterdayRange,
                    'ย้อนหลัง 7 วัน': last7DaysRange,
                    'ย้อนหลัง 30 วัน': last30DaysRange,
                    'เดือนนี้': [moment().startOf('month'), moment().endOf('month')],
                    'เดือนที่แล้ว': [moment().subtract(1, 'month').startOf('month'), moment()
                        .subtract(1, 'month').endOf('month')
                    ]
                },
                locale: {
                    format: 'YYYY-MM-DD HH:mm:ss',
                    applyLabel: 'ตกลง',
                    cancelLabel: 'ยกเลิก',
                    fromLabel: 'จาก',
                    toLabel: 'ถึง',
                    customRangeLabel: 'เลือกวันที่เอง',
                    daysOfWeek: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
                    monthNames: [
                        'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน',
                        'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
                    ],
                    firstDay: 1
                }
            });

            // Apply the custom date range filter on input change
            $('#reservation').on('apply.daterangepicker', function(ev, picker) {
                table.draw();
                storeFieldValues();
            });
        }

        function datesearch() {
            //.add(1, 'month').add(543, 'year').format('LLLL')
            var currentDate = moment();
            //console.log(currentDate)
            startDate = moment(currentDate).subtract(30, 'days').startOf('day').format('YYYY-MM-DD HH:mm:ss');
            endDate = moment(currentDate).endOf('month').endOf('day').format('YYYY-MM-DD HH:mm:ss');
        }


        function storeFieldValues() {
            var dateStart = $('#reservation').val();
            //var sagent = $('#agen').val();

            // Store values in local storage
            localStorage.setItem('dateStart', dateStart);
            //localStorage.setItem('sagent', sagent);

        }

        function retrieveFieldValues() {
            var saveddateStart = localStorage.getItem('dateStart');
            //var savedsagent = localStorage.getItem('sagent');
            // Set field values from local storage
            if (saveddateStart) {
                var dateParts = saveddateStart.split(' - ');
                startDate = dateParts[0];
                endDate = dateParts[1];
            } else {
                datesearch();
            }

            //console.log(`${startDate} - ${endDate}`)
            $('#reservation').val(`${startDate} - ${endDate}`)

            //if (savedsagent) {
            //    $('#agen').val(savedsagent);
            //}
        }

        retrieveFieldValues();
        daterange();

        $('#resetSearchButton').on('click', async function() {
            localStorage.removeItem('dateStart');
            //localStorage.removeItem('sagent');

            //$('#agen').val('');

            var currentDate = moment();
            var startDate = moment(currentDate).subtract(30, 'days').startOf('day').format(
                'YYYY-MM-DD HH:mm:ss');
            var endDate = moment(currentDate).endOf('month').endOf('day').format(
                'YYYY-MM-DD HH:mm:ss');

            daterange();
            //table = $('#Listview').DataTable(table_option);
            table.draw();
        });

        $('#btnsearch').on('click', function() {
            storeFieldValues();
            //var telp = $('#telp').val();
            table.search('').draw();
            $.fn.dataTable.ext.search.pop();
            /* if (telp !== '') {
                table.column(3).search(telp).draw();
            } */
        });

        var table = $('#Listview').DataTable({
            /*"aoColumnDefs": [
            {
            'bSortable': true,
            'aTargets': [0]
            } //disables sorting for column one
            ],
            "searching": false,
            "lengthChange": false,
            "paging": false,
            'iDisplayLength': 10,
            "sPaginationType": "full_numbers",
            "dom": 'T<"clear">lfrtip',
                */
            dom: 'Bfrtip',
            paging: true,
            searching: false,
            ajax: {
                //data: function(d) {
                //    d.sdate = $('#reservation').val();
                //},
                //complete: function(data) {
                //    Loadchart();
                //}
            },
            serverSide: true,
            processing: true,
            language: {
                loadingRecords: '&nbsp;',
                processing: `<div class="spinner-border text-primary"></div>`,
                "sProcessing": "กำลังดำเนินการ...",
                "sLengthMenu": "แสดง_MENU_ แถว",
                "sZeroRecords": "ไม่พบข้อมูล",
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "sInfoPostFix": "",
                "sSearch": "ค้นหา:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "เริ่มต้น",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "สุดท้าย"
                }
            },

            aaSorting: [
                [0, "desc"]
            ],
            iDisplayLength: 10,
            lengthMenu: [5, 10, 25, 50, 75, 100],
            stateSave: false,
            autoWidth: false,
            buttons: [
                'copy',
                {
                    extend: 'excel',
                    text: 'Excel',
                    title: 'รายงานสถานะสมาชิก',
                    exportOptions: {
                        columns: ':visible:not(.no-print)',
                    },
                    customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];

                        // Customize the header style
                        $('row:first c', sheet).each(function(index) {
                            $(this).attr('s',
                                'customHeaderStyle'); // Apply style to header cells
                        });

                        // Define a custom style for the header cells
                        var styles = xlsx.xl['styles.xml'];
                        var headerStyle =
                            '<cellXfs count="1"><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1"><alignment horizontal="center" vertical="center" wrapText="1" /><font /></xf></cellXfs>';

                        // Add the custom style to the styles
                        $('cellXfs', styles).prepend(headerStyle);
                    }
                },
                'csv',
                { // กำหนดพิเศษเฉพาะปุ่ม pdf
                    "extend": 'pdfHtml5', // ปุ่มสร้าง pdf ไฟล์
                    "text": 'PDF', // ข้อความที่แสดง
                    "pageSize": 'A4', // ขนาดหน้ากระดาษเป็น A4
                    "title": 'รายงานสถานะสมาชิก',
                    "download": 'open',
                    exportOptions: {
                        columns: ':visible:not(.no-print)',
                    },
                    customize: function(doc) {
                        doc.defaultStyle = {
                            font: 'THSarabun',
                            fontSize: 16
                        };
                        doc.content.splice(0, 1);
                        doc.pageMargins = [20, 150, 20, 30];
                        doc.styles.tableHeader.fontSize = 16;
                        doc.styles.tableBodyOdd.alignment = 'center';
                        doc.styles.tableBodyEven.alignment = 'center';
                        doc.styles.tableFooter.fontSize = 16;
                        
                        doc['header'] = (function() {
                            return {
                                columns: [
                                    {
                                        text: [  
                                                { text: 'REPORT ', alignment: 'right', fontSize: 42, margin: [0, 50, 70, 0] },
                                                '\n',
                                                //{ text: 'ข้อมูลวันที่ ' + $('#reservation').val(), alignment: 'left', fontSize: 18, margin: [0, 50, 70, 0] },
                                                //'\n',
                                                { text: 'Report : รายงานสถานะสมาชิก', alignment: 'left', fontSize: 18, margin: [0, 50, 70, 0] },
                                                '\n',
                                                { text: 'Report By : {{ Auth::user()->name }}', alignment: 'left', fontSize: 18, margin: [0, 0, 70, 0] }
                                            ]
                                    }
                                ],
                                margin: 20
                            }
                        });

                        doc.content[0].table.widths = [40, 300, '*'];
                        var objLayout = {};
                        objLayout['hLineWidth'] = function(i) {
                            return .5;
                        };
                        objLayout['vLineWidth'] = function(i) {
                            return .5;
                        };
                        objLayout['hLineColor'] = function(i) {
                            return '#bfbfbf';
                        };
                        objLayout['vLineColor'] = function(i) {
                            return '#bfbfbf';
                        };
                        objLayout['paddingLeft'] = function(i) {
                            return 4;
                        };
                        objLayout['paddingRight'] = function(i) {
                            return 4;
                        };
                        objLayout['paddingTop'] = function(i) {
                            return 3;
                        };
                        objLayout['paddingBottom'] = function(i) {
                            return 3;
                        };
                        doc.content[0].layout = objLayout;

                        for (var i = 1; i < doc.content[0].table.body.length; i++) {
                            doc.content[0].table.body[i][0].alignment = 'center';
                            doc.content[0].table.body[i][1].alignment = 'left';
                            //doc.content[0].table.body[i][2].alignment = 'center';
                        }
                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    title: 'รายงานสถานะสมาชิก',
                    exportOptions: {
                        columns: ':visible:not(.no-print)',
                        format: {
                            body: function(data, row, column, node) {
                                // You can set your font here
                                $(node).css('font-family', 'THSarabun');
                                return data;
                            }
                        }
                    },
                    customize: function(win) {
                        // Customize the print layout
                        $(win.document.body).prepend('<img style="position:absolute; top:0; left:470;width:100" src='+logobase64+'>')
                        $(win.document.body).find('h1').css('text-align', 'center').css('font-size','16px').css('margin-top','105px');
                        $(win.document.body).find('table').addClass('display').css('font-size','12px')
                                            .removeClass('dataTable').css('margin-top','5px').css('margin-bottom','60px');
                        $(win.document.body).find('table.dataTable th, table.dataTable td').css(
                            'border', '1px solid black');
                        $(win.document.body).find('table.dataTable th').css('background-color',
                            '#f2f2f2');
                        $(win.document.body).find('table.dataTable td:nth-child(0)').css(
                            'width', '50px');
                    }
                }
            ],
            layout: {
                hLineWidth: function(i, node) {
                    return 1; // Border width for horizontal lines
                },
                vLineWidth: function(i, node) {
                    return 1; // Border width for vertical lines
                },
                hLineColor: function(i, node) {
                    return '#bfbfbf'; // Border color for horizontal lines
                },
                vLineColor: function(i, node) {
                    return '#bfbfbf'; // Border color for vertical lines
                }
            },
            responsive: true,
            sPaginationType: "full_numbers",
            dom: 'T<"clear">lfrtip',
            columns: [
                {
                    data: 'id',
                    name: 'id',
                    orderable: false,
                    searchable: false,
//                    className: 'no-print'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ]
        });
        
        $('#exportXLSButton').on('click', function() {
            table.button('1').trigger();
        });
        $('#exportPDFButton').on('click', function() {
            table.button('3').trigger();
        });

/*
        $('#exportPrintButton').on('click', function() {
            table.button('4').trigger();
        });

        $('#exportPDFButton').on('click', function() {
            var spinHandle = loadingOverlay().activate();
            table.page.len(-1).draw();
            setTimeout(function() {
                table.button('3').trigger();
                loadingOverlay().cancel(spinHandle);
                setTimeout(function() {
                    table.page.len(10).draw();
                }, 1000);
            }, 3000);
        });

        $('#exportXLSButton').on('click', function() {
            var spinHandle = loadingOverlay().activate();
            table.page.len(-1).draw();
            setTimeout(function() {
                table.button('1').trigger();
                loadingOverlay().cancel(spinHandle);
                setTimeout(function() {
                    table.page.len(10).draw();
                }, 1000);
            }, 3000);
        });
*/        
    });

</script>
