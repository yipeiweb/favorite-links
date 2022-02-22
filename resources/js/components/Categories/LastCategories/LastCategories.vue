<template>
<div>
        <ul class="list-group" v-if="categories.length > 0">
            <li class="list-group-item mb-4"
                v-for="(category, index) in categories" :key="index" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <a :href="'/categories/'+category.id"
                                class="text-decoration-none">
                                <h5>{{ category.name }}</h5>
                            </a>

                            <div v-if="isAuth">
                                <a :href="'categories/' + category.id + '/edit'" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <span class="badge badge-primary">
                               {{ category.created_at | moment('from', 'now') }}
                            </span>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div v-else>
            Opps aquí no hay nada aún
        </div>
</div>
</template>

<script src="./LastCategories.js"></script>
