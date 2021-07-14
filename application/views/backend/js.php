    
    <script type="text/javascript">
        function readURL(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>bend/bootstrap/dist/js/tether.min.js"></script>
    <script src="<?php echo base_url(); ?>bend/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>bend/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>bend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url(); ?>bend/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>bend/js/waves.js"></script>
    <!--Morris JavaScript -->
    <script src="<?php echo base_url(); ?>bend/plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>bend/plugins/bower_components/morrisjs/morris.js"></script>
    <script src="<?php echo base_url(); ?>bend/plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>bend/plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>bend/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo base_url(); ?>bend/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>bend/plugins/bower_components/multiselect/js/jquery.multi-select.js"></script>
    <script src="<?php echo base_url(); ?>bend/js/fullcalendar.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> -->
    <script type="text/javascript">
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script src="<?php echo base_url(); ?>bend/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
    // Date Picker
    jQuery('.mydatepicker').datepicker();
    </script>
    

    <!-- Sparkline chart JavaScript -->
    <script src="<?php echo base_url(); ?>bend/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- jQuery peity -->
    <script src="<?php echo base_url(); ?>bend/plugins/bower_components/peity/jquery.peity.min.js"></script>
    <script src="<?php echo base_url(); ?>bend/plugins/bower_components/peity/jquery.peity.init.js"></script>
    <!-- Datatables script -->
    <script src="<?php echo base_url(); ?>bend/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- Datatables export scripts -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>bend/assets/javascripts/tables/examples.datatables.default.js"></script>
    <script src="<?php echo base_url(); ?>bend/assets/javascripts/tables/examples.datatables.tabletools.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>bend/js/custom.min.js"></script>
    <script src="<?php echo base_url(); ?>bend/js/dashboard1.js"></script>
    <!--Style Switcher -->
    <script src="<?php echo base_url(); ?>bend/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="<?php echo base_url(); ?>bend/plugins/bower_components/switchery/dist/switchery.min.js"></script>

    <script src="<?php echo base_url(); ?>bend/plugins/bower_components/clockpicker/dist/bootstrap-clockpicker.min.js"></script>
    <script type="text/javascript">
    $('.clockpicker').clockpicker({
        placement: 'bottom',
            align: 'left',
            autoclose: true,
            'default': 'now'
        });

        // Manually toggle to the minutes view
        $('#check-minutes').click(function(e){
            // Have to stop propagation here
            e.stopPropagation();
            input.clockpicker('show')
                    .clockpicker('toggleView', 'minutes');
        });
    </script>


    <script>
        $(document).ready(function(){
            //bootstrap toggle plus and minus icon on hit
            $('.collapse').on('show.bs.collapse', function(){
                $(this).parent().find('.fa').removeClass('fa-plus').addClass('fa-minus');
            }).on('hide.bs.collapse', function(){
                $(this).parent().find('.fa').removeClass('fa-minus').addClass('fa-plus');
            });
           //end the bootstrap part
            $('#myTable').DataTable();

            $(document).ready(function(){
                var table = $('#example').DataTable({
                    "columnDefs":[{
                        "visible":false,
                        "targets":2
                    }],
                    "order":[
                      [2, 'asc']
                    ],
                    "displayLength":25,
                    "drawCallback": function(settings){
                        var api = this.api();
                        var rows = api.rows({
                            page:'current'
                        }).nodes();

                        var last = null;

                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i){
                            if(last !== group){
                                $(rows).eq(i).before(
                                      '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                                    );
                                last = group;
                            }
                        });
                    }
                });
                $('#example tbody').on('click', 'tr.group', function(){
                    var currentOrder = table.order()[0];
                    if(currentOrder[0] === 2 && currentOrder[1] === 'asc'){
                        table.order([2, 'desc']).draw();
                    }else{
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            scrollX: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
            
        });

        // switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function(){
            new Switchery($(this)[0],{ color: '#faab43', secondaryColor: '#fC73d0', jackColor: '#fcf45e', jackSecondaryColor: '#c8ff77' }, $(this).data());
        });
    </script>
    
     <script src="//cdn.amcharts.com/lib/4/core.js"></script>
    <script src="//cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="//cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script>
        // Set theme
    am4core.useTheme(am4themes_animated);
    // Create chart instance
    var chart = am4core.create("chartdiv", am4charts.PieChart3D);
    chart.innerRadius = am4core.percent(40);
    // Add data
    chart.data = [
    <?php $select_expense = $this->db->get_where('payment', array('payment_type' => 'expense'))->result_array();
    foreach ($select_expense as $expense): ?>
    {
      "country": "<?php echo $expense['title']; ?>",
      "litres": <?php echo $expense['amount']; ?>
      
    }, 
    <?php endforeach; ?>
    ];


    // Add and configure Series
    var pieSeries = chart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "litres";
    pieSeries.dataFields.category = "country";
    pieSeries.slices.template.stroke = am4core.color("#4a2abb");
    pieSeries.slices.template.strokeWidth = 2;
    pieSeries.slices.template.strokeOpacity = 1;
    pieSeries.slices.template.propertyFields.fill = "color";
    </script>
</body>

</html>