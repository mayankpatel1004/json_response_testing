<script type="text/javascript">
    $(document).ready(function(){
       $("#blog_response").html('');
       $.ajax({
        url: 'ajax/getblogData.php',
        data: { serachtext: "Record 1", is_enabled : "1"} ,
        type: 'POST',
        dataType: 'JSON',
        success: function(response){
            var len = response.length;
            if(response[0].blogdetail_id == '0'){
                $("#blog_response").html(response[0].records);
            }else{
                for(var i=0; i<len; i++){
                    var tr_str = "<tr>" +
                        "<td align='center'>" + response[i].blogdetail_id + "</td>" +
                        "<td align='center'>" + response[i].title + "</td>" +
                        "<td align='center'>" + response[i].description + "</td>" +
                        "<td align='center'>" + response[i].image_sm + "</td>" +
                        "</tr>";
                    $("#blog_response").append(tr_str);
                }
            }
            
            }
        });
    });
</script>