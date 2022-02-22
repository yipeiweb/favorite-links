export default {
    data() {
        return {
            category: {
                name: '' ,
                description: '' ,
            }
        }
    },
    methods: {
        categoryCreate(category){
            const params = {
                name: category.name,
                description: category.description,
            };

            axios.post(`/categories`, params)
                 .then(res=>{
                    this.$swal({
                        text: 'Se ha creado la categoría correctamente! Quieres ir a la categoría?',
                        showDenyButton: true,
                        confirmButtonText: `Ir`,
                        denyButtonText: `Me quedo aquí para crear otra categoría`,
                        icon: 'success'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href= res.data;
                        }else if (result.isDenied) {
                            this.category.name = '';
                            this.category.description = '';
                        }
                    })
                }).catch(err => {
                    this.$swal({
                        text: 'Opps! Ha producido un error en momento de crear la categoría',
                        showCloseButton: true,
                        icon: 'error'
                      });
                });
        }
    }
}
