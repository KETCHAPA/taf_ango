
<!--   Core JS Files   -->
<script src="\js/core/jquery.3.2.1.min.js"></script>
<script src="\js/core/popper.min.js"></script>
<script src="\js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="\js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="\js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="\js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="\js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="\js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="\js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="\js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="\js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="\js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Bootstrap Toggle -->
<script src="\js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="\js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="\js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Google Maps Plugin -->
<script src="\js/plugin/gmaps/gmaps.js"></script>

<!-- Dropzone -->
<script src="\js/plugin/dropzone/dropzone.min.js"></script>

<!-- Fullcalendar -->
<script src="\js/plugin/fullcalendar/fullcalendar.min.js"></script>

<!-- DateTimePicker -->
<script src="\js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

<!-- Bootstrap Tagsinput -->
<script src="\js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

<!-- Bootstrap Wizard -->
<script src="\js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>

<!-- jQuery Validation -->
<script src="\js/plugin/jquery.validate/jquery.validate.min.js"></script>

<!-- Summernote -->
<script src="\js/plugin/summernote/summernote-bs4.min.js"></script>

<!-- Select2 -->
<script src="\js/plugin/select2/select2.full.min.js"></script>

<!-- Sweet Alert -->
<script src="\js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Owl Carousel -->
<script src="\js/plugin/owl-carousel/owl.carousel.min.js"></script>

<!-- Magnific Popup -->
<script src="\js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Atlantis JS -->
<script src="\js/atlantis.min.js"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="\js/setting-demo.js"></script>
<script src="\js/demo.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    Circles.create({
        id:'circles-1',
        radius:45,
        value:60,
        maxValue:100,
        width:7,
        text: 5,
        colors:['#f1f1f1', '#FF9E27'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    Circles.create({
        id:'circles-2',
        radius:45,
        value:70,
        maxValue:100,
        width:7,
        text: 36,
        colors:['#f1f1f1', '#2BB930'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    Circles.create({
        id:'circles-3',
        radius:45,
        value:40,
        maxValue:100,
        width:7,
        text: 12,
        colors:['#f1f1f1', '#F25961'],
        duration:400,
        wrpClass:'circles-wrp',
        textClass:'circles-text',
        styleWrapper:true,
        styleText:true
    })

    var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

    var mytotalIncomeChart = new Chart(totalIncomeChart, {
        type: 'bar',
        data: {
            labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
            datasets : [{
                label: "Total Income",
                backgroundColor: '#ff9e27',
                borderColor: 'rgb(23, 125, 255)',
                data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false,
            },
            scales: {
                yAxes: [{
                    ticks: {
                        display: false //this will remove only the label
                    },
                    gridLines : {
                        drawBorder: false,
                        display : false
                    }
                }],
                xAxes : [ {
                    gridLines : {
                        drawBorder: false,
                        display : false
                    }
                }]
            },
        }
    });

    $('#lineChart').sparkline([105,103,123,100,95,105,115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: '#ffa534',
        fillColor: 'rgba(255, 165, 52, .14)'
    });
</script>
<script src="\js/notify.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
@yield('script')
