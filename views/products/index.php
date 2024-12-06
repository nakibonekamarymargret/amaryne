<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<div class="container-fluid salon-index ">
  <div class="row pt-5">
    <div class="col-lg-3">

      <?php
      echo $this->render('/partialviews/_sidenav', [
        'sidebarData' => $this->params['sidebarData'] ?? []
      ]);
      ?>
    </div>
    <div class="col-lg-9">
      <div class="product-wrapper">
        <?php foreach ($products as $index => $product): ?>
          <div class="col-md-4 product-content">
            <div class="body">
              <div class="d-flex justify-content-between mt-3">
              <img src="<?= Url::to('@web/' . Html::encode($product->image)) ?>"
              alt="<?= Html::encode($product->name) ?>" class="product-image" >
                <p class="text-dark fs-6 fw-bolder">
                  <?= Html::encode($product->name) ?>
                </p>

              </div>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <p class="text-dark fs-6 fw-normal mb-0">Shs.
                  <?= Html::encode($product->price) ?>
                </p>
                <a href="#" data-bs-toggle="modal" data-bs-target="#makeOrderModal">
                    <i class=" icon fa-solid fa-plus"></i>
                </a>
              </div>
            </div>
          </div>

          <?php if (($index + 1) % 3 === 0): ?>
            <div class="w-100"></div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</div>

<!-- make order -->
<div class="modal " id="makeOrderModal" tabindex="-1" aria-labelledby="makeOrderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="makeOrderModalLabel">Purchase <span>Product name</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
            </div>
        </div>
    </div>