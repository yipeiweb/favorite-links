export default {
    props: ['categorydata'],
    data() {
        return {
            category: {
                name: this.categorydata.name ,
                description: this.categorydata.description ,
                id: this.categorydata.id ,
            }
        }
    },
    methods: {
        categoryEdit(category){
            const params = {
                name: category.name,
                description: category.description,
            };

            axios.put(`/categories/`+this.category.id, params)
                 .then(res=>{
                    this.$swal({
                        text: 'Se ha editado la categoría correctamente! Quieres ir a la categoría?',
                        showDenyButton: true,
                        confirmButtonText: `Ir`,
                        denyButtonText: `Me quedo aquí para seguir editando`,
                        icon: 'success'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href= res.data;
                        }
                    })
                }).catch(err => {
                    this.$swal({
                        text: 'Opps! Ha producido un error en momento de editar la categoría',
                        showCloseButton: true,
                        icon: 'error'
                      });
                });
        }
    }
}
