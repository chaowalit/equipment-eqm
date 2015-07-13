
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="assets/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/hovermenu/bootstrap-hover-dropdown.js"></script>
      <!-- Page-Level Plugin Scripts - Tables -->
    <script src="assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <!--date picker-->
    <link rel="stylesheet" href="assets/jquery_ui/jquery-ui.css"> <!--version 1.11.0-->
    <script src="assets/jquery_ui/jquery-ui.js"></script><!--version 1.11.0-->
    
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/hovermenu/bootstrap-hover-dropdown.js"></script>
    <script src="assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
	  <script>
	    $(document).ready(function() {
            $('.panel-heading span.clickable').click();
            $('.panel div.clickable').click();
	    //$('.js-activated').dropdownHover().dropdown();
	    });
	  </script>
      <script>
        $(document).on('click', '.panel-heading span.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '.panel div.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});

$(document).ready(function(){
    $(window).resize(function() {

        ellipses1 = $("#bc1 :nth-child(2)")
        if ($("#bc1 a:hidden").length >0) {ellipses1.show()} else {ellipses1.hide()}
        
        ellipses2 = $("#bc2 :nth-child(2)")
        if ($("#bc2 a:hidden").length >0) {ellipses2.show()} else {ellipses2.hide()}
        
    })
    
});
      </script>

        <script>
        $(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    $("#back_to_one").on('click',function(){
            $('ul.setup-panel li:eq(0)').removeClass('disabled');
            $('ul.setup-panel li:eq(1)').addClass('disabled');
            $('ul.setup-panel li a[href="#step-1"]').trigger('click');
    });
    $("#back_to_two").on('click',function(){
            $('ul.setup-panel li:eq(0)').addClass('disabled');
            $('ul.setup-panel li:eq(1)').removeClass('disabled');
            $('ul.setup-panel li:eq(2)').addClass('disabled');
            $('ul.setup-panel li a[href="#step-2"]').trigger('click');
    });
     $("#activate-step-3").on('click',function( event ){
            var inspection_number = $("#inspection_number").val();
            var date_contract     = $("#date_contract").val();
            var vouch_year        = $("#vouch_year").val();
            var user1             = $("#user1").val();
            var user2             = $("#user2").val();
            var contract_number   = $("#contract_number").val();
            //var date_contract2    = $("#date_contract2").val();
            if(inspection_number == "")
            {  
                $("#chked1").show();
                event.preventDefault();
            }
            if(date_contract == "")
            {  
                $("#chked2").show();
                event.preventDefault();
            }
             if(vouch_year == "")
            {  
                $("#chked3").show();
                event.preventDefault();
            }
            if(contract_number == "")
            {  
                $("#chked4").show();
                event.preventDefault();
            }

            //if not null
            
            if(inspection_number != "")
            {  
                $("#chked1").hide();
            }
            if(date_contract != "")
            {  
                $("#chked2").hide();
            }
             if(vouch_year != "")
            {  
                $("#chked3").hide();
            }
            if(contract_number != "")
            {  
                $("#chked4").hide();
            }
            if(inspection_number != "" && date_contract != "" && vouch_year != "" && contract_number != "" )
            {
                $('ul.setup-panel li:eq(2)').removeClass('disabled');
                $('ul.setup-panel li:eq(0)').addClass('disabled');
                $('ul.setup-panel li:eq(1)').addClass('disabled');
                $('ul.setup-panel li a[href="#step-3"]').trigger('click');
                $("#total_result1").text($("#eqm_numbers_amount").val());
                $("#total_result3").text($("#eqm_names").val());
                $("#total_result5").text($("#eqm_price_unit").val());
                $("#total_result7").text($("#cost_total").val());
                $("#total_result2").text($("#agency_id option:selected").text());
                $("#total_result4").text($("#date_receive").val());
                $("#total_result8").text($("#user1").val());
                $("#total_result6").text($("#be_under_id option:selected").text());
            }
    }); 
    $('#activate-step-2').on('click', function(e) {
        var eqm_numbers_amount = $("#eqm_numbers_amount").val();
        var eqm_names          = $("#eqm_names").val();
        var eqm_components     = $("#eqm_components").val();
        var eqm_model          = $("#eqm_model").val();
        var unit_id            = $("#unit_id").val();
        var agency_id          = $("#agency_id").val();
        var eqm_price_unit     = $("#eqm_price_unit").val();
        var eqm_unit_set       = $("#eqm_unit_set").val();
        var type_budget_id     = $("#type_budget_id").val();
        var year_budget_id     = $("#year_budget_id").val();
        var depreciation_age   = $("#depreciation_age").val();
        var depreciation       = $("#depreciation").val();
        var comment            = $("#comment").val();
        var report_number      = $("#report_number").val();
        var cost_total         = $("#cost_total").val();
        var method_id          = $("#method_id").val();
        var date_receive       = $("#date_receive").val();
        var cost_net           = $("#cost_net").val();
        var depreciation_year  = $("#depreciation_year").val();
       //alert(eqm_numbers_amount);
        if(eqm_numbers_amount == "")
        {  
            //alert(eqm_numbers_amount);
            $("#chk1").show();
            e.preventDefault();
        }
         if(eqm_components == "")
        {  
            $("#chk2").show();
            e.preventDefault();
        }
        if(eqm_model == "")
        {  
            $("#chk3").show();
            e.preventDefault();
        }
        if(eqm_price_unit == "")
        {  
            $("#chk4").show();
            e.preventDefault();
        }
         if(eqm_unit_set == "")
        {  
            $("#chk5").show();
            e.preventDefault();
        }
         if(report_number == "")
        {  
            $("#chk6").show();
            e.preventDefault();
        }
        if(date_receive == "")
        {  
            $("#chk7").show();
            e.preventDefault();
        }

        //not empty
        if(eqm_numbers_amount != "")
        {  
            $("#chk1").hide();
        }
         if(eqm_components != "")
        {  
            $("#chk2").hide();
        }
        if(eqm_model != "")
        {  
            $("#chk3").hide();
        }
        if(eqm_price_unit != "")
        {  
            $("#chk4").hide();
        }
         if(eqm_unit_set != "")
        {  
            $("#chk5").hide();
        }
         if(report_number != "")
        {  
            $("#chk6").hide();
        }
        if(date_receive != "")
        {  
            $("#chk7").hide();
        }
        if(eqm_numbers_amount != "" && eqm_components != "" && eqm_model != "" && eqm_price_unit != "" && eqm_unit_set != "" && report_number != "" && date_receive != "")
        {   
            $('ul.setup-panel li:eq(0)').addClass('disabled');
            $('ul.setup-panel li:eq(1)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-2"]').trigger('click');
            //$(this).remove();     
        }
        
    });    
     
});


    </script>
</body>

</html>
