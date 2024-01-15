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
        $('#download_bar').click(function(event) {

var chartContainer = document.querySelector("#bar_graph");
html2canvas(chartContainer).then(canvas => {
    var imgData = canvas.toDataURL("image/png");
    let docDefinition = {
    defaultStyle: {
        font: 'THSarabun',
        fontSize: 16
    },
    content: {
        image: imgData,
        width: 570
},
    pageMargins: [20, 150, 20, 30],
    styles: {
        tableHeader: {
            fontSize: 16
        },
        tableBodyOdd: {
            alignment: 'center'
        },
        tableBodyEven: {
            alignment: 'center'
        },
        tableFooter: {
            fontSize: 16
        }
    },
    header: (function() {
        return {
            columns: [
                {
                    text: [  
                        { text: 'REPORT ', alignment: 'right', fontSize: 42, margin: [0, 50, 70, 0] },
                                                '\n',
                                                //{ text: 'ข้อมูลวันที่ ' + $('#reservation').val(), alignment: 'left', fontSize: 18, margin: [0, 50, 70, 0] },
                                                //'\n',
                                                { text: 'Report : รายงานสถิติการเลือกใช้ Package', alignment: 'left', fontSize: 18, margin: [0, 50, 70, 0] },
                                                '\n',
                                                { text: 'Report By : {{ Auth::user()->name }}', alignment: 'left', fontSize: 18, margin: [0, 0, 70, 0] }
                                            ]
                }
            ],
            margin: 20
        };
    })
};
pdfMake.createPdf(docDefinition).download('reports.pdf');
});

});

$('#download_bar_img').click(function(event) {
var chartContainer = document.querySelector("#bar_graph");

html2canvas(chartContainer).then(canvas => {
    var imgData = canvas.toDataURL("image/png"); // แปลงเป็นข้อมูล URI ของรูปภาพ

    // สร้างลิงก์สำหรับการดาวน์โหลดภาพ
    var link = document.createElement('a');
    link.href = imgData;
    link.download = 'bar_chart.png'; // ชื่อไฟล์ที่จะบันทึก
    link.click();
});
});

$('#download_line').click(function(event) {

var chartContainer = document.querySelector("#line_graph");

html2canvas(chartContainer).then(canvas => {
    var imgData = canvas.toDataURL("image/png");
    let docDefinition = {
    defaultStyle: {
        font: 'THSarabun',
        fontSize: 16
    },
    content: {
        image: imgData,
        width: 570
},
    pageMargins: [20, 150, 20, 30],
    styles: {
        tableHeader: {
            fontSize: 16
        },
        tableBodyOdd: {
            alignment: 'center'
        },
        tableBodyEven: {
            alignment: 'center'
        },
        tableFooter: {
            fontSize: 16
        }
    },
    header: (function() {
        return {
            columns: [
                {
                    text: [  
                        { text: 'REPORT ', alignment: 'right', fontSize: 42, margin: [0, 50, 70, 0] },
                                                '\n',
                                                //{ text: 'ข้อมูลวันที่ ' + $('#reservation').val(), alignment: 'left', fontSize: 18, margin: [0, 50, 70, 0] },
                                                //'\n',
                                                { text: 'Report : รายงานสถิติการเลือกใช้ Package', alignment: 'left', fontSize: 18, margin: [0, 50, 70, 0] },
                                                '\n',
                                                { text: 'Report By : {{ Auth::user()->name }}', alignment: 'left', fontSize: 18, margin: [0, 0, 70, 0] }
                                            ]
                }
            ],
            margin: 20
        };
    })
};
pdfMake.createPdf(docDefinition).download('reports.pdf');
});

});

$('#download_line_img').click(function(event) {
var chartContainer = document.querySelector("#line_graph");

html2canvas(chartContainer).then(canvas => {
    var imgData = canvas.toDataURL("image/png"); // แปลงเป็นข้อมูล URI ของรูปภาพ

    // สร้างลิงก์สำหรับการดาวน์โหลดภาพ
    var link = document.createElement('a');
    link.href = imgData;
    link.download = 'line_chart.png'; // ชื่อไฟล์ที่จะบันทึก
    link.click();
});
});

$('#download_pie').click(function(event) {

var chartContainer = document.querySelector("#pie_graph");

html2canvas(chartContainer).then(canvas => {
    var imgData = canvas.toDataURL("image/png");
    let docDefinition = {
    defaultStyle: {
        font: 'THSarabun',
        fontSize: 16
    },
    content: {
        image: imgData,
        width: 570
},
    pageMargins: [20, 150, 20, 30],
    styles: {
        tableHeader: {
            fontSize: 16
        },
        tableBodyOdd: {
            alignment: 'center'
        },
        tableBodyEven: {
            alignment: 'center'
        },
        tableFooter: {
            fontSize: 16
        }
    },
    header: (function() {
        return {
            columns: [
                {
                    text: [  
                        { text: 'REPORT ', alignment: 'right', fontSize: 42, margin: [0, 50, 70, 0] },
                                                '\n',
                                                //{ text: 'ข้อมูลวันที่ ' + $('#reservation').val(), alignment: 'left', fontSize: 18, margin: [0, 50, 70, 0] },
                                                //'\n',
                                                { text: 'Report : รายงานสถิติการเลือกใช้ Package', alignment: 'left', fontSize: 18, margin: [0, 50, 70, 0] },
                                                '\n',
                                                { text: 'Report By : {{ Auth::user()->name }}', alignment: 'left', fontSize: 18, margin: [0, 0, 70, 0] }
                                            ]
                }
            ],
            margin: 20
        };
    })
};
pdfMake.createPdf(docDefinition).download('reports.pdf');
});

});

$('#download_pie_img').click(function(event) {
var chartContainer = document.querySelector("#pie_graph");

html2canvas(chartContainer).then(canvas => {
    var imgData = canvas.toDataURL("image/png"); // แปลงเป็นข้อมูล URI ของรูปภาพ

    // สร้างลิงก์สำหรับการดาวน์โหลดภาพ
    var link = document.createElement('a');
    link.href = imgData;
    link.download = 'pie_chart.png'; // ชื่อไฟล์ที่จะบันทึก
    link.click();
});
});

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

        $('#resetSearchButton').on('click', async function() {
            localStorage.removeItem('dateStart');
            //localStorage.removeItem('sagent');

            //$('#agen').val('');

            var currentDate = moment();
            var startDate = moment(currentDate).subtract(30, 'days').startOf('day').format(
                'YYYY-MM-DD HH:mm:ss');
            var endDate = moment(currentDate).endOf('month').endOf('day').format(
                'YYYY-MM-DD HH:mm:ss');

            //daterange();
            //table = $('#Listview').DataTable(table_option);
            table.draw();
        });

        $('#btnsearch').on('click', function() {
            //storeFieldValues();
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
                data: function(d) {
                    d.sdate = $('#reservation').val();
                },
                complete: function(data) {
                    Loadchart();
                }
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
                    title: 'รายงานสถิติการเลือกใช้ Package',
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
                    "title": 'รายงานสถิติการเลือกใช้ Package',
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
                                                { text: 'Report : รายงานสถิติการเลือกใช้ Package', alignment: 'left', fontSize: 18, margin: [0, 50, 70, 0] },
                                                '\n',
                                                { text: 'Report By : {{ Auth::user()->name }}', alignment: 'left', fontSize: 18, margin: [0, 0, 70, 0] }
                                            ]
                                    }
                                ],
                                margin: 20
                            }
                        });

                        doc.content[0].table.widths = [40, 400, '*'];
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
                    title: 'รายงานสถิติการเลือกใช้ Package',
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

        window.Apex.chart = {
            fontFamily: "Sarabun"
        };
        // Loadchart();
    });

    function Loadchart() {
        let options = {
            series: [{
                name: [],
                data: []
            }, ],
            title: {
                text: 'รายงานสถิติการเลือกใช้ Package',
                align: 'center',
                style: {
                    fontSize: '16px',
                    fontWeight: 'bold',
                    fontFamily: 'Sarabun',
                    color: '#263238'
                },
                margin: 10,
                offsetX: 0,
                offsetY: 0,
                floating: false,
            },
            chart: {
                height: 400,
                type: "line",
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: false
                }
            },
            markers: {
                show: true,
                size: 6
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false,
                showForSingleSeries: false,
                position: "top",
                horizontalAlign: "right"
            },
            stroke: {
                curve: "smooth",
                linecap: "round"
            },
            grid: {
                row: {
                    colors: ["#f3f3f3", "transparent"],
                    opacity: 0.5
                }
            },
            xaxis: {
                categories: []
            },
            labels: [],
            tooltip: {
                y: {
                    formatter: function(val) {
                        return " จำนวน " + val + "  "
                    }
                }
            }
        };
        let optionsdonut = {

            series: [],
            chart: {
                type: 'donut',
                height: 380,
                toolbar: {
                    show: false
                },
            },
            colors: ['#E91E63', '#2E93fA', '#546E7A', '#66DA26', '#FF9800', '#4ECDC4', '#C7F464', '#81D4FA',
                '#A5978B', '#FD6A6A'
            ],
            fill: {
                type: 'gradient',
            },
            title: {
                text: 'รายงานสถิติการเลือกใช้ Package',
                align: 'center',
                style: {
                    fontSize: '16px',
                    fontWeight: 'bold',
                    fontFamily: 'Sarabun',
                    color: '#263238'
                },
                margin: 10,
                offsetX: 0,
                offsetY: 0,
                floating: false,
            },
            labels: [],
            responsive: [{
                breakpoint: 200,
                options: {
                    chart: {
                        width: 30,
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

//        var rdate = $('#reservation').val();
        var rstatus = 'report';
        $.ajax({
            url: '{{ route('reporttoppackage.index') }}',
            data: {
 //               sdate: rdate,
                rstatus: rstatus
            },
            method: 'GET',
            success: function(res) {
                options.series[0].data = res.datag;
                options.xaxis.categories = res.datal;
                optionsdonut.labels = res.datal;
                optionsdonut.series = res.datag;
                var chart2 = new ApexCharts(document.querySelector("#line_graph"), options);
                chart2.render();

                var chart = new ApexCharts(document.querySelector("#bar_graph"), options);
                chart.render();
                chart.updateOptions({
                    chart: {
                        type: "bar",
                        animate: true
                    },
                    labels: '',
                    stroke: {
                        width: 0
                    }
                });
                //options.series = res.datag;
                var chart3 = new ApexCharts(document.querySelector("#pie_graph"), optionsdonut);
                chart3.render();
            }
        });
    }
</script>

<script>
    $(function () {
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY hh:mm A'
        }
        });
    })
  </script>
