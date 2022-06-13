                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>

                    <?php echo $this->session->flashdata('pesan') ?>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Menu</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Content</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <!-- untuk menampilkan datanya disini kita menggunakan foreach(perulangan) berdasarkan query yang ada di data jabatan-->
                        <?php $no = 1;
                        foreach ($portfolio1 as $p1) : ?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td class="text-center"><?php echo $p1['nama_portfolio'] ?></td>
                                <td class="text-center"><?php echo $p1['deskripsi'] ?></td>
                                <td class="text-center"><?php echo $p1['content'] ?></td>
                                <td>
                                    <center>
                                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataPortfolio/updateData1/' . $p1['id_portfolio']) ?>">
                                            <i class="fas fa-edit"></i></a>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php $no = 2;
                        foreach ($portfolio2 as $p2) : ?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td class="text-center"><?php echo $p2['nama_portfolio'] ?></td>
                                <td class="text-center"><?php echo $p2['deskripsi'] ?></td>
                                <td class="text-center"><?php echo $p2['content'] ?></td>
                                <td>
                                    <center>
                                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataPortfolio/updateData2/' . $p2['id_portfolio']) ?>">
                                            <i class="fas fa-edit"></i></a>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->