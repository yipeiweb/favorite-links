<template>
<div>
        <paginate name="categories" :list="categories" :per="5" v-if="categories.length > 0">
            <li class="list-group-item mb-4"
                v-for="(category, index) in paginated('categories')" :key="index" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <a :href="'/categories/'+category.id"
                                class="text-decoration-none">
                                <h5>{{ category.name }}</h5>
                            </a>

                            <p> {{ category.description }}</p>

                            <div v-if="isAuth">
                                <a :href="'categories/' + category.id + '/edit'" class="btn btn-warning mr-2">
                                   <i class="bi bi-pencil-fill"></i>
                                </a>
                                <button class="btn btn-danger" @click="deleteCategory(category, index)">
                                   <i class="bi bi-trash"></i>
                                </button>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <span class="badge badge-primary">
                               {{ category.created_at | moment('from', 'now') }}
                            </span>
                        </div>
                    </div>
                </div>
            </li>
        </paginate>

        <div v-else class="m-2" >
            Opps! Aquí aún no hay nada.
        </div>

        <paginate-links for="categories" v-if="categories.length > 5"
            :classes="{'ul': 'pagination', 'li': 'page-item', 'a': ['page-link', 'btn']}"></paginate-links>
</div>
</template>

<script src="./CategoriesList.js"></script>
