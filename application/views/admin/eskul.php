 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
			<?php echo $message;?>
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Tambah Ekstrakulikuler
                            </h2>
                        </div>
                        <div class="body">
						<form action="<?php echo base_url();?>admin/add_eskul/<?php echo $eskul['id'] ?>" method="post" enctype="multipart/form-data">
                        <h2 class="card-inside-title">Ekstrakulikuler</h2>
						<div class="form-group form-float">
							<div class="form-line focused">
								<textarea rows="2" name="judul" class="form-control no-resize" placeholder="Silahkan input Ekstrakulikuler"><?php echo $eskul['nama'] ?></textarea>
							</div>
						</div>
			        	<h2 class="card-inside-title">Gambar</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
										 <input type="file" class="form-control" name="foto1">
										</div>
                                    </div>
									<input type="text" class="form-control hidden" name="img" value="<?php echo $eskul['img'] ?>">
									<i style='color:red' <?php echo $eskul['hidden'] ?>>Gambar Saat ini : </i>
									<a target='_BLANK' href="<?php echo base_url();?>assets/img/<?php echo $eskul['img'] ?>"><?php echo $eskul['img'] ?></a>   
                                </div>
							 </div>
							<button class="btn btn-primary waves-effect" type="submit" name="submit">Kirim</button>
						 </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LIST EKSTRAKULIKULER PONPES DARUSSALAMAH
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Ekstrakulikuler</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach ($berita as $row){
									echo "
                                        <tr>
                                            <td>".$row['nama']."</td>
                                            <td><img class='img-responsive' src='".base_url()."assets/img/".$row['img']."'></td>
                                            <td>
											<div class='button-demo'>
												<a type='button' href='".base_url()."admin/eskul/".$row['id']."' class='btn btn-warning waves-effect'>EDIT</a>
												<a type='button' href='".base_url()."admin/eskul_del/".$row['id']."' class='btn btn-danger waves-effect'>HAPUS</a>
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