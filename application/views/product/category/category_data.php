<section class="content-header">
    <h1>
        Kategori Barang
    </h1>
    <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Kategori Barang</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Kategori Barang</h3>
            <div class="pull-right">
                <a href="<?= site_url('category/add') ?>" class="btn btn-flat btn-primary">
                    <i class="fa fa-user-plus"></i> Tambah Kategori Barang
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori Barang</th>
                
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row as $r => $data) { ?>
                        <tr>
                        <td width="35px"><?= $no++ ?>.</td>
                            <td><?= $data->cname ?></td>
                           
                            
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('category/edit/' . $data->category_id) ?>" class="btn btn-xs btn-primary">
                                    <i class="fa fa-pencil"></i> Ubah
                                </a>
                                <a href="<?= site_url('category/del/' . $data->category_id) ?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


