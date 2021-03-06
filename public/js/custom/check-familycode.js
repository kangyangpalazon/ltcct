
$(function() {

	// check family code
    $(".check_family_code").click(function() {

    	var address_houseno = $("#content_address_houseno").val();
    	var address_unit1 = $("#content_address_unit1").val();
    	var address_unit2 = $("#content_address_unit2").val();
    	var address_street = $("#content_address_street").val();
    	var address_building = $("#content_address_building").val();
    	var address_postal = $("#content_address_postal").val();

        $('#confirm_btn').removeAttr("disabled");
        $("#familycode-table tbody").empty();

        var formData = {
        	_token: $('meta[name="csrf-token"]').attr('content'),
        	address_houseno: address_houseno,
        	address_unit1: address_unit1,
        	address_unit2: address_unit2,
        	address_street: address_street,
        	address_building: address_building,
        	address_postal: address_postal
        };

        // alert(JSON.stringify(formData));

        $.ajax({
            type: 'POST',
            url: "http://localhost/ltcct/public/operator/devotee/search-familycode",
            data: formData,
            dataType: 'json',
            success: function(response)
            {
            	alert(JSON.stringify(response));

            	$("#no_familycode").remove();

            	$.each(response.familycode, function(index, data) {
					$('#familycode-table tbody').append("<tr id='appendFamilyCode'><td><input type='radio' name='familycode_id' " + 
            			"value='" + data.familycode_id + "' /></td>" +
            			"<td>" + data.chinese_name + "</td>" +
            			"<td>" + data.familycode + "</td></tr>");
				});
            	
            },

            error: function (response) {
            	console.log(response);  
            } 
       	});

    });
});