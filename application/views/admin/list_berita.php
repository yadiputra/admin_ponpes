 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <!-- Basic Examples -->
			<?php echo $message;?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LIST BERITA PONPES DARUSSALAMAH
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Detail</th>
                                            <th>Tanggal Upload</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach ($berita as $row){
									echo "
                                        <tr>
                                            <td>".$row['title']."</td>
                                            <td>".phpmu($row['detail'], 200)."</td>
                                            <td>".tgl_indo($row['tgl_up'])."</td>
                                            <td><img class='img-responsive' src='http://localhost/ponpes_admin/assets/img/".$row['img']."'></td>
                                            <td>
											<div class='button-demo'>
												<a type='button' href='".base_url()."admin/index/".$row['kod']."' class='btn btn-warning waves-effect'>EDIT</a>
												<a type='button' href='".base_url()."admin/berita_del/".$row['kod']."' class='btn btn-danger waves-effect'>HAPUS</a>
												</div>
											</td>
                                        </tr>
									";
									}?>
									</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>