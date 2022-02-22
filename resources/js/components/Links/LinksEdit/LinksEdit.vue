<template>
<div>
    <form @submit.prevent="linkEdit(link)">
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">
                <a class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-person"></i>
                    Name
                </a>
            </label>
            <div class="col-sm-9">
                <input type="text" id="name" class="mb-2 form-control"
                    v-model="link.name" required>
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
                    rows="3" v-model="link.description" required></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="url" class="col-sm-3 col-form-label">
                <a class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-link"></i>
                    Url
                </a>
            </label>
            <div class="col-sm-9">
                <input type="text" id="url" class="mb-2 form-control"
                    v-model="link.url" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="categories" class="col-sm-3 col-form-label">
                <a class="btn btn-outline-primary btn-sm" data-toggle="collapse"
                    href="#categories" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="bi bi-folder"></i>
                    Categorias
                </a>
            </label>
            <div class="col-sm-9 collapse" id="categories">
                <paginate class="card card-body" name="categories" :list="categories" :per="5" v-if="categories.length > 0">
                    <div class="form-check form-check-inline"  v-for="(category, index) in paginated('categories')" :key="index">
                        <input class="form-check-input" type="checkbox" v-model="link.categories"
                            :id="'category'+index" :value="category.id">
                        <label class="form-check-label" :for="'category'+index">{{ category.name }}</label>
                    </div>
                </paginate>

                <paginate-links for="categories" v-if="categories.length > 5"
                            :classes="{'ul': 'pagination', 'li': 'page-item', 'a': ['page-link', 'btn']}"></paginate-links>
            </div>
        </div>

    <button class="btn btn-warning" type="submit">
        <i class="bi bi-pencil-fill"></i>
        Editar
    </button>
    </form>
</div>
</template>

<script src="./LinksEdit.js"></script>
