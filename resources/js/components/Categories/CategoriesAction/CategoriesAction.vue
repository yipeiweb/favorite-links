<template>
<div>
    <a :href="categoryId+'/edit'" class="btn btn-warning mr-2">
        <i class="bi bi-pencil-fill"></i>
    </a>
    <button class="btn btn-danger" @click="deleteCategory()">
        <i class="bi bi-trash"></i>
    </button>
</div>
</template>

<script src="./CategoriesAction.js"></script>
