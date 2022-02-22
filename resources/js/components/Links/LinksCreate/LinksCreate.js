export default {
    props: ['categoriesdata', 'categoryselected'],
    data() {
        return {
            link: {
                name: '' ,
                description: '' ,
                url: '' ,
                categories: this.categoryselected ?? []
            },
            categories: this.categoriesdata,
            paginate: ['categories']
        }
    },
    methods: {
        linkCreate(link){
            const params = {
                name: link.name,
                description: link.description,
                url: link.url,
                categories: link.categories
            };

            axios.post(`/links`, params)
                 .then(res=>{
                    this.$swal({
                        text: 'Se ha creado el enlace correctamente! Quieres ir al enlace?',
                        showDenyButton: true,
                        confirmButtonText: `Ir`,
                        denyButtonText: `Me quedo aquí para crear otro enlace`,
                        icon: 'success'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = res.data;

                            this.link.name = '';
                            this.link.description = '';
                            this.link.url = '';
                        }else if (result.isDenied) {
                            this.link.name = '';
                            this.link.description = '';
                            this.link.url = '';
                        }
                    })
                }).catch(err => {
                    this.$swal({
                        text: 'Opps! Ha producido un error en momento de crear el enlace',
                        showCloseButton: true,
                        icon: 'error'
                      });
                });
        }
    }
}
