function Test()
{   
    $(document).ready(function(){
        $(this).on("click","#chiqimButton",function(){
           var summa    =   $("#summa").val();
           var izoh     =   $("#izoh").val();
           var turi     =   $("#turi").val();
            $.post("ims/myajax/ajax_chiqim.php",{'summa':summa,'izoh':izoh,'turi':turi},function(data1){
                if(data1)
                {
                    alert(data1);             
                    
                }            
                location.reload();    
            });
        });
        $(this).on("click","a[data-role=chedit]",function(){
            var rid =   $(this).attr("data-id").slice(6);
            $("#esumma").val($('#qat'+rid).children('td[data-target=summa]').text());
            $("#eizoh").val($('#qat'+rid).children('td[data-target=izoh]').text());
            $("#eturi").val($('#qat'+rid).children('td[data-target=turi]').text());
            $("#dbid").val(rid);

            $("#modal-amal").modal('toggle');
            
        });
        $(this).on("click","#editButton",function(){
            var summa   =   $("#esumma").val();
            var izoh    =   $("#eizoh").val();
            var turi    =   $("#eturi").val();
            var id      =   $("#dbid").val();
            $.post("ims/myajax/ajax_editchiqim.php",{'summa':summa,'izoh':izoh,'turi':turi,'id':id},function(data2){
                if(data2)
                {
                    alert(data2);
                    
                }
                location.reload();
            });
            
        });
        $(this).on("click","a[data-role=chdelete]",function(){
            var did =   $(this).attr("data-id").slice(5);
            $("#pro").text(did);
            $("#DelModal").modal("toggle");
           
            
        });
        $(this).on("click","#tas_delete",function(){
            var ID  =   $("#pro").text();
            $.post("ims/myajax/ajax_delete.php",{'cid':ID},function(data3){
                if(data3)
                {
                    alert(data3);
                }
                location.reload();
            });
        });
    });
   
    
    
}
//  Input Formatini O'zgartirish
function EasyInput()
{
     $(document).ready(function () {
       //.number-separator
       $('.number-separator').on('keyup click change paste input mouseover', function (event) {
            $(this).val(function (index, value) {
                if (value != "") {
                    //return '$' + value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    var decimalCount;
                    value.match(/\./g) === null ? decimalCount = 0 : decimalCount = value.match(/\./g);
        
                    if (decimalCount.length > 1) {
                        value = value.slice(0, -1);
                    }
        
                    var components = value.toString().split(".");
                    if (components.length === 1)
                        components[0] = value;
                    components[0] = components[0].replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
                    if (components.length === 2) {
                        components[1] = components[1].replace(/\D/g, '').replace(/^\d{3}$/, '');
                    }
        
                    if (components.join('.') != '')
                        return components.join('.');
                    else
                        return '';
                }
            });
        });
      });
}

//  To'liq Kirim Qilish

function ToliqKirimCheck()
{
    $(document).ready(function(){
      $(this).on("change",'#toliq_kirim',function(){
        var jsum    =   $("#jami_summa").val();
        $("#bkirim_summa").val(jsum);
        //alert(jsum);
      });
     
    });
}

function TableHide()
{
    $(document).ready(function(){
        var hid =   $("#delon").text();
        if(hid.length>0)
        {
            $("#example1").hide();
        }
    });
}