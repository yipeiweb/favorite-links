export default {
    props: ['linkdata', 'categoriesdata', 'selectedcategoriesdata'],
    data() {
        return {
            link: {
                name: this.linkdata.name,
                description: this.linkdata.description,
                url: this.linkdata.url,
                id: this.linkdata.id,
                categories: this.selectedcategoriesdata
            },
            categories: this.categoriesdata,
            paginate: ['categories']
        }
    },
    methods: {
        linkEdit(link){
            const params = {
                name: link.name,
                description: link.description,
                url: link.url,
                categories: link.categories
            };

            axios.put(`/links/`+this.link.id, params)
                 .then(res=>{
                    this.$swal({
                        text: 'Se ha editado el enlace correctamente! Quieres ir al enlace?',
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
                        text: 'Opps! Ha producido un error en momento de editar el enlace',
                        showCloseButton: true,
                        icon: 'error'
                      });
                });
        }
    }
}
