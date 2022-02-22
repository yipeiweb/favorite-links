export default {
    props: ['linksdata', 'isauth'],
    data() {
        return {
            links: this.linksdata,
            isAuth: this.isauth
        }
    },
    methods: {
        deleteLink(link, index){
            this.$swal({
                text: 'Estas seguro de eliminar este enlace?',
                showDenyButton: true,
                confirmButtonText: `Eliminar`,
                denyButtonText: `Me equivocado`,
                icon: 'warning'
              }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/links/${link.id}`)
                    .then(()=>{
                        this.links.splice(index, 1);

                        this.$swal({
                            text: 'Se ha eliminado el enlace correctamente',
                            icon: 'success'
                        })
                    }).catch(err => {
                        this.$swal({
                            text: 'Opps! Ha producido un error en momento de eliminar el enlace',
                            showCloseButton: true,
                            icon: 'error'
                          });
                    })
                } else if (result.isDenied) {
                  this.$swal({
                    text: 'Se ha cancelado la acción de eliminar el enlace',
                    icon: 'info'
                  })
                }
            })
        }
    }
}
