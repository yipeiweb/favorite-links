<template>
<div>
    <form @submit.prevent="userUpdate(user)">
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">
                <a class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-person"></i>
                    Name
                </a>
            </label>
            <div class="col-sm-9">
                <input type="text" id="name" class="mb-2 form-control"
                    v-model="user.name" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">
                <a class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-envelope"></i>
                    Email
                </a>
            </label>
            <div class="col-sm-9">
                <input type="text" id="email" class="mb-2 form-control"
                    v-model="user.email" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">
                <a class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-key-fill"></i>
                    Password
                </a>
            </label>
            <div class="col-sm-9">
                <input type="password" id="password" class="mb-2 form-control"
                    v-model="user.password" required>
            </div>
        </div>
    <button class="btn btn-warning" type="submit">
        <i class="bi bi-pencil-fill"></i>
        Editar
    </button>
    </form>
</div>
</template>

<script src="./UserEdit.js"></script>
