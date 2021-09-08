<?php


//  Database Connection
$con = mysqli_connect("localhost", "root", "", "credit");
mysqli_set_charset($con, "utf8");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//  Chiqim Qo'shish Modalidagi Malumotlarni Bazaga Qo'shish!

function ChiqimAjax()
{
    global $con;
    $summa  =   $_POST["summa"];
    $izoh   =   htmlspecialchars(addslashes($_POST["izoh"]));
    $turi   =   $_POST["turi"];
    $tip    =   '0';
    $filial =   'buvayda';    

    $res    = $con->query("INSERT INTO `kunlik_chiqim`( `summa`, `izox`, `turi`, `tip`, `filial`) VALUES ('{$summa}','{$izoh}','{$turi}','{$tip}','{$filial}') ") or die($con->error);
    if($res)
    {
        echo "Chiqim Bazaga Kiritildi!";
    }
}

// Chiqimni Tahrirlash
function EditChiqimAjax()
{
    global $con;
    $id     =   $_POST['id'];
    $summa  =   $_POST["summa"];
    $izoh   =   htmlspecialchars(addslashes($_POST["izoh"]));
    $turi   =   $_POST["turi"]; 
    $sql    =   "UPDATE `kunlik_chiqim` SET summa='{$summa}',izox='{$izoh}',turi='{$turi}' WHERE id={$id}";  
    //echo $sql;    
    $res    =   $con->query($sql);
    if($res){echo "Malumotlar Muvaffaqiyatli O'zgartirildi!";}
    else{ echo "Xatolik Sodir Bo'ldi";}
}
function DeleteAjax()
{
    global $con;
    if(isset($_POST['cid']))
    {
        $idd    =   $_POST['cid'];
        $sql    =   "DELETE FROM `kunlik_chiqim` WHERE id={$idd}";         
        $res    =   $con->query($sql);
        if($res)
        {
            echo "Malumotlar Muvaffaqyatli O'chirildi!";
        }
        else{
            echo "Xatolik Sodir Bo'ldi";
        }
    }
}


//  Chiqimlar Ro'yxatini Olish

function KunlikChiqimlar()
{
    global $con;
    $sana = date('Y-m-d');
    $re = $con->query("SELECT * FROM `kunlik_chiqim` WHERE sana LIKE '%".$sana."%' ORDER BY sana DESC");  
    $array = []; $i=0;
    while($row = $re->fetch_array()){
        $array[$i] = $row; $i++;
    }
    return $array;
}

//  To'lov Tarixini Olish

function    TolovTarixi()
{
    global $con;
    $sana = date('Y-m-d');
    $re = $con->query("SELECT * FROM `tolov_tarix` WHERE sana LIKE '%".$sana."%' ORDER BY sana DESC");  
    $array = []; $i=0;
    while($row = $re->fetch_array()){
        $array[$i] = $row; $i++;
    }
    return $array;
}
function JamiSummaNaqd()
{
    global $con;
    $sana   =   date("Y-m-d");
    $res    =   $con->query("Selec")
}
function NaqdKassaInsert()
{
    global $con;
    $con->autocommit(false);
    
	try {
            if(isset($_POST['tasdiq']))
            {
                $jsum   = str_replace(" ","",$_POST['jami_summa']);
                $chsum  =   str_replace(" ","",$_POST['kirim_summa']);
                $fcode  =   "100";
                $re =   $con->query("INSERT INTO naqd_kassa(`kirim`,`chiqim`,`filial_kodi`) VALUES('{$jsum}','{$chsum}','{$fcode}') ") or die($con->error);
                if($re)
                {
                    true;
                } 
                else 
                {
                    throw new Exception("Error Processing Request", 1);
                }  ?>

                <script>
                     window.location="?a=boshqarmaga_prixod";
                </script>
                <?php
               
            }
         

        $con->commit();    
    }   

    catch(Exception $e) 
    {
        echo "Xatolik Sodir Bo'ldi";
          
        //$con->rollback();
    }
  
}
function BPrixod()
{
    echo "Salom";
}
?>