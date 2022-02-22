export default {
    props: ['categoriesdata', 'isauth'],
    data() {
        return {
            categories: this.categoriesdata,
            isAuth: this.isauth,
            paginate: ['categories']
        }
    },
    methods: {
        deleteCategory(category, index){
            this.$swal({
                text: 'Estas seguro de eliminar esta categoría? Se eliminarà los enlaces de la categoría también!',
                showDenyButton: true,
                confirmButtonText: `Eliminar`,
                denyButtonText: `Me equivocado`,
                icon: 'warning'
              }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/categories/${category.id}`)
                    .then(()=>{
                        this.paginate.categories.list.splice(index, 1);

                        this.$swal({
                            text: 'Se ha eliminado la categoría correctamente',
                            icon: 'success'
                        })
                    }).catch(err => {
                        this.$swal({
                            text: 'Opps! Ha producido un error en momento de eliminar la categoría',
                            showCloseButton: true,
                            icon: 'error'
                          });
                    })
                } else if (result.isDenied) {
                  this.$swal({
                    text: 'Se ha cancelado la acción de eliminar la categoría',
                    icon: 'info'
                  })
                }
            })
        }
    }
}
