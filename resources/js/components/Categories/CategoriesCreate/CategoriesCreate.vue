<template>
<div>
    <form @submit.prevent="categoryCreate(category)">
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">
                <a class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-person"></i>
                    Name
                </a>
            </label>
            <div class="col-sm-9">
                <input type="text" id="name" class="mb-2 form-control"
                    v-model="category.name" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">
                <a class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-file-earmark-text"></i>
                    Descripción
                </a>
            </label>
            <div class="col-sm-9">
                <textarea class="form-control" id="description"
                    rows="3" v-model="category.description" required></textarea>
            </div>
        </div>

    <button class="btn btn-success" type="submit">
        <i class="bi bi-plus-lg"></i>
        Crear
    </button>
    </form>
</div>
</template>

<script src="./CategoriesCreate.js"></script>
