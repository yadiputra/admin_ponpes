 <section class="content">
        <div class="container-fluid">
            <!-- CKEditor -->
			<?php echo $message;?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Tambah Berita
                            </h2>
                        </div>
                        <div class="body">
						<form action="<?php echo base_url();?>admin/index/<?php echo $berita['kod'] ?>" method="post" enctype="multipart/form-data">
                        <h2 class="card-inside-title">Judul</h2>
						<div class="form-group form-float">
							<div class="form-line focused">
								<textarea rows="2" name="judul" class="form-control no-resize" maxlength="60" minlength="30" placeholder="Silahkan input judul berita"><?php echo $berita['title'] ?></textarea>
							</div>
							<div class="help-info">Min. 30, Max. 60 characters</div>
						</div>
							<h2 class="card-inside-title">Gambar</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
										 <input type="file" class="form-control" name="foto">
                                        </div>
											<input type="text" class="form-control hidden" name="img" value="<?php echo $berita['img'] ?>">
											<i style='color:red' <?php echo $berita['hidden'] ?>>Gambar Saat ini : </i>
											<a target='_BLANK' href="<?php echo base_url();?>assets/img/<?php echo $berita['img'] ?>"><?php echo $berita['img'] ?></a>   
                               
                                    </div>
                                </div>
							 </div>
							  <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                         <h2 class="card-inside-title">Detail Berita</h2>
										  <textarea id="ckeditor" name="detail"><?php echo $berita['detail'] ?>
										</textarea>
                                    </div>
                                </div>
							 </div>
							<button class="btn btn-primary waves-effect" type="submit" name="submit">Kirim</button>
						 </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CKEditor -->
        </div>
    </section>