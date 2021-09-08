<?php
    $filial =   'buvayda';

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Boshqarmaga Prixod</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Bosh Sahifa</a></li>
                        <li class="breadcrumb-item active">Boshqarmaga Prixod</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Bugungi To'lovlar</h3>
                        </div>
                        <div class="card-body"> 
                            <table id="example7" class="table table-hover table-bordered">
                                    <thead>
                                    <tr class="text-center">
                                        <th>№</th>
                                        <th>Dela Raqami</th>
                                        <th>To'lov Vaqti</th>
                                        <th>Summa</th>
                                        <th>Izox</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center" id="client_table">
                                    <?php $res1= TolovTarixi();?>
                                    <?php if(empty($res1[0])) {
                                        echo "<h3 id='delon' class='mt-5 text-center'>To'lovlar Hozircha Topilmadi!</h3>";                                            
                                    }?>
                                    <?php $a = 1;?>
                                        <?php foreach($res1 as $ch):?>
                                            <tr style="text-align:center;" id="qat<?=$ch['id']?>">
                                                    <td ><?=$a?></td>
                                                    <td ><?=$ch['client_id']?></td>
                                                    <td ><?=$ch['sana']?></td>
                                                    <td ><?=$ch['summa']?></td>
                                                    <td ><?=$ch['izox']?></td>                                    
                                            </tr>  
                                        <?php $a++; ?>
                                        <?php endforeach;?> 
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
                <div class="col-lg-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Quick Example</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" id="bform">
                        <div class="card-body">
                            <div class="form-group">
                                <label >Bugungi Jami Summa</label>
                                <input require type="text" name="jami_summa" id="jami_summa" class="number-separator form-control" value="1250000">
                                <input require type="hidden" name="filial_nomi" value="<?=$filial;?>">
                            </div>
                            <div class="form-check mb-lg-2">
                                <input type="checkbox" class="form-check-input" id="toliq_kirim">
                                <label class="form-check-label" for="toliq_kirim">To'liq Kirim Qilish</label>
                            </div>
                            <div class="form-group">
                                <label>Boshqarmaga Kirim Qilish</label>
                                <input require type="text" class="number-separator form-control" name="kirim_summa" id="bkirim_summa">
                            </div>              
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="submit" name="tasdiq" class="btn btn-primary" id="btntas" value="Tasdiqlash">
                            <input type="reset" class="btn btn-danger" value="Bekor Qilish">
                        </div>
                    </form>
                    <?php NaqdKassaInsert();?>
                    </div>

                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>