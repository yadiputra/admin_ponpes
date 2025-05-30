 <section class="content">
        <div class="container-fluid">
            <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Tambah Prestasi
                            </h2>
                        </div>
                        <div class="body">
						<form id="form_validation" action="<?php echo base_url();?>prestasi"  method="POST" novalidate="novalidate">
								<div class="row">
									<div class="col-sm-12">
										<select name="kelas" id="kelas" class="form-control show-tick">
											<option value="" disabled selected>-- Kelas --</option>
											<optgroup label="Kelas X">
											<option value="11">X</option>
											</optgroup>
											<optgroup label="Kelas XI">
											<option value="21">XI MIPA</option>
											<option value="22">XI IPS</option>
											</optgroup>
											<optgroup label="Kelas XII">
											<option value="31">XII MIPA</option>
											<option value="32">XII IPS</option>
											</optgroup>
										</select>
									</div>
								</div>
								<div class="row">
								<div class="col-sm-12">
                                    <select name="nama" id="nama" class="form-control show-tick" data-live-search="true">
									<option value="" disabled selected>-- Nama Siswa --</option>
                                    </select>
                                </div>
                                </div>
								<div class="form-group">
                                    <input type="radio" name="tingkat" value="1" id="kab" class="with-gap">
                                    <label for="kab">Tingkat Kab / Kota</label>

                                    <input type="radio" name="tingkat" value="2" id="prov" class="with-gap">
                                    <label for="prov" class="m-l-20">Tingkat Provinsi</label>
									
									<input type="radio" name="tingkat" value="3" id="nas" class="with-gap">
                                    <label for="nas" class="m-l-20">Tingkat Nasional</label>
                                </div>
                                <div class="row">
									<div class="col-sm-12">
										<select name="juara" id="juara" class="form-control show-tick">
											<option value="" disabled selected>-- Juara --</option>
											<option value="Juara 1">Juara 1</option>
											<option value="Juara 2">Juara 2</option>
											<option value="Juara 3">Juara 3</option>
											<option value="Mendali Perunggu">Mendali Perunggu</option>
											<option value="Mendali Perak">Mendali Perak</option>
											<option value="Mendali Emas">Mendali Emas</option>
										</select>
									</div>
								</div>                           
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="keterangan" cols="30" rows="5" class="form-control no-resize" required="" aria-required="true"></textarea>
                                        <label class="form-label">Keterangan Lomba</label>
                                    </div>
                                </div>                             
                                <button class="btn btn-primary waves-effect" name="submit" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CKEditor -->
        </div>
    </section>