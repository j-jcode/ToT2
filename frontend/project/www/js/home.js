$(document).ready(function(){
    console.log("hey");
    
    /* Plan us to query most of theses at once 
        Big GOAL: Enable a downlaod to the user device of these things that are most likey going 
        to be needed to produce faster speeds */


    $.getJSON("http://142.11.205.3/talk/dadosTable.php",function(data)
    {
        console.log(data);

        var table = "";
        table += "<table><tbody>"

        for (i in data)
        {
            //console.log(data[i]);
            /* TODO: Add name to stylist table in DB */
            table += "<tr class='row100 body'>";
            table += "<td class='cell100 column3'>"+data[i]['id']+"</td>";
            table += "<td class='cell100 column1'>"+data[i]['fn']+"</td>";
            table += "<td class='cell100 column3'>"+data[i]['login']+"</td>";
            table += "<td class='cell100 column3'>"+data[i]['pw']+"</td>";
            table += "<td class='cell100 column3'>"+data[i]['ln']+"</td>";
            table += "<td class='cell100 column3'>"+data[i]['email']+"</td>";
            table += "<td class='cell100 column3'>"+data[i]['reg_date']+"</td>";
            table += "</tr>";
        }

        table += "</tbody></table>"
   
        var dadosSelectText = "";
        dadosSelectText = "<select id= 'dadosSelect'>";
        for (i in data)
        {
            dadosSelectText += "<option value= "+data[i]['id']+">"+data[i]['fn']+"</option>";
        }
        dadosSelectText += "</select>";
        document.getElementById("dadoFormSelect").innerHTML = dadosSelectText;

       

        document.getElementById("dadosTable").innerHTML = table;
       
   
   
    });

    $.getJSON("http://142.11.205.3/talk/stylistTable.php",function(data){
        console.log(data);

        var table = "";
        table += "<table><tbody>"

        for (i in data){
            //console.log(data[i]);
            table += "<tr class='row100 body'>";
            table += "<td class='cell100 column3'>"+data[i]['id']+"</td>";
            table += "<td class='cell100 column1'>"+data[i]['fn']+"</td>";
            table += "<td class='cell100 column3'>"+data[i]['email']+"</td>";
            table += "<td class='cell100 column3'>"+data[i]['reg_date']+"</td>";
            table += "</tr>";
        }

        table += "</tbody></table>"

        document.getElementById("stylistTable").innerHTML = table;
   
        var stylistSelectText = "";
        stylistSelectText = "<select id= 'stylistSelect'>";
        for (i in data)
        {
            stylistSelectText += "<option value= "+data[i]['id']+">"+data[i]['fn']+"</option>";
        }
        stylistSelectText += "</select>";
        document.getElementById("stylistSelectForm").innerHTML = stylistSelectText;

    });

    /*TODO: WHen a date is choosedn we would wuery the DB for times that are 
        on that day and return to the user availebe dates */

    $("#styleFormSubmit").bind('click',function(){
        // If this button is clicked then send the name,email (DATA) to 
        // php script for processing 

        var sName = $("#styleFormName").val();
        var sEmail = $("#styleFormEmail").val();

        $.getJSON("http://142.11.205.3/talk/stylist_register.php?style_name="+sName+"&style_email="+sEmail,function(data){
            console.log(data);
        });
    });

    $("#appFormSubmit").bind('click',function(){
        // If this button is clicked then send the name,email (DATA) to 
        // php script for processing 

        /* We need to get all the data from the FRONTEND  */
        var aID = $("#dadosSelect").val();
        var aDate = $("#styleFormDate").val();
        var aS = $("#stylistSelect").val();
        var aText = $("#hairDetail").val();

        $.getJSON("http://142.11.205.3/talk/appointmentPOST.php?id_user="+aID+"&app_hair_date="+aDate+"&id_ST="+aS+"&hDetail="+aText,
            function(data){
                console.log(data);
            });
    });
    
});