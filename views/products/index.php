<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container-fluid salon-index position-relative">
  <div class="row pt-5">
    <div class="col-lg-3">

      <?php
      echo $this->render('/partialviews/_sidenav', [
        'sidebarData' => $this->params['sidebarData'] ?? []
      ]);
      ?>
    </div>
    <div class="col-lg-9">
      <!-- Product Wrapper -->
      <div class="product-wrapper row">
        <?php foreach ($products as $index => $product): ?>
          <div class="col-md-4 product-content">
            <div class="body">
              <div class="d-flex justify-content-between mt-3">
                <img src="<?= Url::to('@web/' . Html::encode($product->image)) ?>"
                  alt="<?= Html::encode($product->name) ?>" class="product-image">
                <p class="text-dark fs-6 fw-bolder">
                  <?= Html::encode($product->name) ?>
                </p>
              </div>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <p class="text-dark fs-6 fw-normal mb-0">Shs.
                  <?= Html::encode($product->price) ?>
                </p>
                <button class="btn btn-sm btn-outline-success increment ms-2" data-id="<?= $product->id ?>"
                  data-price="<?= $product->price ?>">
                  <i class="fa-solid fa-plus"></i>
                </button>
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

  <!-- Shopping Cart -->
  <div class="shopping-cart position-absolute top-0 end-0 p-3">
    <div class="cart row">
      <div class="col-md-4 cart-content">
        <div class="position-relative d-inline-block">
          <i class="fa-solid fa-cart-shopping fs-4 text-black"></i>
          <span class="text-dark  mx-2 cart-count position-absolute top-0 start-100 translate-middle rounded-circle">
            0
          </span>
        </div>
        <h5 class="mt-3 text-primary">Your Cart</h5>
        <div class="d-flex justify-content-center align-items-center my-3">
          <button class="btn btn-sm btn-outline-danger decrement me-2" data-id="<?= $product->id ?>"
            data-price="<?= $product->price ?>">
            <i class="fa-solid fa-minus"></i>
          </button>
          <span class="quantity badge bg-secondary fs-6" id="quantity-<?= $product->id ?>">0</span>
          <button class="btn btn-sm btn-outline-success increment ms-2" data-id="<?= $product->id ?>"
            data-price="<?= $product->price ?>">
            <i class="fa-solid fa-plus"></i>
          </button>
        </div>
        <p class="mb-1">Total Items: <span class="fw-bold cart-total-items">0</span></p>
        <p class="mb-1">Total Price: <span class="fw-bold text-success">Shs.
            <span class="cart-total-price">0</span></span></p>
        <button class="btn btn-primary w-100 mt-3">Proceed to Checkout</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    let cartCount = 0;
    let totalPrice = 0;

    document.querySelectorAll(".increment").forEach(button => {
      button.addEventListener("click", function () {
        const productId = this.dataset.id;
        const productPrice = parseInt(this.dataset.price);
        const quantityElement = document.getElementById(`quantity-${productId}`);

        // Increment quantity
        let quantity = parseInt(quantityElement.innerText);
        quantity += 1;
        quantityElement.innerText = quantity;

        // Update cart
        cartCount += 1;
        totalPrice += productPrice;
        updateCart();
      });
    });

    document.querySelectorAll(".decrement").forEach(button => {
      button.addEventListener("click", function () {
        const productId = this.dataset.id;
        const productPrice = parseInt(this.dataset.price);
        const quantityElement = document.getElementById(`quantity-${productId}`);

        // Decrement quantity
        let quantity = parseInt(quantityElement.innerText);
        if (quantity > 0) {
          quantity -= 1;
          quantityElement.innerText = quantity;

          // Update cart
          cartCount -= 1;
          totalPrice -= productPrice;
          updateCart();
        }
      });
    });

    function updateCart() {
      document.querySelector(".cart-count").innerText = cartCount;
      document.querySelector(".cart-total-items").innerText = cartCount;
      document.querySelector(".cart-total-price").innerText = totalPrice;
    }
  });
</script>