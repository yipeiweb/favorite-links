<template>
  <div>
    <ul class="list-group" v-if="links.length > 0">
      <li
        class="list-group-item mb-4"
        v-for="(link, index) in links"
        :key="index"
      >
        <div class="container">
          <div class="row">
            <div class="col-md-10">
              <h3>
                <a
                  class="text-decoration-none"
                  :href="link.url"
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  {{ link.name }}
                </a>
              </h3>
              <p>{{ link.description }}</p>
            </div>
            <div class="col-md-2">
              <span class="badge badge-primary">
                {{ link.created_at | moment("from", "now") }}
              </span>
            </div>
          </div>
        </div>

        <div v-if="isAuth">
          <a :href="'links/' + link.id + '/edit'" class="btn btn-warning mr-2">
            <i class="bi bi-pencil-fill"></i>
          </a>
          <button class="btn btn-danger" @click="deleteLink(link, index)">
            <i class="bi bi-trash"></i>
          </button>
        </div>
      </li>
    </ul>
    <div v-else class="m-2">
        Opps! Aquí aún no hay nada.
    </div>
  </div>
</template>

<script src="./LastLinks.js"></script>
