function showUser(str) {
    if (str == "") {
      document.getElementById("pruebaTXT").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("pruebaTXT").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","../Controller/controllers.views/Quotations.controller.php?q="+str,true);
      xmlhttp.send();
    }
  }

  function showProduc(str) {
    if (str == "") {
      document.getElementById("invoiceItem").htmlRows = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      var count = $(".itemRow").length;

        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                $('#invoiceItem').append(this.responseText);
            }
        };

        xmlhttp.open("GET", "../Controller/controllers.views/QtProduc.controller.php?q="+str+"&c="+count, true);
        xmlhttp.send();
    }
  }

    $(document).ready(function(){
        $.ajax({
            url: '../Controller/controllers.views/QtProduc.controller.php?q="1010101"',
            type: 'get',
            dataType: 'JSON',
            success: function(response){
                alert('Funciona');
                var len = response.length;
                var count = $(".itemRow").length;
                
                    var id = response.id;
                    var name = response.name;
                    var price = response.price;
    
                    count++;
                    var htmlRows = '';
                        htmlRows += '<tr>';
                        htmlRows += '<td><input class="itemRow" type="checkbox"></td>';          
                        htmlRows += '<td><input type="text" name="productCode[]" id="productCode_'+count+'" class="form-control" autocomplete="off" value="'+id+'"></td>';          
                        htmlRows += '<td><input type="text" name="productName[]" id="productName_'+count+'" class="form-control" autocomplete="off" value="'+name+'"></td>';	
                        htmlRows += '<td><input type="number" name="quantity[]" id="quantity_'+count+'" class="form-control quantity" autocomplete="off"></td>';   		
                        htmlRows += '<td><input type="number" name="price[]" id="price_'+count+'" class="form-control price" autocomplete="off" value="'+price+'"></td>';		 
                        htmlRows += '<td><input type="number" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off"></td>';          
                        htmlRows += '</tr>';
                    $('#invoiceItem').append(htmlRows);
                
    
            }
        });
    });    
  