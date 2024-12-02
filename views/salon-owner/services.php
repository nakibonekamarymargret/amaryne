<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Services</title>
    <style>
        .service-description {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100%;
            display: block;
        }

        .service-description.expanded {
            white-space: normal;
        }

        .service-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .action-buttons button {
            width: 48%;
        }
    </style>
</head>

<body>
    <div class="services-section container">
        <div class="header d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3"><strong>My Services</strong></h1>
            <div class="options d-flex gap-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#createServiceModal">
                    <i class="fa-solid fa-plus"></i>
                </a>
                <a href="#">
                    <i class="fa-solid fa-angle-down"></i>
                </a>
                <a href="#">
                    <i class="fa-solid fa-list"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($services)): ?>
                <?php foreach ($services as $index => $service): ?>
                    <div class="col-md-4 mb-4">
                        <h5 class="text-center text-uppercase font-monospace">
                            <?= Html::encode($service->name) ?>
                        </h5>
                        <div class="service-card border p-3 rounded">
                            <div class="service-image mb-3" data-id="<?= Html::encode($service->id) ?>">
                                <img src="<?= Url::to('@web/' . Html::encode($service->service_image)) ?>"
                                    alt="<?= Html::encode($service->name) ?>">
                            </div>
                            <p class="mb-3">
                                <span class="service-description" id="service-description-<?= $index ?>">
                                    <?= Html::encode($service->description) ?>
                                </span>
                                <a href="#" id="toggle-link-<?= $index ?>" class="toggleDescription text-primary">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </a>
                            </p>
                            <div class="action-buttons d-flex justify-content-between">
                                <button type="button" class="btn btn-primary edit-service-btn"
                                    data-id="<?= $service->id ?>"
                                    data-name="<?= Html::encode($service->name) ?>"
                                    data-description="<?= Html::encode($service->description) ?>"
                                    data-price="<?= $service->price ?>"
                                    data-discount="<?= $service->discount ?>"
                                    data-bs-toggle="modal" data-bs-target="#editServiceModal">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>No services yet.</p>
                    <a href="<?= Url::to(['salon-owner/create-service']) ?>" class="btn btn-primary">
                        Add Service
                    </a>
                    <button class="btn btn-secondary">Add Later</button>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Create Service Modal -->
    <div class="modal fade" id="createServiceModal" tabindex="-1" aria-labelledby="createServiceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createServiceModalLabel">Create Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <?php $form = ActiveForm::begin([
                        'action' => ['salon-owner/create-service'],
                        'options' => ['enctype' => 'multipart/form-data']
                    ]) ?>
                    <?= $form->field($model, 'service_image')->fileInput([
                        'class' => 'form-control',
                        'onchange' => 'previewImage(event)'
                    ])->label('Service Image') ?>
                    <img id="imagePreview" class="img-fluid mt-2 mb-3 d-none" alt="Service Preview">
                    <?= $form->field($model, 'name')->textInput(['class' => 'form-control'])->label('Service Name') ?>
                    <?= $form->field($model, 'description')->textarea(['class' => 'form-control'])->label('Description') ?>
                    <?= $form->field($model, 'price')->input('number', ['class' => 'form-control'])->label('Service Price') ?>
                    <?= $form->field($model, 'discount')->input('number', ['class' => 'form-control'])->label('Discount') ?>
                    <div class="text-end mt-3">
                        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Service Modal -->
    <div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Editing logic here...</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleLinks = document.querySelectorAll('.toggleDescription');

            toggleLinks.forEach(link => {
                link.addEventListener('click', event => {
                    event.preventDefault();
                    const description = link.previousElementSibling;
                    description.classList.toggle('expanded');
                    link.innerHTML = description.classList.contains('expanded')
                        ? '<i class="fa-solid fa-chevron-up"></i>'
                        : '<i class="fa-solid fa-chevron-down"></i>';
                });
            });

            // Preview Image
            window.previewImage = function (event) {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.src = URL.createObjectURL(event.target.files[0]);
                imagePreview.classList.remove('d-none');
            };

            // Populate Edit Modal
            document.querySelectorAll('.edit-service-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    // Populate modal inputs with selected service data
                    console.log(this.dataset); // Example logic
                });
            });
        });
    </script>
</body>

</html>
