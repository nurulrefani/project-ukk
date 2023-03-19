<?= $this->extend('Masyarakat/Dashboard') ?>
<?= $this->section('content') ?>

<div class="row">

    <!-- bagian kiri -->
    <div class="col-md-5">
    <!-- Success Upload -->
<?php if(!empty(session()->getFlashdata('success'))){ ?>
            <div class="alert alert-success">
                <?php echo session()->getFlashdata('success');?>
            </div>
        <?php } ?>
        <?php 
            $errors = $validation->getErrors();
            if(!empty($errors))
            {
                echo $validation->listErrors('my_list');
            }
        ?>
        <br>
    <p><h4>Tulis Laporan</h4></p>
    <?= form_open_multipart(base_url('/masyarakat/upload')); ?>
        <div class="form-group">
                    <input type="file" name="file_upload" id=""> 
        </br><p>files type .jpg .png</p>
                    <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
        </div>
        <div class="form-group">
                <label class="font-weight-bold">Pengaduan</label>
                <textarea name="txtInputPengaduan" class="form-control" rows="5" id="comment" required></textarea>
        </div>
        <div class="form-group">
                    <?= form_submit('Send', 'Kirim') ?>
        </div>
        </br>
    <?= form_close() ?>
    </div>


    <!-- bagian kanan -->
    <div class="col-md-7">
        <br>
        <p>Daftar Laporan tanggal <?=date('d M Y');?> :</p>
        <table class="table table-sm">
            <thead class="bg-secondary text-center">
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal Masuk</th>
                    <th>Status</th>
                    <th>Aksi<th>
        </br>
                    </tr>
            </thead>
            <tbody>
            <?php
            $htmlData=null;
            $no=null;
            $total=null;
            foreach($listPengaduan as $x){
                $no++;
                $htmlData ='<tr>';
                $htmlData .='<td>'.$no.'.</td>';
                $htmlData .='<td>'.$x['nik'].'</td>';
                $htmlData .='<td>'.$x['nama'].'</td>';
                $htmlData .='<td>'.$x['tgl_pengaduan'].'</td>';
                $htmlData .='<td>'.$x['status'].'</td>';
                $htmlData .='<td class="text-center">';
                $htmlData .='<a href="/masyarakat/detail/'.$x['id_tanggapan'].'" > Detail </a>';
                $htmlData .='</td>';
                $htmlData .='</tr>';
                echo $htmlData;
            }
            ?>
            </tbody>
        </table>
    </div>

</div>

<?=$this->endSection();?>