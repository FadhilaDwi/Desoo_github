<!-- Surat -->
  <section class="blog bgwhite p-t-60 p-b-60">
    <div class="container">
      <div class="sec-title p-b-52">
        <h3 class="m-text5 t-center">
          Pemerintahan Desa
        </h3>
      </div>
      <div class="row">
        <?php foreach($pemdes as $pemdes) { ?>
          <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
      
            <div class="card">
              <a href="<?php echo base_url('pemdes/detail/'.$pemdes->id_pemdes) ?>">
                <img src="<?php echo base_url('assets/upload/image/gambar_pemdes/'.$pemdes->gambar_pemdes) ?>" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title"><?php echo $pemdes->nama_pemdes ?></h5>
                </div>
              </a>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="row justify-content-center">
        <div class="btn-addcart-product-detail size14 trans-0-4 m-t-30">
          <a href="<?php echo base_url('pemdes') ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Lainnya</a>
        </div>
      </div>
    </div>
  </section>