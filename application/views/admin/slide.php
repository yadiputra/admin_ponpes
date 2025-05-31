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
                               Tambah Slide
                            </h2>
                        </div>
                        <div class="body">
						<form action="<?php echo base_url();?>admin/add_slide/<?php echo $slide['csl_id'] ?>" method="post" enctype="multipart/form-data">
                        <h2 class="card-inside-title">Judul</h2>
						<div class="form-group form-float">
							<div class="form-line focused">
								<textarea rows="2" name="judul" class="form-control no-resize" placeholder="Silahkan input judul slide"><?php echo $slide['title'] ?></textarea>
							</div>
						</div>
						<h2 class="card-inside-title">Detail Slide</h2>
						<div class="form-group form-float">
							<div class="form-line focused">
								<textarea rows="2" name="detail" class="form-control no-resize" placeholder="Silahkan input detail slide"><?php echo $slide['detail'] ?></textarea>
							</div>
						</div>
							<h2 class="card-inside-title">Gambar</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
										 <input type="file" class="form-control" name="foto">
                                        </div>
										 	<input type="text" class="form-control hidden" name="img" value="<?php echo $slide['foto'] ?>">
											<i style='color:red' <?php echo $slide['hidden'] ?>>Gambar Saat ini : </i>
											<a target='_BLANK' href="<?php echo base_url();?>assets/img/<?php echo $slide['foto'] ?>"><?php echo $slide['foto'] ?></a>   
									   
                                    </div>
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
                                LIST SLIDE PONPES DARUSSALAMAH
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Detail</th>
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
                                            <td><img class='img-responsive' src='".base_url()."assets/img/".$row['foto']."'></td>
                                            <td>
											<div class='button-demo'>
												<a type='button' href='".base_url()."admin/slide/".$row['csl_id']."' class='btn btn-warning waves-effect'>EDIT</a>
												<a type='button' href='".base_url()."admin/slide_del/".$row['csl_id']."' class='btn btn-danger waves-effect'>HAPUS</a>
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