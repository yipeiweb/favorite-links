export default {
    props: ['categoryid'],
    data() {
        return {
            categoryId: this.categoryid,
        }
    },
    methods: {
        deleteCategory(){
            this.$swal({
                text: 'Estas seguro de eliminar esta categoría? Se eliminarà los enlaces de la categoría también!',
                showDenyButton: true,
                confirmButtonText: `Eliminar`,
                denyButtonText: `Me equivocado`,
                icon: 'warning'
              }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/categories/${this.categoryid}`)
                    .then((res)=>{
                        this.$swal({
                            text: 'Se ha eliminado la categoría correctamente',
                            icon: 'success',
                            confirmButtonText: `Ver todas las categorías`
                        }).then((result)=> {
                            if (result.isConfirmed) {
                                window.location.href= res.data;
                            }
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
