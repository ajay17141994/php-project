function retrieveDATA()
    {
        $("#Subcategory").val();
        $.ajax({
                url:"support/SubcategoryID.php",
                method:"POST",
                data:{Subcategory:$("#Subcategory").val()},
                dataType:"text",
                success:function(data)
                {
                    console.log(data);
                }
            });

        $("#breed").val()
        $.ajax({
                url:"support/SubcategoryID.php",
                method:"POST",
                data:{breedID:$("#breed").val()},
                dataType:"text",
                success:function(data)
                {
                    console.log(data);
                }
            });

        $(".quantityUnit").val();
        // $(".currency").val();
        console.log($(".quantityUnit").val());
        $.ajax({
                url:"support/SubcategoryID.php",
                method:"POST",
                data:{quantityUnitID:$(".quantityUnit").val()},
                dataType:"text",
                success:function(data)
                {
                    console.log(data);
                }
            });

        $(".currency").val();
        // console.log($(".quantityUnit").val());
        $.ajax({
                url:"support/SubcategoryID.php",
                method:"POST",
                data:{priceUnitID:$(".currency").val()},
                dataType:"text",
                success:function(data)
                {
                    console.log(data);
                }
            });

        $("#mobile_no").text();
        console.log($("#mobile_no").text());
        $.ajax({
                url:"support/SubcategoryID.php",
                method:"POST",
                data:{userInfo_mobile:$("#mobile_no").text()},
                dataType:"text",
                success:function(data)
                {
                    console.log(data);
                }
            });

        $("#category").val();
        $("#Subcategory").val();
        $("#breed").val();
        $("#quantity_input").val();
        $(".currency").val();
        $("#posted_date").val();
        $("#expiry_date").val();
        $(".quantityUnit").val();
        $("#price_input").val();
        // console.log($("#mobile_no").text());
        $.ajax({
                url:"support/SubcategoryID.php",
                method:"POST",
                data:{category:$("#category").val(),Subcategory:$("#Subcategory").val(),breed:$("#breed").val(),quantity:$("#quantity_input").val(),currency:$(".currency").val(),postedDate:$("#posted_date").val(),expiryDate:$("#expiry_date").val(),quantityUNIT:$(".quantityUnit").val(),price:$("#price_input").val()},
                dataType:"text",
                success:function(data)
                {
                    console.log(data);
                }
            });
    }