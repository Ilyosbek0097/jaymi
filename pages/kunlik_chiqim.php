<?php
  //include "ims/myphpfun/myfun.php";   
//   $con = mysqli_connect("localhost", "root", "", "credit");
//   $sana = date('Y-m-05');
//     $re = $con->query("SELECT * FROM `kunlik_chiqim` WHERE sana LIKE '%".$sana."%'");  
//     if($re->num_rows >0)
//     {
//         $res1 = $re;
        
//     } 
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chiqim</h1>
                    <b class="d-none" id="amal_id"><?php  if(isset($_REQUEST['edit_id'])){echo "edit=".$_REQUEST['edit_id'];} if(isset($_REQUEST['del_id'])){echo "del=".$_REQUEST['del_id'];} ?></b>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Kunlik Chiqim</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo "<span class='alert alert-info'>".date("d-M-Y")."</span>";?> <span class="alert alert-primary">Bugungi Chiqimlar</span></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                                <button type="button" id="salom" style="margin-bottom:15px;" class="btn btn-success btn-sm col-2" data-toggle="modal" data-target="#modal-default">
                                    Chiqim Qo'shish
                                </button>
                                <table id="example1" class="mt-md-5 table table-hover table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="width: 10px;">№</th>
                                            <th>Chiqim Sababi</th>
                                            <th>Summasi</th>                                           
                                            <th>Turi</th>                                           
                                            <th>Tahrirlash</th>                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $res1= KunlikChiqimlar();?>
                                        <?php if(empty($res1[0])) {
                                            echo "<h3 id='delon' class='mt-5 text-center\'>Chiqimlar hozircha yo'q!</h3>";                                            
                                        }?>
                                        <?php $a = 1;?>
                                            <?php foreach($res1 as $ch):?>
                                                <tr style="text-align:center;" id="qat<?=$ch['id']?>">
                                                        <td ><?=$a?></td>
                                                        <td class="iz<?=$ch['id']?>" data-target="izoh"><?=$ch['izox']?></td>
                                                        <td class="sum<?=$ch['id']?>" data-target="summa"><?=$ch['summa']?></td>
                                                        <td class="tur<?=$ch['id']?>" data-target="turi"><?=$ch['turi']?></td>
                                                        <td>
                                                            <div class="btn-group">                                                        
                                                                <a style="cursor: pointer;" data-role="chedit" href="#" data-id="chedit<?=$ch['id']?>" class="btn btn-outline-primary" title="Chiqimni O'zgartirish">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <a style="cursor: pointer;" href="#" data-id="chdel<?=$ch['id']?>" class="ml-2 btn btn-outline-danger" data-role="chdelete" title="Chiqimni O'chirish" >
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                </tr>  
                                            <?php $a++; ?>
                                            <?php endforeach;?> 
                                    </tbody>                                    
                                </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- MODALLAR OYNASI-1 -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chiqim Malumoti</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="GET" id="formachiqim">                                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Summa</label>
                                    <input type="text" id="summa" name="summa" class="form-control" placeholder="Kiriting ...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Izoh</label>
                                    <textarea id="izoh" class="form-control" name="izoh" rows="2" placeholder="Kiriting ..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Sarf Turi</label>
                                    <select id="turi" class="form-control" name="turi">
                                        <option value="naqd">Naqdan</option>
                                        <option value="plastik">Plastikdan</option>
                                    </select>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Bekor qilish</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="chiqimButton">Tasdiqlash</button>
                    </div>
                </form>
                
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- MODALLAR OYNASI-2 -->
<div class="modal fade" id="modal-amal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chiqim Malumotini O'zgartirish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="GET" id="formachiqim">                                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="hidden" id="dbid" name="idno">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Summa</label>
                                    <input type="text" id="esumma" name="summa" class="form-control" placeholder="Kiriting ...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Izoh</label>
                                    <textarea id="eizoh" class="form-control" name="izoh" rows="2" placeholder="Kiriting ..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Sarf Turi</label>
                                    <select id="eturi" class="form-control" name="turi">
                                        <option value="naqd">Naqdan</option>
                                        <option value="plastik">Plastikdan</option>
                                    </select>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Bekor qilish</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="editButton">Tasdiqlash</button>
                    </div>
                </form>
                
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--Delete Modal -->
<div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Diqqat!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">         
        <p class="d-none" id="pro"></p>
        <h4>Siz Rostdan Ham Ushbu Ma'lumotni O'chirmoqchimisiz?</h4>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Bekor Qilish</button>
        <button id="tas_delete" type="button" class="btn btn-danger" data-dismiss="modal">O'chirish</button>
      </div>
    </div>
  </div>
</div>

