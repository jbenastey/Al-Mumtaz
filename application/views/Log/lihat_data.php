<div class="row">
  <div class="col-md-12">

  </div>
</div>
<!-- div row -->

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <!-- <div class="panel-heading">
        <?php echo anchor('karyawan/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
      </div> -->
<div class="panel-body">
  <h2 class="page-header">
    Log Aktivitas
  </h2>
  <div class="table-responsive">
    <table class="table table-bordered table-hover" id="dataTables-example">
      <thead>
        <tr>
          <th>NO.</th>
          <th>Log Time</th>
          <th>Log User</th>
          <th>Log Description</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
        foreach ($record->result() as $r) { ?>
          <tr class="gradeU">
            <td><?php echo $no ?></td>
            <td><?php echo $r->log_time ?></td>
            <td><?php echo $r->log_user ?></td>
            <td><?php echo $r->log_desc ?></td>


          <!-- <td class="center">
            <a class="btn btn-default" href="<?php echo site_url('karyawan/edit/'.$r->id_karyawan);?>"><i class="glyphicon glyphicon-edit"></i></a>
            <a class="btn btn-default" href="<?php echo site_url('karyawan/delete/'.$r->id_karyawan);?>"
            onclick="return confirm('apakah anda yakin ingin menghapus data ini?')"> <i class="glyphicon glyphicon-trash"></i></a>
          </td> -->
        </tr>
        <?php $no++; }?>
      </tbody>

    </table>
  </div>

</div>
    </div>
<!-- panel -->
  </div>

</div>
<!-- row -->
