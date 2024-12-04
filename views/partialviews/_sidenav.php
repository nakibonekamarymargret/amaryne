<?php

use yii\helpers\Url;
use yii\helpers\Html
?>

<div class="sidenav">
    <ul class="nav flex-column">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Welcome <span></span></h5>

        <!-- Popular Hair Salons -->
        <li class="nav-item">
            <div class="popularSalons">
                <h3 class="mt-2">Popular Hair Salons</h3>
                <?php foreach ($popularHairSalons as $salon): ?>
                    <a href="<?= Url::to(['salons/view', 'id' => $salon->id]) ?>" class="nav-link text-dark">
                        <img src="<?= Url::to('@web/' . Html::encode($salon->salon_image)) ?>"
                            alt="<?= Html::encode($salon->name) ?>" class="nav-image">
                        <span class="ms-2"><?= htmlspecialchars($salon->name) ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </li>

        <!-- Popular Nail Clinics -->
        <li class="nav-item">
            <div class="nailClinics">
                <h4 class="mt-4">Popular Nail Clinics</h4>
                <?php foreach ($popularNailClinics as $salon): ?>
                    <a href="<?= Url::to(['salons/view', 'id' => $salon->id]) ?>" class="nav-link text-dark">
                    <img src="<?= Url::to('@web/' . Html::encode($salon->salon_image)) ?>"
                    alt="<?= Html::encode($salon->name) ?>" class="nav-image">                        <span class="ms-2"><?= htmlspecialchars($salon->name) ?></span>
                    </a>
                <?php endforeach; ?> 
            </div>
        </li>

        <!-- Beauty Shops -->
        <li class="nav-item">
            <div class="beautyShops">
                <h4 class="mt-4">Beauty Shops</h4>
                <?php foreach ($beautyShops as $shop): ?>
                    <a href="<?= Url::to(['salons/view', 'id' => $shop->id]) ?>" class="nav-link text-dark">
                    <img src="<?= Url::to('@web/' . Html::encode($salon->salon_image)) ?>"
                    alt="<?= Html::encode($salon->name) ?>" class="nav-image">                    <span class="ms-2"><?= htmlspecialchars($shop->name) ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </li>

        <!-- Other -->
        <li class="nav-item">
            <div class="other">
                <h5 class="mt-4"><b>Other</b></h5>
                <?php foreach ($otherSalons as $salon): ?>
                    <a href="<?= \yii\helpers\Url::to(['salons/view', 'id' => $salon->id]) ?>" class="nav-link text-dark">
                    <img src="<?= Url::to('@web/' . Html::encode($salon->salon_image)) ?>"
                    alt="<?= Html::encode($salon->name) ?>" class="nav-image">                        <span class="ms-2"><?= htmlspecialchars($salon->name) ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </li>
    </ul>
</div>

<!-- 
<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
    aria-controls="offcanvasScrolling"><i class="fa-solid fa-bars"></i></button>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Welcome <span></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="popularSalons">
            <h3 class="mt-2">Popular Hair Salons</h3>
            <a href="#" class="nav-link text-dark">
                <i class="bi bi-house-fill text-warning"></i>
                <span class="ms-2">Ciara Curls</span>
            </a>
            <a href="#" class="nav-link text-dark">
                <i class="fa-solid fa-folder-plus text-primary" aria-hidden="true"></i>
                <span class="ms-2">Demure Beauties</span>
            </a>
            <a href="#" class="nav-link text-dark">
                <i class="fa-solid fa-microphone-lines text-secondary" aria-hidden="true"></i>
                <span class="ms-2">The Pink Lady</span>
            </a>

        </div>
        <div class="nailClinics">
            <h4 class="mt-4">Popular Nail Clinics</h4>
            <a href="#" class="nav-link text-dark">
                <i class="fa-solid fa-camera-retro text-secondary-emphasis" aria-hidden="true"></i>
                <span class="ms-2">Cuties</span>
            </a>
            <a href="#" class="nav-link text-dark">
                <i class="fa-solid fa-tag text-warning" aria-hidden="true"></i>
                <span class="ms-2">MP Clinic</span>
            </a>
            <a href="#" class="nav-link text-dark">
                <i class="bi bi-lightbulb-fill text-warning"></i>
                <span class="ms-2">Glamour Nails</span>
            </a>

        </div>
        <div class="beautyShops">
            <h4 class="mt-4">Beauty Shops</h4>
            <a href="#" class="nav-link text-dark">
                <i class="fa-solid fa-bag-shopping text-info" aria-hidden="true"></i>
                <span class="ms-2">Your Wig</span>
            </a>
            <a href="#" class="nav-link text-dark">
                <i class="bi bi-heart-fill text-danger"></i>
                <span class="ms-2">Chicy Lady</span>
            </a>
            <a href="#" class="nav-link text-dark">
                <i class="bi bi-trophy-fill text-warning"></i>
                <span class="ms-2">CC Stores</span>
            </a>

        </div>
        <div class="other">
            <h5 class="mt-4"><b>Other</b></h5>
            <a href="#" class="nav-link text-dark">
                <i class="bi bi-hand-thumbs-up-fill text-warning fs-5"></i>
                <span class="ms-2">Tips to Grow Your Hair</span>
            </a>
            <a href="#" class="nav-link text-dark">
                <i class="bi bi-emoji-sunglasses text-warning fs-5"></i>
                <span class="ms-2">Nail Hygiene</span>
            </a>
            <a href="#" class="nav-link text-dark">
                <i class="bi bi-eye fs-6"></i>
                <span class="ms-2">How to Stay Young and Classy</span>
            </a>
        </div>
        <div class="socials">

            <a href="#" class="px-2" aria-label="Twitter"><i class="fa-brands fa-square-x-twitter"></i></a>
            <a href="#" class="px-2" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="px-2" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
            <a href="#" class="px-2" aria-label="Instagram"><i class="fa-brands fa-square-instagram"></i></a>
            <a href="#" class="px-2" aria-label="Messages"><i class="fa-regular fa-message"></i></a>
        </div>
    </div>
</div> -->