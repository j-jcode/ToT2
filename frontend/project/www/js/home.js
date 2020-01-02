$(document).ready(function(){
    console.log("hey");
    


    $.getJSON("http://142.11.205.3/talk/dadosTable.php",function(data){
        console.log(data);

        var table = "";
        table += "<table><tbody>"

        for (i in data){
            //console.log(data[i]);
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
    });

    $("#styleFormSubmit").bind('click',function(){
        // If this button is clicked then send the name,email (DATA) to 
        // php script for processing 

        var sName = $("#styleFormName").val();
        var sEmail = $("#styleFormEmail").val();

        $.getJSON("http://142.11.205.3/talk/stylist_register.php?style_name="+sName+"&style_email="+sEmail,function(data){
            console.log(data);
        });
    });

});